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
			$table->string('private_password')->default('overlord');
			$table->string('admin_password')->default('qwerty#420');
			$table->string('rcon_password')->default('qwerty#420');
			$table->integer('max_ping')->default(2000);
			$table->text('parameters');
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
			$table->integer('version')->default(1);
			$table->boolean('blood')->default(1);
			$table->boolean('single_voice')->default(0);
			$table->boolean('gamma')->default(1);
			$table->boolean('brightness')->default(1);
			$table->integer('max_samples_played')->default(128);
			$table->text('active_keys');
			$table->integer('scene_complexity')->default(1000000);
			$table->integer('shadow_z_distance')->default(100);
			$table->integer('view_distance')->default(6000);
			$table->integer('preferred_object_view_distance')->default(4000);
			$table->integer('terrain_grid')->default(3.125);
			$table->integer('volume_cd')->default(10);
			$table->integer('volume_fx')->default(10);
			$table->integer('volume_speech')->default(10);
			$table->integer('volume_von')->default(10);
			$table->decimal('von_rec_threshold', 20, 10)->default(0.0299999999);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_dificulty_recruit', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->boolean('armor')->default(0);
			$table->boolean('friendly_tag')->default(1);
			$table->boolean('enemy_tag')->default(1);
			$table->boolean('mine_tag')->default(1);
			$table->boolean('hud')->default(1);
			$table->boolean('hud_perm')->default(1);
			$table->boolean('hud_wp')->default(1);
			$table->boolean('hud_wp_perm')->default(1);
			$table->boolean('hud_group_info')->default(1);
			$table->boolean('auto_spot')->default(1);
			$table->boolean('map')->default(1);
			$table->boolean('weapon_cursor')->default(1);
			$table->boolean('auto_guide_at')->default(1);
			$table->boolean('clock_indicator')->default(1);
			$table->boolean('third_person_view')->default(0);
			$table->boolean('ultra_ai')->default(0);
			$table->boolean('camera_shake')->default(0);
			$table->boolean('unlimited_saves')->default(0);
			$table->boolean('death_messages')->default(1);
			$table->boolean('net_stats')->default(0);
			$table->boolean('von_id')->default(1);
			$table->boolean('extended_info_type')->default(1);
			$table->decimal('skill_friendly', 20, 10)->default(0.60000002);
			$table->decimal('skill_enemy', 20, 10)->default(0.60000002);
			$table->decimal('precision_friendly', 20, 10)->default(0.28);
			$table->decimal('precision_enemy', 20, 10)->default(0.28);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_dificulty_regular', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->boolean('armor')->default(0);
			$table->boolean('friendly_tag')->default(1);
			$table->boolean('enemy_tag')->default(0);
			$table->boolean('mine_tag')->default(1);
			$table->boolean('hud')->default(0);
			$table->boolean('hud_perm')->default(1);
			$table->boolean('hud_wp')->default(1);
			$table->boolean('hud_wp_perm')->default(1);
			$table->boolean('hud_group_info')->default(0);
			$table->boolean('auto_spot')->default(0);
			$table->boolean('map')->default(0);
			$table->boolean('weapon_cursor')->default(1);
			$table->boolean('auto_guide_at')->default(1);
			$table->boolean('clock_indicator')->default(0);
			$table->boolean('third_person_view')->default(0);
			$table->boolean('ultra_ai')->default(0);
			$table->boolean('camera_shake')->default(1);
			$table->boolean('unlimited_saves')->default(0);
			$table->boolean('death_messages')->default(1);
			$table->boolean('net_stats')->default(0);
			$table->boolean('von_id')->default(1);
			$table->boolean('extended_info_type')->default(1);
			$table->decimal('skill_friendly', 20, 10)->default(0.60000002);
			$table->decimal('skill_enemy', 20, 10)->default(0.60000002);
			$table->decimal('precision_friendly', 20, 10)->default(0.28);
			$table->decimal('precision_enemy', 20, 10)->default(0.28);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_dificulty_veteran', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->boolean('armor')->default(0);
			$table->boolean('friendly_tag')->default(0);
			$table->boolean('enemy_tag')->default(0);
			$table->boolean('mine_tag')->default(0);
			$table->boolean('hud')->default(0);
			$table->boolean('hud_perm')->default(0);
			$table->boolean('hud_wp')->default(0);
			$table->boolean('hud_wp_perm')->default(0);
			$table->boolean('hud_group_info')->default(0);
			$table->boolean('auto_spot')->default(0);
			$table->boolean('map')->default(1);
			$table->boolean('weapon_cursor')->default(1);
			$table->boolean('auto_guide_at')->default(0);
			$table->boolean('clock_indicator')->default(0);
			$table->boolean('third_person_view')->default(0);
			$table->boolean('ultra_ai')->default(0);
			$table->boolean('camera_shake')->default(0);
			$table->boolean('unlimited_saves')->default(0);
			$table->boolean('death_messages')->default(1);
			$table->boolean('net_stats')->default(0);
			$table->boolean('von_id')->default(1);
			$table->boolean('extended_info_type')->default(1);
			$table->decimal('skill_friendly', 20, 10)->default(0.60000002);
			$table->decimal('skill_enemy', 20, 10)->default(0.60000002);
			$table->decimal('precision_friendly', 20, 10)->default(0.28);
			$table->decimal('precision_enemy', 20, 10)->default(0.28);
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('server_dificulty_mercenary', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('server_id')->unsigned();
			$table->foreign('server_id')->references('id')->on('server')->onUpdate('cascade')->onDelete('cascade');
			$table->boolean('armor')->default(0);
			$table->boolean('friendly_tag')->default(0);
			$table->boolean('enemy_tag')->default(0);
			$table->boolean('mine_tag')->default(0);
			$table->boolean('hud')->default(0);
			$table->boolean('hud_perm')->default(0);
			$table->boolean('hud_wp')->default(0);
			$table->boolean('hud_wp_perm')->default(0);
			$table->boolean('hud_group_info')->default(0);
			$table->boolean('auto_spot')->default(0);
			$table->boolean('map')->default(1);
			$table->boolean('weapon_cursor')->default(0);
			$table->boolean('auto_guide_at')->default(0);
			$table->boolean('clock_indicator')->default(0);
			$table->boolean('third_person_view')->default(0);
			$table->boolean('ultra_ai')->default(0);
			$table->boolean('camera_shake')->default(0);
			$table->boolean('unlimited_saves')->default(0);
			$table->boolean('death_messages')->default(1);
			$table->boolean('net_stats')->default(0);
			$table->boolean('von_id')->default(1);
			$table->boolean('extended_info_type')->default(1);
			$table->decimal('skill_friendly', 20, 10)->default(0.60000002);
			$table->decimal('skill_enemy', 20, 10)->default(0.60000002);
			$table->decimal('precision_friendly', 20, 10)->default(0.28);
			$table->decimal('precision_enemy', 20, 10)->default(0.28);
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