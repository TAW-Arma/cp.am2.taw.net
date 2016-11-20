<?php

	$cmd = "C:/steamcmd/steamcmd.exe +login anonymous +force_install_dir \"C:\Steam\steamapps\common\Arma 3 Server\" +app_update 233780 validate +quit";

	$descriptorspec = array(
	   0 => array("pipe", "r"),   // stdin is a pipe that the child will read from
	   1 => array("pipe", "w"),   // stdout is a pipe that the child will write to
	   2 => array("pipe", "w")    // stderr is a pipe that the child will write to
	);
	flush();
	$process = proc_open($cmd, $descriptorspec, $pipes, realpath('./'), array());
	if (is_resource($process)) {
		while ($s = fgets($pipes[1])) {
			print $s;
			flush();
		}
	}

?>