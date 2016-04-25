<?php


class RconProtocol
{
    protected $connection;


    /*
     *  Prepares a new RconProtocol object for use with
     *  the given Rcon connection.
     */
    public function __construct(Rcon $connection)
    {
        $this->connection = $connection;
    }


    /*
     *  Sends a given message to the specified player.
     */
    public function say($player, $message)
    {
        $cmd = sprintf('say %d %s', $player, $message);
        $this->connection->sendmsg($cmd);
    }


    /*
     *  Sends the given message to all players.
     */
    public function broadcast($message)
    {
        $this->say(-1, $message);
    }


    /*
     *  Loads the "scripts.txt" file without the need to restart the server.
     */
    public function loadscripts()
    {
        $this->connection->sendmsg('loadScripts');
    }


    /*
     *  Returns a list of the available missions on the server.
     */
    public function missions()
    {
        $this->connection->sendmsg('missions');
    }


    /*
     *  Displays a list of the players on the server
     *  including BE GUIDs and pings.
     */
    public function players()
    {
        $this->connection->sendmsg('players');
    }


    /*
     *  Kicks the specified player.
     */
    public function kick($player)
    {
        $cmd = sprintf('kick %d', $player);
        $this->connection->sendmsg($cmd);
    }


    /*
     *  Changes the RCon password.
     */
    public function chpasswd($password)
    {
        $cmd = sprintf('RConPassword %s', $password);
        $this->connection->sendmsg($cmd);
    }


    /*
     *  Changes the MaxPing value.
     */
    public function maxping($ping)
    {
        $cmd = sprintf('MaxPing %d', $ping);
        $this->connection->sendmsg($cmd);
    }


    /*
     *  Logout from current server, but do not exit the program.
     */
    public function logout()
    {
        $this->connection->sendmsg('logout');
    }


    /*
     *  Closes the connection.
     */
    public function exit_rcon()
    {
        $this->connection->sendmsg('Exit');
    }
}
