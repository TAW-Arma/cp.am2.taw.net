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
class Difficulties
{
    class recruit
    {
        class Flags
        {
            Armor={{ $server->server_dificulty_recruit->armor }};
            FriendlyTag={{ $server->server_dificulty_recruit->friendly_tag }};
            EnemyTag={{ $server->server_dificulty_recruit->enemy_tag }};
            MineTag={{ $server->server_dificulty_recruit->mine_tag }};
            HUD={{ $server->server_dificulty_recruit->hud }};
            HUDPerm={{ $server->server_dificulty_recruit->hud_perm }};
            HUDWp={{ $server->server_dificulty_recruit->hud_wp }};
            HUDWpPerm={{ $server->server_dificulty_recruit->hud_wp_perm }};
            HUDGroupInfo={{ $server->server_dificulty_recruit->hud_group_info }};
            AutoSpot={{ $server->server_dificulty_recruit->auto_spot }};
            Map={{ $server->server_dificulty_recruit->map }};
            WeaponCursor={{ $server->server_dificulty_recruit->weapon_cursor }};
            AutoGuideAT={{ $server->server_dificulty_recruit->auto_guide_at }};
            ClockIndicator={{ $server->server_dificulty_recruit->clock_indicator }};
            3rdPersonView={{ $server->server_dificulty_recruit->third_person_view }};
            UltraAI={{ $server->server_dificulty_recruit->ultra_ai }};
            CameraShake={{ $server->server_dificulty_recruit->camera_shake }};
            UnlimitedSaves={{ $server->server_dificulty_recruit->unlimited_saves }};
            DeathMessages={{ $server->server_dificulty_recruit->death_messages }};
            NetStats={{ $server->server_dificulty_recruit->net_stats }};
            VonID={{ $server->server_dificulty_recruit->von_id }};
            ExtendedInfoType={{ $server->server_dificulty_recruit->extended_info_type }};
        };
        skillFriendly={{ $server->server_dificulty_recruit->skill_friendly }};
        skillEnemy={{ $server->server_dificulty_recruit->skill_enemy }};
        precisionFriendly={{ $server->server_dificulty_recruit->precision_friendly }};
        precisionEnemy={{ $server->server_dificulty_recruit->precision_enemy }};
    };
    class regular
    {
        class Flags
        {
            Armor={{ $server->server_dificulty_regular->armor }};
            FriendlyTag={{ $server->server_dificulty_regular->friendly_tag }};
            EnemyTag={{ $server->server_dificulty_regular->enemy_tag }};
            MineTag={{ $server->server_dificulty_regular->mine_tag }};
            HUD={{ $server->server_dificulty_regular->hud }};
            HUDPerm={{ $server->server_dificulty_regular->hud_perm }};
            HUDWp={{ $server->server_dificulty_regular->hud_wp }};
            HUDWpPerm={{ $server->server_dificulty_regular->hud_wp_perm }};
            HUDGroupInfo={{ $server->server_dificulty_regular->hud_group_info }};
            AutoSpot={{ $server->server_dificulty_regular->auto_spot }};
            Map={{ $server->server_dificulty_regular->map }};
            WeaponCursor={{ $server->server_dificulty_regular->weapon_cursor }};
            AutoGuideAT={{ $server->server_dificulty_regular->auto_guide_at }};
            ClockIndicator={{ $server->server_dificulty_regular->clock_indicator }};
            3rdPersonView={{ $server->server_dificulty_regular->third_person_view }};
            UltraAI={{ $server->server_dificulty_regular->ultra_ai }};
            CameraShake={{ $server->server_dificulty_regular->camera_shake }};
            UnlimitedSaves={{ $server->server_dificulty_regular->unlimited_saves }};
            DeathMessages={{ $server->server_dificulty_regular->death_messages }};
            NetStats={{ $server->server_dificulty_regular->net_stats }};
            VonID={{ $server->server_dificulty_regular->von_id }};
            ExtendedInfoType={{ $server->server_dificulty_regular->extended_info_type }};
        };
        skillFriendly={{ $server->server_dificulty_regular->skill_friendly }};
        skillEnemy={{ $server->server_dificulty_regular->skill_enemy }};
        precisionFriendly={{ $server->server_dificulty_regular->precision_friendly }};
        precisionEnemy={{ $server->server_dificulty_regular->precision_enemy }};
    };
    class veteran
    {
        class Flags
        {
            Armor={{ $server->server_dificulty_veteran->armor }};
            FriendlyTag={{ $server->server_dificulty_veteran->friendly_tag }};
            EnemyTag={{ $server->server_dificulty_veteran->enemy_tag }};
            MineTag={{ $server->server_dificulty_veteran->mine_tag }};
            HUD={{ $server->server_dificulty_veteran->hud }};
            HUDPerm={{ $server->server_dificulty_veteran->hud_perm }};
            HUDWp={{ $server->server_dificulty_veteran->hud_wp }};
            HUDWpPerm={{ $server->server_dificulty_veteran->hud_wp_perm }};
            HUDGroupInfo={{ $server->server_dificulty_veteran->hud_group_info }};
            AutoSpot={{ $server->server_dificulty_veteran->auto_spot }};
            Map={{ $server->server_dificulty_veteran->map }};
            WeaponCursor={{ $server->server_dificulty_veteran->weapon_cursor }};
            AutoGuideAT={{ $server->server_dificulty_veteran->auto_guide_at }};
            ClockIndicator={{ $server->server_dificulty_veteran->clock_indicator }};
            3rdPersonView={{ $server->server_dificulty_veteran->third_person_view }};
            UltraAI={{ $server->server_dificulty_veteran->ultra_ai }};
            CameraShake={{ $server->server_dificulty_veteran->camera_shake }};
            UnlimitedSaves={{ $server->server_dificulty_veteran->unlimited_saves }};
            DeathMessages={{ $server->server_dificulty_veteran->death_messages }};
            NetStats={{ $server->server_dificulty_veteran->net_stats }};
            VonID={{ $server->server_dificulty_veteran->von_id }};
            ExtendedInfoType={{ $server->server_dificulty_veteran->extended_info_type }};
        };
        skillFriendly={{ $server->server_dificulty_veteran->skill_friendly }};
        skillEnemy={{ $server->server_dificulty_veteran->skill_enemy }};
        precisionFriendly={{ $server->server_dificulty_veteran->precision_friendly }};
        precisionEnemy={{ $server->server_dificulty_veteran->precision_enemy }};
    };
    class mercenary
    {
        class Flags
        {
            Armor={{ $server->server_dificulty_mercenary->armor }};
            FriendlyTag={{ $server->server_dificulty_mercenary->friendly_tag }};
            EnemyTag={{ $server->server_dificulty_mercenary->enemy_tag }};
            MineTag={{ $server->server_dificulty_mercenary->mine_tag }};
            HUD={{ $server->server_dificulty_mercenary->hud }};
            HUDPerm={{ $server->server_dificulty_mercenary->hud_perm }};
            HUDWp={{ $server->server_dificulty_mercenary->hud_wp }};
            HUDWpPerm={{ $server->server_dificulty_mercenary->hud_wp_perm }};
            HUDGroupInfo={{ $server->server_dificulty_mercenary->hud_group_info }};
            AutoSpot={{ $server->server_dificulty_mercenary->auto_spot }};
            Map={{ $server->server_dificulty_mercenary->map }};
            WeaponCursor={{ $server->server_dificulty_mercenary->weapon_cursor }};
            AutoGuideAT={{ $server->server_dificulty_mercenary->auto_guide_at }};
            ClockIndicator={{ $server->server_dificulty_mercenary->clock_indicator }};
            3rdPersonView={{ $server->server_dificulty_mercenary->third_person_view }};
            UltraAI={{ $server->server_dificulty_mercenary->ultra_ai }};
            CameraShake={{ $server->server_dificulty_mercenary->camera_shake }};
            UnlimitedSaves={{ $server->server_dificulty_mercenary->unlimited_saves }};
            DeathMessages={{ $server->server_dificulty_mercenary->death_messages }};
            NetStats={{ $server->server_dificulty_mercenary->net_stats }};
            VonID={{ $server->server_dificulty_mercenary->von_id }};
            ExtendedInfoType={{ $server->server_dificulty_mercenary->extended_info_type }};
        };
        skillFriendly={{ $server->server_dificulty_mercenary->skill_friendly }};
        skillEnemy={{ $server->server_dificulty_mercenary->skill_enemy }};
        precisionFriendly={{ $server->server_dificulty_mercenary->precision_friendly }};
        precisionEnemy={{ $server->server_dificulty_mercenary->precision_enemy }};
    };
};
difficulty="{{ $server->server_cfg->difficulty }}";
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