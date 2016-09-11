version={{ $server->server_profile->version }};
blood={{ $server->server_profile->blood }};
singleVoice={{ $server->server_profile->single_voice }};
gamma={{ $server->server_profile->gamma }};
brightness={{ $server->server_profile->brightness }};
maxSamplesPlayed={{ $server->server_profile->max_samples_played }};
activeKeys[]=
{
	{{ $server->server_profile->active_keys }}
};
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
difficulty="Custom";

class DifficultyPresets
{
	class CustomDifficulty
	{
		class Options
		{

			// Simulation
			reducedDamage = {{ $server->server_dificulty->armor }};    // Reduced damage
 
			// Situational awareness
@if ($server->server_dificulty->hud_group_info)
			groupIndicators = 1;      // Group indicators   (0 = never, 1 = limited distance, 2 = always)
@else
			groupIndicators = 0;      // Group indicators   (0 = never, 1 = limited distance, 2 = always)
@endif

			friendlyTags = {{ $server->server_dificulty->friendly_tag }};         // Friendly name tags (0 = never, 1 = limited distance, 2 = always)
			enemyTags = {{ $server->server_dificulty->enemy_tag }};            // Enemy name tags    (0 = never, 1 = limited distance, 2 = always)
			detectedMines = {{ $server->server_dificulty->mine_tag }};        // Detected mines     (0 = never, 1 = limited distance, 2 = always)

@if ($server->server_dificulty->hud && $server->server_dificulty->hud_perm)
			commands = 2;             // Commands           (0 = never, 1 = fade out, 2 = always)
@elseif ($server->server_dificulty->hud)
			commands = 1;             // Commands           (0 = never, 1 = fade out, 2 = always)
@else
			commands = 0;             // Commands           (0 = never, 1 = fade out, 2 = always)
@endif

@if ($server->server_dificulty->hud_wp && $server->server_dificulty->hud_wp_perm)
			waypoints = 2;            // Waypoints          (0 = never, 1 = fade out, 2 = always)
@elseif ($server->server_dificulty->hud_wp)
			waypoints = 1;            // Waypoints          (0 = never, 1 = fade out, 2 = always)
@else
			waypoints = 0;            // Waypoints          (0 = never, 1 = fade out, 2 = always)
@endif
 
			// Personal awareness
			// these 3 dont have correct names, the names are taken from old outdated unused profile difficulty settings
			weaponInfo = {{ $server->server_dificulty->auto_guide_at }};           // Weapon info        (0 = never, 1 = fade out, 2 = always)
			stanceIndicator = {{ $server->server_dificulty->ultra_ai }};      // Stance indicator   (0 = never, 1 = fade out, 2 = always)
			staminaBar = {{ $server->server_dificulty->extended_info_type }};        // Stamina bar

			weaponCrosshair = {{ $server->server_dificulty->weapon_cursor }};   // Weapon crosshair
			visionAid = {{ $server->server_dificulty->clock_indicator }};         // Vision aid
 
			// View
			thirdPersonView = {{ $server->server_dificulty->third_person_view }};   // 3rd person view
			cameraShake = {{ $server->server_dificulty->camera_shake }};       // Camera shake
 
			// Multiplayer
			scoreTable = {{ $server->server_dificulty->net_stats }};        // Score table
			deathMessages = {{ $server->server_dificulty->death_messages }};     // Killed by message
			vonID = {{ $server->server_dificulty->von_id }};             // VON ID, shows who is talking
 
			// Misc
			mapContent = {{ $server->server_dificulty->map }};        // Extended map content, shows information on map: spotted enemies if enemyTags, friendly units and assets
			autoReport = {{ $server->server_dificulty->auto_spot }};        // Automatic enemy reporting
			multipleSaves = {{ $server->server_dificulty->unlimited_saves }};     // Multiple saves            
		};
		//aiLevelPreset is counted from 0 and can have following values: 0 (AI Level Low), 1 (AI Level Normal), 2 (AI Level High), 3 (AI Level Custom).
		//When 3 (AI Level Custom) is chosen, values of skill and precision are stored to the class CustomAILevel.
		aiLevelPreset=3;
	};
	class CustomAILevel
	{
		skillAI={{ $server->server_dificulty->skill_enemy }};
		precisionAI={{ $server->server_dificulty->precision_enemy }};
	};
};
