hostname                            = "{{ $server->hostname }}";
password                            = "{{ $server->private_password }}";
passwordAdmin                       = "{{ $server->admin_password }}";
serverCommandPassword				= "{{ $server->command_password }}";
steamport                           = {{ $server->port }}3;
steamqueryport                      = {{ $server->port }}4;
motd[]                              = {
<?php
    $motd           = explode(PHP_EOL, $server->server_cfg->motd);
    $i              = 1;
    foreach($motd as $string)
    {
        if(count($motd) == $i)
        {
            echo '    "' . $string . '"' . PHP_EOL;
        }
        else
        {
            echo '    "' . $string . '",' . PHP_EOL;
        }
        $i++;
    }
?>
};
motdInterval                        = {{ $server->server_cfg->motd_interval }};
BattlEye                            = {{ $server->server_cfg->battleye }};
allowedLoadFileExtensions[]         = {"hpp","sqs","sqf","fsm","cpp","paa","txt","xml","inc","ext","sqm","ods","fxy","lip","csv","kb","bik","bikb","html","htm","biedi"};
allowedPreprocessFileExtensions[]   = {"hpp","sqs","sqf","fsm","cpp","paa","txt","xml","inc","ext","sqm","ods","fxy","lip","csv","kb","bik","bikb","html","htm","biedi"};
allowedHTMLLoadExtensions[]         = {"htm","html","xml","txt"};
forceRotorLibSimulation             = {{ $server->server_cfg->force_rotor_lib_simulation }};
logFile                             = "../logs/console.log";
kickDuplicate                       = {{ $server->server_cfg->kickDuplicate }};
verifySignatures                    = {{ $server->server_cfg->verifySignatures }};
maxPlayers                          = {{ $server->server_cfg->maxPlayers }};
voteMission                         = {{ $server->server_cfg->voteMission }};
voteThreshold                       = {{ $server->server_cfg->voteThreshold }};
disableVoN                          = {{ $server->server_cfg->disableVoN }};
vonCodecQuality                     = {{ $server->server_cfg->vonCodecQuality }};
persistent                          = {{ $server->server_cfg->persistent }};
drawingInMap						= {{ $server->server_cfg->drawingInMap }};
headlessClients[]                   = {"127.0.0.1","149.202.223.31"};
localClient[]                       = {"127.0.0.1","149.202.223.31"};
timeStampFormat                     = "{{ $server->server_cfg->timeStampFormat }}";
onUserConnected                     = "";
onUserDisconnected                  = "";
doubleIdDetected                    = "";
onUnsignedData                      = {{ $server->server_cfg->onUnsignedData }};
onHackedData                        = {{ $server->server_cfg->onHackedData }};
onDifferentData                     = {{ $server->server_cfg->onDifferentData }};
allowedFilePatching                 = 2;
class Missions
{
    class Mission1
    {
        template                    = "{{ $server->server_cfg->template }}";
        difficulty                  = "Custom";
        {{ $server->server_cfg->mission_parameters }}
    };
};
missionWhitelist[]                  = {};