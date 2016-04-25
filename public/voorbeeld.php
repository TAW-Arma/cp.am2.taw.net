<?php

require_once('Rcon.php');
require_once('RconProtocol.php');

$rcon = new Rcon();

try
{
    $rcon->open('127.0.0.1', '2602');
    $rcon->login('qwerty#420');
}
catch (Exception $e)
{
    echo 'Ghusted. ', $e->getMessage(), PHP_EOL;
    exit;
}

$game = new RconProtocol($rcon);

try
{
    print_r($game->broadcast('Boo'));
}
catch (Exception $e)
{
    echo 'Nuts! ', $e->getMessage(), PHP_EOL;
}

$rcon->close();