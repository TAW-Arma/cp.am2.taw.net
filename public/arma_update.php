<?php

	header('Content-Encoding: none;');

	set_time_limit(0);

	$handle = popen("C:/steamcmd/steamcmd.exe +login anonymous +force_install_dir \"C:\Steam\steamapps\common\Arma 3 Server\" +app_update 233780 validate +quit", "r");

	if (ob_get_level() == 0) 
		ob_start();

	while(!feof($handle)) {

		$buffer = fgets($handle);
		$buffer = trim(htmlspecialchars($buffer));

		echo $buffer . "<br />";
		echo str_pad('', 4096);    

		ob_flush();
		flush();
		sleep(1);
	}

	pclose($handle);
	ob_end_flush();
?>