<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerTable extends Migration
{
	public function up()
	{
		Schema::create('server', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->string('hostname');
			$table->integer('port');
			$table->integer('cpu_count')->default(4);
			$table->integer('ex_threads')->default(7);
			$table->integer('memory')->default(2047);
			$table->string('private_password')->default('operation');
			$table->string('admin_password')->default('operation');
			$table->string('rcon_password')->default('operation');
			$table->string('command_password')->default('operation');
			$table->integer('max_ping')->default(2000);
			$table->text('parameters');
			$table->text('mods');
			$table->timestamps();
			$table->softDeletes();
		});
		
		Schema::create('server_cfg', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->text('motd');
			$table->integer('motd_interval')->default(300);
			$table->boolean('battleye')->default(0);
			$table->boolean('third_person_view')->default(0);
			$table->boolean('force_rotor_lib_simulation')->default(1);
			$table->string('reporting_ip')->default('arma3pc.master.gamespy.com');
			$table->string('checkfiles')->default('{}');
			$table->boolean('kickDuplicate')->default(1);
			$table->integer('verifySignatures')->default(0);
			$table->boolean('equalModRequired')->default(0);
			$table->boolean('requiredSecureId')->default(0);
			$table->integer('maxPlayers')->default(32);
			$table->integer('voteMission')->default(2);
			$table->integer('voteThreshold')->default(2);
			$table->boolean('disableVoN')->default(0);
			$table->integer('vonCodecQuality')->default(10);
			$table->boolean('drawingInMap')->default(1);
			$table->boolean('persistent')->default(1);
			$table->string('timeStampFormat')->default('full');
			$table->text('onUnsignedData');
			$table->text('onHackedData');
			$table->text('onDifferentData');
			$table->string('template')->default('');
			$table->string('difficulty')->default('regular');
			$table->text('mission_parameters');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_basic_cfg', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->string('language')->default('English');
			$table->integer('adapter')->default(-1);
			$table->decimal('performance_3d', 20, 10)->default(1.000000);
			$table->integer('resolution_w')->default(0);
			$table->integer('resolution_h')->default(0);
			$table->integer('resolution_bpp')->default(32);
			$table->boolean('windowed')->default(0);
			$table->integer('min_bandwidth')->default(209715200);
			$table->integer('max_bandwidth')->default(2147483647);
			$table->integer('max_msg_send')->default(256);
			$table->integer('max_size_guaranteed')->default(256);
			$table->integer('max_size_non_guaranteed')->default(64);
			$table->decimal('min_error_to_send_near', 20, 10)->default(0.03);
			$table->decimal('min_error_to_send', 20, 10)->default(0.01);
			$table->integer('max_custom_file_size')->default(0);
			$table->float('server_longitude')->default(2.157606);
			$table->float('server_latitude')->default(51.015639);
			$table->float('server_longitude_auto')->default(2.157606);
			$table->float('server_latitude_auto')->default(51.015639);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_profile', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->boolean('single_voice')->default(0);
			$table->boolean('battleye_license')->default(1);
			$table->integer('max_samples_played')->default(96);
			$table->text('active_keys');
			$table->integer('scene_complexity')->default(1000000);
			$table->integer('shadow_z_distance')->default(0);
			$table->integer('view_distance')->default(1600);
			$table->integer('preferred_object_view_distance')->default(900);
			$table->integer('terrain_grid')->default(30);
			$table->integer('volume_cd')->default(10);
			$table->integer('volume_fx')->default(10);
			$table->integer('volume_speech')->default(10);
			$table->integer('volume_von')->default(10);
			$table->decimal('von_rec_threshold', 20, 10)->default(0.0299999999);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_difficulty', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('auto_report')->default(0);
			$table->integer('camera_shake')->default(1);
			$table->integer('commands')->default(2);
			$table->integer('death_messages')->default(0);
			$table->integer('detected_mines')->default(0);
			$table->integer('enemy_tags')->default(0);
			$table->integer('friendly_tags')->default(0);
			$table->integer('group_indicators')->default(0);
			$table->integer('map_content')->default(0);
			$table->integer('map_content_enemy')->default(0);
			$table->integer('map_content_friendly')->default(0);
			$table->integer('map_content_mines')->default(0);
			$table->integer('map_content_ping')->default(0);
			$table->integer('multiple_saves')->default(0);
			$table->integer('reduced_damage')->default(0);
			$table->integer('score_table')->default(1);
			$table->integer('squad_radar')->default(2);
			$table->integer('stamina_bar')->default(2);
			$table->integer('stance_indicator')->default(2);
			$table->integer('tactical_ping')->default(0);
			$table->integer('third_person_view')->default(1);
			$table->integer('vision_aid')->default(0);
			$table->integer('vonid')->default(1);
			$table->integer('waypoints')->default(2);
			$table->integer('weapon_crosshair')->default(2);
			$table->integer('weapon_info')->default(2);
			$table->decimal('skill_ai', 20, 10)->default(1);
			$table->decimal('precision_ai', 20, 10)->default(0.13000001);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_bans', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('guid');
			$table->integer('time')->default(-1);
			$table->string('reason');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('user_has_server', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('user_has_server');
		Schema::dropIfExists('server_bans');
		Schema::dropIfExists('server_dificulty_mercenary');
		Schema::dropIfExists('server_dificulty_veteran');
		Schema::dropIfExists('server_dificulty_regular');
		Schema::dropIfExists('server_dificulty_recruit');
		Schema::dropIfExists('server_profile');
		Schema::dropIfExists('server_basic_cfg');
		Schema::dropIfExists('server_cfg');
		Schema::dropIfExists('server');
	}
}