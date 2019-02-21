difficulty="CustomDifficulty";
class DifficultyPresets
{
	class CustomDifficulty
	{
		class Options
		{
			autoReport={{ $server->server_difficulty->auto_report }};
			cameraShake={{ $server->server_difficulty->camera_shake }};
			commands={{ $server->server_difficulty->commands }};
			deathMessages={{ $server->server_difficulty->death_messages }};
			detectedMines={{ $server->server_difficulty->detected_mines }};
			enemyTags={{ $server->server_difficulty->enemy_tags }};
			friendlyTags={{ $server->server_difficulty->friendly_tags }};
			groupIndicators={{ $server->server_difficulty->group_indicators }};
			mapContent={{ $server->server_difficulty->map_content }};
			mapContentEnemy={{ $server->server_difficulty->map_content_enemy }};
			mapContentFriendly={{ $server->server_difficulty->map_content_friendly }};
			mapContentMines={{ $server->server_difficulty->map_content_mines }};
			mapContentPing={{ $server->server_difficulty->map_content_ping }};
			multipleSaves={{ $server->server_difficulty->multiple_saves }};
			reducedDamage={{ $server->server_difficulty->reduced_damage }};
			scoreTable={{ $server->server_difficulty->score_table }};
			squadRadar={{ $server->server_difficulty->squad_radar }};
			staminaBar={{ $server->server_difficulty->stamina_bar }};
			stanceIndicator={{ $server->server_difficulty->stance_indicator }};
			tacticalPing={{ $server->server_difficulty->tactical_ping }};
			thirdPersonView={{ $server->server_difficulty->third_person_view }};
			visionAid={{ $server->server_difficulty->vision_aid }};
			vonID={{ $server->server_difficulty->vonid }};
			waypoints={{ $server->server_difficulty->waypoints }};
			weaponCrosshair={{ $server->server_difficulty->weapon_crosshair }};
			weaponInfo={{ $server->server_difficulty->weapon_info }};
		};
		description="Custom difficulty set by developer.";
		displayName="Custom";
		optionDescription="Custom difficulty set by the player.";
		optionPicture="\A3\Ui_f\data\Logos\arma3_white_ca.paa";
		aiLevelPreset=3;
	};
	class CustomAILevel
	{
		skillAI={{ $server->server_difficulty->skill_ai }};
		precisionAI={{ $server->server_difficulty->precision_ai }};
	};
};
singleVoice={{ $server->server_profile->single_voice }};
maxSamplesPlayed={{ $server->server_profile->max_samples_played }};
battleyeLicense={{ $server->server_profile->battleye_license }};
sceneComplexity={{ $server->server_profile->scene_complexity }};
shadowZDistance={{ $server->server_profile->shadow_z_distance }};
viewDistance={{ $server->server_profile->view_distance }};
preferredObjectViewDistance={{ $server->server_profile->preferred_object_view_distance }};
terrainGrid={{ $server->server_profile->terrain_grid }};
volumeCD={{ $server->server_profile->volume_cd }};
volumeFX={{ $server->server_profile->volume_fx }};
volumeSpeech={{ $server->server_profile->volume_speech }};
volumeVoN={{ $server->server_profile->volume_von }};
vonRecThreshold={{ $server->server_profile->von_rec_threshold }};
activeKeys[]=
{
	{{ $server->server_profile->active_keys }}
};
