<?php


class Rcon
{
    protected $host;
    protected $port;
    protected $sd;
    protected $msgseq;


    /*
     *  Prepares a new Rcon object.
     */
    public function __construct()
    {
        $this->sd = false;
    }


    /*
     *  Sends the given command.
     */
    public function sendmsg($command)
    {
        if (is_bool($this->sd))
            throw new \Exception('Failed to send msg: not connected!');

        $msgcrc = chr(255).chr(01);
        $msgcrc .= chr(hexdec(sprintf('%01b', $this->msgseq)));
        $msgcrc = sprintf('%x', crc32($msgcrc . $command));
        $msgcrc =
        [
            substr($msgcrc, -2, 2), substr($msgcrc, -4, 2),
            substr($msgcrc, -6, 2), substr($msgcrc, 0, 2)
        ];

        /*  Header
         */
        $msg = 'BE'.chr(hexdec($msgcrc[0])).chr(hexdec($msgcrc[1]));
        $msg .= chr(hexdec($msgcrc[2])).chr(hexdec($msgcrc[3]));

        /*  Msg
         */
        $msg .= chr(hexdec('ff')).chr(hexdec('01'));
        $msg .= chr(hexdec(sprintf('%01b', $this->msgseq++)));
        $msg .= $command;
        $len = strlen($msg);

        $sent = socket_sendto($this->sd, $msg, $len, 0,
                              $this->host, $this->port);

        if (is_bool($sent))
        {
            $err = sprintf('Failed to send msg: %s', socket_last_error());
            throw new \Exception($err);
        }
    }


    /*
     *  Opens a new connection.
     */
    public function open($host, $port)
    {
        $this->close();

        $this->sd = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

        if (is_bool($this->sd))
        {
            $err = sprintf('Socket create failed: %s', socket_last_error());
            throw new \Exception($err);
        }

        $this->host = $host;
        $this->port = $port;
        $this->msgseq = 0;
    }


    /*
     *  Login
     */
    public function login($passwd)
    {
        /*  Generate CRC32 for pass and msg.
         */
        $authcrc = crc32(chr(255).chr(00).trim($passwd));
        $authcrc = sprintf('%x', $authcrc);

        $authcrc = // Reverse the CRC and put into array.
        [
            substr($authcrc, -2, 2), substr($authcrc, -4, 2),
            substr($authcrc, -6, 2), substr($authcrc, 0, 2)
        ];

        /*  Header
         */
        $msg = 'BE'.chr(hexdec($authcrc[0])).chr(hexdec($authcrc[1]));
        $msg .= chr(hexdec($authcrc[2])).chr(hexdec($authcrc[3]));

        /*  Add payload
         */
        $msg .= chr(hexdec('ff')).chr(hexdec('00')).$passwd;
        $len = strlen($msg);

        $sent = socket_sendto($this->sd, $msg, $len, 0,
                              $this->host, $this->port);

        if (is_bool($sent))
        {
            $err = sprintf('Failed to send login: %s', socket_last_error());
            throw new \Exception($err);
        }

        socket_recvfrom($this->sd, $buf, 64, 0, $this->host, $this->port);

        $result = ord($buf[strlen($buf)-1]);

        if ($result == 0)   // Login Failed?
            throw new \Exception('Login failed');

        if ($result != 1)   // Unknown result from login?
            throw new \Exception('Unexpected login result');

        $recv = socket_recvfrom($this->sd, $buf, 64, 0,
                                $this->host, $this->port);
        if (is_bool($recv))
        {
            $err = sprintf('Failed to receive: %s', socket_last_error());
            throw new \Exception($err);
        }

        // echo substr($buf,9)."\n";
    }


    /*
     *  Send a heartbeat packet.
     */
    public function heartbeat()
    {
        $msg = 'BE'.chr(hexdec('7d')).chr(hexdec('8f'));
        $msg .= chr(hexdec('ef')).chr(hexdec('73'));
        $msg .= chr(hexdec('ff')).chr(hexdec('02')).chr(hexdec('00'));
        $len = strlen($msg);
        socket_sendto($this->sd, $msg, $len, 0, $this->host, $this->port);
    }


    /*
     *  Closes the connection.
     */
    public function close()
    {
        if (is_bool($this->sd))
            return;

        socket_close($this->sd);
    }
}
