<?php

use Barryvdh\Elfinder;

require_once('C:\\www\\cp.am2.taw.net\\vendor\\austinb\\gameq\\src\\GameQ\\Autoloader.php');

class ServerController extends BaseController
{
    public function GetIndex()
    {
        if ( ! Auth::user()->can('see_server'))
            return Redirect::to('backend/dashboard/index');

        if( Auth::user()->can('see_all_servers') ):

            $data['servers']            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->orderBy('name', 'asc')->get();
            $data['is_admin']           = true;

        else:

            $user_servers               = [];
            foreach(Auth::user()->servers as $server)
                $user_servers[]         = $server->id;

            $data['servers']            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->whereIn('id', $user_servers)->orderBy('name', 'asc')->get();
            $data['is_admin']           = false;

        endif;

        $data['can_create']         = Auth::user()->can('create_server');
        $data['can_update']         = Auth::user()->can('update_server');
        $data['can_delete']         = Auth::user()->can('delete_server');
        $data['can_manage']         = Auth::user()->can('manage_server');
        $data['can_service']        = Auth::user()->can('service_server');
        $data['can_server_cfg']     = Auth::user()->can('config_server_server');
        $data['can_basic_cfg']      = Auth::user()->can('config_server_basic');
        $data['can_profile_cfg']    = Auth::user()->can('config_server_profile');
        $data['can_mission']        = Auth::user()->can('mission_server');
        $data['can_bans']           = Auth::user()->can('bans_server');


        return View::make('backend.server.index', $data);
    }

    public function GetCreate()
    {
        if ( ! Auth::user()->can('create_server'))
            return Redirect::to('backend/server');

        return View::make('backend.server.create');
    }
    
    public function PostCreate()
    {
        if ( ! Auth::user()->can('create_server'))
            return Redirect::to('backend/server');

        $server                             = new Server;
        $server->name                       = Input::get('name');
        $server->hostname                   = Input::get('hostname');
        $server->port                       = Input::get('port');
        $server->cpu_count                  = Input::get('cpu_count');
        $server->ex_threads                 = Input::get('ex_threads');
        $server->memory                     = Input::get('memory');
        $server->private_password           = Input::get('private_password');
        $server->admin_password             = Input::get('admin_password');
        $server->rcon_password              = Input::get('rcon_password');
        $server->max_ping                   = Input::get('max_ping');
        $server->parameters                 = '-mod=curator;heli;kart;mark;@allinarmaterrainpack_am2;@cba_am2;@taw_am2_content;@taw_am2_maps;@taw_div_core;';
        $server->save();

        $server_cfg                         = new ServerCFG;
        $server_cfg->server()->associate($server);
        $server_cfg->motd                   = 'Welcome to ' . $server->hostname . ', Watch each others backs and have fun';
        $server_cfg->onUnsignedData         = '""';
        $server_cfg->onHackedData           = '""';
        $server_cfg->onDifferentData        = '""';
        $server_cfg->mission_parameters     = '';
        $server_cfg->save();

        $server_basic_cfg                   = new ServerBasicCFG;
        $server_basic_cfg->server()->associate($server);
        $server_basic_cfg->save();

        $active_keys                        = '';

        $server_profile                     = new ServerProfile;
        $server_profile->server()->associate($server);
        $server_profile->active_keys        = $active_keys;
        $server_profile->save();

        $server_dificulty_recruit           = new ServerDificultyRecruit;
        $server_dificulty_recruit->server()->associate($server);
        $server_dificulty_recruit->save();

        $server_dificulty_regular           = new ServerDificultyRegular;
        $server_dificulty_regular->server()->associate($server);
        $server_dificulty_regular->save();

        $server_dificulty_veteran           = new ServerDificultyVeteran;
        $server_dificulty_veteran->server()->associate($server);
        $server_dificulty_veteran->save();

        $server_dificulty_mercanary           = new ServerDificultyMercenary;
        $server_dificulty_mercanary->server()->associate($server);
        $server_dificulty_mercanary->save();

        mkdir("C:\\arma3\\instances\\" . $server->port . "2");
        mkdir("C:\\arma3\\instances\\" . $server->port . "2\\battleye");
        mkdir("C:\\arma3\\instances\\" . $server->port . "2\\profile");
        mkdir("C:\\arma3\\instances\\" . $server->port . "2\\profile\\users");
        mkdir("C:\\arma3\\instances\\" . $server->port . "2\\profile\\users\\arma3");
        mkdir("C:\\arma3\\instances\\" . $server->port . "2\\profile\\users\\root");

        $this->GenerateFiles($server->id);

        return Redirect::to('backend#backend/server');
    }
    
    public function GetUpdate($server_id)
    {
        if ( ! Auth::user()->can('update_server'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::find($server_id);
        $data['users']                      = User::all();
        if (Auth::user()->is('sa') or Auth::user()->is('st'))
        {
            $data['is_admin']               = true;
        }
        else
        {
            $data['is_admin']               = false;
        }
        $data['server_users']               = [];

        foreach($data['server']->users as $user)
            $data['server_users'][$user->id] = $user->id;

        return View::make('backend.server.update', $data);
    }
    
    public function PostUpdate($server_id)
    {
        if ( ! Auth::user()->can('update_server'))
            return Redirect::to('backend/server');

        $server                             = Server::find($server_id);
        $server->name                       = Input::get('name');
        $server->hostname                   = Input::get('hostname');
        $server->port                       = Input::get('port');
        $server->cpu_count                  = Input::get('cpu_count');
        $server->ex_threads                 = Input::get('ex_threads');
        $server->memory                     = Input::get('memory');
        $server->private_password           = Input::get('private_password');
        $server->admin_password             = Input::get('admin_password');
        $server->rcon_password              = Input::get('rcon_password');
        $server->max_ping                   = Input::get('max_ping');
        $server->parameters                 = Input::get('parameters');
        $server->save();

        return Redirect::to('backend#backend/server');
    }
    
    public function PostUpdateAdmin($server_id)
    {
        if ( ! Auth::user()->can('update_server'))
            return Redirect::to('backend/server');

        $server                             = Server::find($server_id);
        $server->users()->sync(Input::get('users'));
        $server->save();

        return Redirect::to('backend#backend/server');
    }
    
    public function GetDelete($server_id)
    {
        if ( ! Auth::user()->can('delete_server'))
            return Redirect::to('backend/server');

        $server = Server::find($server_id);
        $this->recursively_remove_directory("C:\\arma3\\instances\\" . $server->port . "2");
        $server->delete();

        return Redirect::to('backend/server');
    }

    public function GetStart($server_id)
    {
        if ( ! Auth::user()->can('service_server'))
            return Redirect::to('backend#backend/server');

        $server = Server::find($server_id);
        
        shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2');
        if($server->cpu_count === 1)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc1');
        }
        if($server->cpu_count === 2)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc2');
        }
        if($server->cpu_count === 3)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc2');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc3');
        }

        return Redirect::to('backend/server');
    }

    public function GetRestart($server_id)
    {
        if ( ! Auth::user()->can('service_server'))
            return Redirect::to('backend#backend/server');

        $this->ApiStop($server_id);
        sleep(1);
        $this->ApiStart($server_id);
 
        return Redirect::to('backend/server');
    }

    public function GetStop($server_id)
    {
        if ( ! Auth::user()->can('service_server'))
            return Redirect::to('backend#backend/server');

        $server                     = Server::find($server_id);
        
        if($server->cpu_count === 1)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc1');
        }
        if($server->cpu_count === 2)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc2');
        }
        if($server->cpu_count === 3)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc2');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc3');
        }
        shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2');

        @unlink('C:\\arma3\\instances\\' . $server->port . '2\\server.pid');
        
        $this->GenerateFiles($server_id);

        return Redirect::to('backend/server');
    }

    public function ApiStart($server_id)
    {
        $server = Server::find($server_id);

        $this->GenerateFiles($server_id);
        shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2');
        if($server->cpu_count === 1)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc1');
        }
        if($server->cpu_count === 2)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc2');
        }
        if($server->cpu_count === 3)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc2');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --start ' . $server->port . '2_hc3');
        }

        return $server->name;
    }

    public function ApiRestart($server_id)
    {
        $server = Server::find($server_id);

        $this->ApiStop($server_id);
        sleep(1);
        $this->ApiStart($server_id);

        return $server->name;
    }

    public function ApiStop($server_id)
    {
        $server                     = Server::find($server_id);

        if($server->cpu_count === 1)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc1');
        }
        if($server->cpu_count === 2)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc2');
        }
        if($server->cpu_count === 3)
        {
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc1');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc2');
            shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2_hc3');
        }
        shell_exec('C:\\FireDaemon\\FireDaemon.exe --stop ' . $server->port . '2');
        @unlink('C:\\arma3\\instances\\' . $server->port . '2\\server.pid');

        $this->GenerateFiles($server_id);

        return $server->name;
    }
    
    public function GetUpdateServerCFG($server_id)
    {
        if ( ! Auth::user()->can('config_server_server'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::with('server_cfg')->find($server_id);
        $data['missions']                   = $this->GetMissionsList();

        if( Auth::user()->is('sa') or Auth::user()->is('st') ):

            $data['is_admin']           = true;

        else:

            $data['is_admin']           = false;

        endif;

        return View::make('backend.server.update_server_cfg', $data);
    }
    
    public function PostUpdateServerCFG($server_id)
    {
        if ( ! Auth::user()->can('config_server_server'))
            return Redirect::to('backend/server');

        if( Auth::user()->is('sa') or Auth::user()->is('st') ):

            $server                                         = Server::with('server_cfg')->find($server_id);
            $server->server_cfg->motd                       = Input::get('motd');
            $server->server_cfg->motd_interval              = Input::get('motd_interval');
            $server->server_cfg->battleye                   = Input::get('battleye');
            //$server->server_cfg->third_person_view          = Input::get('third_person_view');
            $server->server_cfg->force_rotor_lib_simulation = Input::get('force_rotor_lib_simulation');
            $server->server_cfg->reporting_ip               = Input::get('reporting_ip');
            //$server->server_cfg->checkfiles                 = Input::get('checkfiles');
            $server->server_cfg->kickDuplicate              = Input::get('kickDuplicate');
            $server->server_cfg->verifySignatures           = Input::get('verifySignatures');
            //$server->server_cfg->equalModRequired           = Input::get('equalModRequired');
            $server->server_cfg->requiredSecureId           = Input::get('requiredSecureId');
            $server->server_cfg->maxPlayers                 = Input::get('maxPlayers');
            $server->server_cfg->voteMission                = Input::get('voteMission');
            $server->server_cfg->voteThreshold              = Input::get('voteThreshold');
            $server->server_cfg->disableVoN                 = Input::get('disableVoN');
            $server->server_cfg->vonCodecQuality            = Input::get('vonCodecQuality');
            $server->server_cfg->persistent                 = Input::get('persistent');
            $server->server_cfg->timeStampFormat            = Input::get('timeStampFormat');
            $server->server_cfg->onUnsignedData             = Input::get('onUnsignedData');
            $server->server_cfg->onHackedData               = Input::get('onHackedData');
            $server->server_cfg->onDifferentData            = Input::get('onDifferentData');
            $server->server_cfg->template                   = Input::get('template');
            $server->server_cfg->difficulty                 = Input::get('difficulty');
            $server->server_cfg->mission_parameters         = Input::get('mission_parameters');
            $server->server_cfg->save();
            $server->save();
            
        else:

            $server                                         = Server::with('server_cfg')->find($server_id);
            $server->server_cfg->template                   = Input::get('template');
            $server->server_cfg->difficulty                 = Input::get('difficulty');
            $server->server_cfg->mission_parameters         = Input::get('mission_parameters');
            $server->server_cfg->save();
            $server->save();

        endif;
       
        return Redirect::to('backend#backend/server');
    }
    
    public function GetUpdateBasicCFG($server_id)
    {
        if ( ! Auth::user()->can('config_server_basic'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::with('server_basic_cfg')->find($server_id);
        $data['is_admin']                   = Auth::user()->is('administrators');

        return View::make('backend.server.update_basic_cfg', $data);
    }
    
    public function PostUpdateBasicCFG($server_id)
    {
        if ( ! Auth::user()->can('config_server_basic'))
            return Redirect::to('backend/server');

        $server                                             = Server::with('server_basic_cfg')->find($server_id);
        $server->server_basic_cfg->language                 = Input::get('language');
        $server->server_basic_cfg->adapter                  = Input::get('adapter');
        $server->server_basic_cfg->performance_3d           = Input::get('performance_3d');
        $server->server_basic_cfg->resolution_w             = Input::get('resolution_w');
        $server->server_basic_cfg->resolution_h             = Input::get('resolution_h');
        $server->server_basic_cfg->resolution_bpp           = Input::get('resolution_bpp');
        $server->server_basic_cfg->windowed                 = Input::get('windowed');
        $server->server_basic_cfg->min_bandwidth            = Input::get('min_bandwidth');
        $server->server_basic_cfg->max_bandwidth            = Input::get('max_bandwidth');
        $server->server_basic_cfg->max_msg_send             = Input::get('max_msg_send');
        $server->server_basic_cfg->max_size_guaranteed      = Input::get('max_size_guaranteed');
        $server->server_basic_cfg->max_size_non_guaranteed  = Input::get('max_size_non_guaranteed');
        $server->server_basic_cfg->min_error_to_send_near   = Input::get('min_error_to_send_near');
        $server->server_basic_cfg->min_error_to_send        = Input::get('min_error_to_send');
        $server->server_basic_cfg->max_custom_file_size     = Input::get('max_custom_file_size');
        $server->server_basic_cfg->server_longitude         = Input::get('server_longitude');
        $server->server_basic_cfg->server_latitude          = Input::get('server_latitude');
        $server->server_basic_cfg->server_longitude_auto    = Input::get('server_longitude_auto');
        $server->server_basic_cfg->server_latitude_auto     = Input::get('server_latitude_auto');
        $server->server_basic_cfg->save();
        $server->save();

        return Redirect::to('backend#backend/server');
    }
    
    public function GetUpdateProfile($server_id)
    {
        if ( ! Auth::user()->can('config_server_profile'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::with('server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->find($server_id);
        $data['is_admin']                   = Auth::user()->is('administrators');

        return View::make('backend.server.update_profile', $data);
    }
    
    public function PostUpdateProfile($server_id)
    {
        if ( ! Auth::user()->can('config_server_profile'))
            return Redirect::to('backend/server');

        $server                                                 = Server::with('server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->find($server_id);
        
        $server->server_profile->version                        = Input::get('version');
        $server->server_profile->blood                          = Input::get('blood');
        $server->server_profile->single_voice                   = Input::get('single_voice');
        $server->server_profile->gamma                          = Input::get('gamma');
        $server->server_profile->brightness                     = Input::get('brightness');
        $server->server_profile->max_samples_played             = Input::get('max_samples_played');
        $server->server_profile->active_keys                    = Input::get('active_keys');
        $server->server_profile->scene_complexity               = Input::get('scene_complexity');
        $server->server_profile->shadow_z_distance              = Input::get('shadow_z_distance');
        $server->server_profile->view_distance                  = Input::get('view_distance');
        $server->server_profile->preferred_object_view_distance = Input::get('preferred_object_view_distance');
        $server->server_profile->terrain_grid                   = Input::get('terrain_grid');
        $server->server_profile->volume_cd                      = Input::get('volume_cd');
        $server->server_profile->volume_fx                      = Input::get('volume_fx');
        $server->server_profile->volume_speech                  = Input::get('volume_speech');
        $server->server_profile->volume_von                     = Input::get('volume_von');
        $server->server_profile->von_rec_threshold              = Input::get('von_rec_threshold');
        $server->server_profile->save();

        $server->server_dificulty_recruit->armor                = Input::get('recruit_armor');
        $server->server_dificulty_recruit->friendly_tag         = Input::get('recruit_friendly_tag');
        $server->server_dificulty_recruit->enemy_tag            = Input::get('recruit_enemy_tag');
        $server->server_dificulty_recruit->mine_tag             = Input::get('recruit_mine_tag');
        $server->server_dificulty_recruit->hud                  = Input::get('recruit_hud');
        $server->server_dificulty_recruit->hud_perm             = Input::get('recruit_hud_perm');
        $server->server_dificulty_recruit->hud_wp               = Input::get('recruit_hud_wp');
        $server->server_dificulty_recruit->hud_wp_perm          = Input::get('recruit_hud_wp_perm');
        $server->server_dificulty_recruit->hud_group_info       = Input::get('recruit_hud_group_info');
        $server->server_dificulty_recruit->auto_spot            = Input::get('recruit_auto_spot');
        $server->server_dificulty_recruit->map                  = Input::get('recruit_map');
        $server->server_dificulty_recruit->weapon_cursor        = Input::get('recruit_weapon_cursor');
        $server->server_dificulty_recruit->auto_guide_at        = Input::get('recruit_auto_guide_at');
        $server->server_dificulty_recruit->clock_indicator      = Input::get('recruit_clock_indicator');
        $server->server_dificulty_recruit->third_person_view    = Input::get('recruit_third_person_view');
        $server->server_dificulty_recruit->ultra_ai             = Input::get('recruit_ultra_ai');
        $server->server_dificulty_recruit->camera_shake         = Input::get('recruit_camera_shake');
        $server->server_dificulty_recruit->unlimited_saves      = Input::get('recruit_unlimited_saves');
        $server->server_dificulty_recruit->death_messages       = Input::get('recruit_death_messages');
        $server->server_dificulty_recruit->net_stats            = Input::get('recruit_net_stats');
        $server->server_dificulty_recruit->von_id               = Input::get('recruit_von_id');
        $server->server_dificulty_recruit->extended_info_type   = Input::get('recruit_extended_info_type');
        $server->server_dificulty_recruit->skill_friendly       = Input::get('recruit_skill_friendly');
        $server->server_dificulty_recruit->skill_enemy          = Input::get('recruit_skill_enemy');
        $server->server_dificulty_recruit->precision_friendly   = Input::get('recruit_precision_friendly');
        $server->server_dificulty_recruit->precision_enemy      = Input::get('recruit_precision_enemy');
        $server->server_dificulty_recruit->save();

        $server->server_dificulty_regular->armor                = Input::get('regular_armor');
        $server->server_dificulty_regular->friendly_tag         = Input::get('regular_friendly_tag');
        $server->server_dificulty_regular->enemy_tag            = Input::get('regular_enemy_tag');
        $server->server_dificulty_regular->mine_tag             = Input::get('regular_mine_tag');
        $server->server_dificulty_regular->hud                  = Input::get('regular_hud');
        $server->server_dificulty_regular->hud_perm             = Input::get('regular_hud_perm');
        $server->server_dificulty_regular->hud_wp               = Input::get('regular_hud_wp');
        $server->server_dificulty_regular->hud_wp_perm          = Input::get('regular_hud_wp_perm');
        $server->server_dificulty_regular->hud_group_info       = Input::get('regular_hud_group_info');
        $server->server_dificulty_regular->auto_spot            = Input::get('regular_auto_spot');
        $server->server_dificulty_regular->map                  = Input::get('regular_map');
        $server->server_dificulty_regular->weapon_cursor        = Input::get('regular_weapon_cursor');
        $server->server_dificulty_regular->auto_guide_at        = Input::get('regular_auto_guide_at');
        $server->server_dificulty_regular->clock_indicator      = Input::get('regular_clock_indicator');
        $server->server_dificulty_regular->third_person_view    = Input::get('regular_third_person_view');
        $server->server_dificulty_regular->ultra_ai             = Input::get('regular_ultra_ai');
        $server->server_dificulty_regular->camera_shake         = Input::get('regular_camera_shake');
        $server->server_dificulty_regular->unlimited_saves      = Input::get('regular_unlimited_saves');
        $server->server_dificulty_regular->death_messages       = Input::get('regular_death_messages');
        $server->server_dificulty_regular->net_stats            = Input::get('regular_net_stats');
        $server->server_dificulty_regular->von_id               = Input::get('regular_von_id');
        $server->server_dificulty_regular->extended_info_type   = Input::get('regular_extended_info_type');
        $server->server_dificulty_regular->skill_friendly       = Input::get('regular_skill_friendly');
        $server->server_dificulty_regular->skill_enemy          = Input::get('regular_skill_enemy');
        $server->server_dificulty_regular->precision_friendly   = Input::get('regular_precision_friendly');
        $server->server_dificulty_regular->precision_enemy      = Input::get('regular_precision_enemy');
        $server->server_dificulty_regular->save();

        $server->server_dificulty_veteran->armor                = Input::get('veteran_armor');
        $server->server_dificulty_veteran->friendly_tag         = Input::get('veteran_friendly_tag');
        $server->server_dificulty_veteran->enemy_tag            = Input::get('veteran_enemy_tag');
        $server->server_dificulty_veteran->mine_tag             = Input::get('veteran_mine_tag');
        $server->server_dificulty_veteran->hud                  = Input::get('veteran_hud');
        $server->server_dificulty_veteran->hud_perm             = Input::get('veteran_hud_perm');
        $server->server_dificulty_veteran->hud_wp               = Input::get('veteran_hud_wp');
        $server->server_dificulty_veteran->hud_wp_perm          = Input::get('veteran_hud_wp_perm');
        $server->server_dificulty_veteran->hud_group_info       = Input::get('veteran_hud_group_info');
        $server->server_dificulty_veteran->auto_spot            = Input::get('veteran_auto_spot');
        $server->server_dificulty_veteran->map                  = Input::get('veteran_map');
        $server->server_dificulty_veteran->weapon_cursor        = Input::get('veteran_weapon_cursor');
        $server->server_dificulty_veteran->auto_guide_at        = Input::get('veteran_auto_guide_at');
        $server->server_dificulty_veteran->clock_indicator      = Input::get('veteran_clock_indicator');
        $server->server_dificulty_veteran->third_person_view    = Input::get('veteran_third_person_view');
        $server->server_dificulty_veteran->ultra_ai             = Input::get('veteran_ultra_ai');
        $server->server_dificulty_veteran->camera_shake         = Input::get('veteran_camera_shake');
        $server->server_dificulty_veteran->unlimited_saves      = Input::get('veteran_unlimited_saves');
        $server->server_dificulty_veteran->death_messages       = Input::get('veteran_death_messages');
        $server->server_dificulty_veteran->net_stats            = Input::get('veteran_net_stats');
        $server->server_dificulty_veteran->von_id               = Input::get('veteran_von_id');
        $server->server_dificulty_veteran->extended_info_type   = Input::get('veteran_extended_info_type');
        $server->server_dificulty_veteran->skill_friendly       = Input::get('veteran_skill_friendly');
        $server->server_dificulty_veteran->skill_enemy          = Input::get('veteran_skill_enemy');
        $server->server_dificulty_veteran->precision_friendly   = Input::get('veteran_precision_friendly');
        $server->server_dificulty_veteran->precision_enemy      = Input::get('veteran_precision_enemy');
        $server->server_dificulty_veteran->save();

        $server->server_dificulty_mercenary->armor              = Input::get('mercenary_armor');
        $server->server_dificulty_mercenary->friendly_tag       = Input::get('mercenary_friendly_tag');
        $server->server_dificulty_mercenary->enemy_tag          = Input::get('mercenary_enemy_tag');
        $server->server_dificulty_mercenary->mine_tag           = Input::get('mercenary_mine_tag');
        $server->server_dificulty_mercenary->hud                = Input::get('mercenary_hud');
        $server->server_dificulty_mercenary->hud_perm           = Input::get('mercenary_hud_perm');
        $server->server_dificulty_mercenary->hud_wp             = Input::get('mercenary_hud_wp');
        $server->server_dificulty_mercenary->hud_wp_perm        = Input::get('mercenary_hud_wp_perm');
        $server->server_dificulty_mercenary->hud_group_info     = Input::get('mercenary_hud_group_info');
        $server->server_dificulty_mercenary->auto_spot          = Input::get('mercenary_auto_spot');
        $server->server_dificulty_mercenary->map                = Input::get('mercenary_map');
        $server->server_dificulty_mercenary->weapon_cursor      = Input::get('mercenary_weapon_cursor');
        $server->server_dificulty_mercenary->auto_guide_at      = Input::get('mercenary_auto_guide_at');
        $server->server_dificulty_mercenary->clock_indicator    = Input::get('mercenary_clock_indicator');
        $server->server_dificulty_mercenary->third_person_view  = Input::get('mercenary_third_person_view');
        $server->server_dificulty_mercenary->ultra_ai           = Input::get('mercenary_ultra_ai');
        $server->server_dificulty_mercenary->camera_shake       = Input::get('mercenary_camera_shake');
        $server->server_dificulty_mercenary->unlimited_saves    = Input::get('mercenary_unlimited_saves');
        $server->server_dificulty_mercenary->death_messages     = Input::get('mercenary_death_messages');
        $server->server_dificulty_mercenary->net_stats          = Input::get('mercenary_net_stats');
        $server->server_dificulty_mercenary->von_id             = Input::get('mercenary_von_id');
        $server->server_dificulty_mercenary->extended_info_type = Input::get('mercenary_extended_info_type');
        $server->server_dificulty_mercenary->skill_friendly     = Input::get('mercenary_skill_friendly');
        $server->server_dificulty_mercenary->skill_enemy        = Input::get('mercenary_skill_enemy');
        $server->server_dificulty_mercenary->precision_friendly = Input::get('mercenary_precision_friendly');
        $server->server_dificulty_mercenary->precision_enemy    = Input::get('mercenary_precision_enemy');
        $server->server_dificulty_mercenary->save();

        $server->save();

        return Redirect::to('backend#backend/server');
    }

    public function GenerateFiles($server_id)
    {
        $data['server']             = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->find($server_id);

        $difficulty = $data['server']['server_cfg']['difficulty'];
        $data['server']['server_dificulty'] = $data['server']['server_dificulty_'.$difficulty];
        $data['bans']               = ServerBans::all();

        // shell_exec('C:\\FireDaemon\\FireDaemon.exe --uninstall ' . $data['server']->port . '2');

        $file                       = new stdClass();
        $file->server_init          = View::make('backend.server.cfg_server_init', $data)->renderSections();
        $file->server_bat           = View::make('backend.server.cfg_server_bat', $data)->renderSections();
        $file->server_cfg           = View::make('backend.server.cfg_server_cfg', $data)->renderSections();
        $file->hc1_xml              = View::make('backend.server.cfg_hc1_xml', $data)->renderSections();
        $file->hc2_xml              = View::make('backend.server.cfg_hc2_xml', $data)->renderSections();
        $file->hc3_xml              = View::make('backend.server.cfg_hc3_xml', $data)->renderSections();
        $file->server_xml           = View::make('backend.server.cfg_server_xml', $data)->renderSections();
        $file->basic_cfg            = View::make('backend.server.cfg_basic_cfg', $data)->renderSections();
        $file->parameters_cfg       = View::make('backend.server.cfg_parameters_cfg', $data)->renderSections();
        $file->bans_txt             = View::make('backend.server.cfg_bans_txt', $data)->renderSections();
        $file->beserver_cfg         = View::make('backend.server.cfg_beserver_cfg', $data)->renderSections();
        $file->arma3profile         = View::make('backend.server.cfg_arma3profile', $data)->renderSections();

        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\battleye');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\logs');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\administrator');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\arma3');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\arma3\\Saved');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\arma3\\Saved\\steam');
        @mkdir('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\arma3\\Saved\\steam\\meta');

        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\server.bat', $file->server_bat);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\server.cfg', $file->server_cfg);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\hc1.xml', $file->hc1_xml);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\hc2.xml', $file->hc2_xml);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\hc3.xml', $file->hc3_xml);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\server.xml', $file->server_xml);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\basic.cfg', $file->basic_cfg);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\parameters.cfg', $file->parameters_cfg);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\battleye\\beserver.dll', file_get_contents('C:\\arma3\\battleye\\beserver.dll'));
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\battleye\\bans.txt', $file->bans_txt);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\battleye\\beserver.cfg', $file->beserver_cfg);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\arma3\\arma3.Arma3Profile', $file->arma3profile);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\arma3\\Arma3.cfg', $file->basic_cfg);
        $this->file_force_contents('C:\\arma3\\instances\\' . $data['server']->port . '2\\profile\\users\\administrator\\Arma3.cfg', $file->basic_cfg);

        shell_exec('C:\\FireDaemon\\FireDaemon.exe --install C:\\arma3\\instances\\' . $data['server']->port . '2\\hc1.xml');
        shell_exec('C:\\FireDaemon\\FireDaemon.exe --install C:\\arma3\\instances\\' . $data['server']->port . '2\\hc2.xml');
        shell_exec('C:\\FireDaemon\\FireDaemon.exe --install C:\\arma3\\instances\\' . $data['server']->port . '2\\hc3.xml');
        shell_exec('C:\\FireDaemon\\FireDaemon.exe --install C:\\arma3\\instances\\' . $data['server']->port . '2\\server.xml');
    }

    public function GetLogViewer($server_id)
    {
        $data['server']    = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->find($server_id);

        return View::make('backend.server.logviewer', $data);
    }

    public function GetFileManagerView($server_id)
    {
        $data['server']    = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->find($server_id);

        return View::make('backend.server.filemanager', $data);
    }

    public function GetFileManagerConnector($server_id)
    {
        $server    = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->find($server_id);
     
        $opts      =
        [
            'dir'       => 'files',
            'access'    => 'Barryvdh\Elfinder\Elfinder::checkAccess',
            'roots'     =>
            [
                [
                    'driver' => 'LocalFileSystem',
                    'path'   => 'C:\\www\\cp.am2.taw.net\\public\\instances\\' . $server->port . '2',
                    'URL'    => 'http://cp.am2.taw.net/instances/' . $server->port . '2'
                ]
            ],
            'options'   => [],
            'csrf'      => null,
        ];

        $connector = new elFinder\Connector(new \elFinder($opts));
        $connector->run();
        return $connector->getResponse();
    }

    public function GenerateBansFile()
    {
        $data['bans']   = ServerBans::all();

        foreach(Server::all() as $server)
            $this->file_force_contents('C:\\arma3\\instances\\' . $server->port . '2\\battleye\\bans.txt', View::make('backend.server.cfg_bans_txt', $data)->renderSections());
    }

    public function recursively_remove_directory($dir)
    {
        if (is_dir($dir))
        {
            $objects = scandir($dir);
            foreach ($objects as $object)
            {
                if ($object != "." && $object != "..")
                {
                    if (filetype($dir."/".$object) == "dir")
                    {
                        $this->recursively_remove_directory($dir."/".$object);
                    }
                    else
                    {
                        unlink($dir."/".$object);
                    }
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
    
    public function GetMissions($message_type = "info", $message = "")
    {
        if ( ! Auth::user()->can('mission_server'))
            return Redirect::to('backend/server');
        
        $data['message']            = $message;
        $data['message_type']       = $message_type;
        $data['missions']           = $this->GetMissionsList();
        $data['can_delete']         = Auth::user()->can('delete_server');

        return View::make('backend.server.missions', $data);
    }
    
    public function PostMissions()
    {
        if ( ! Auth::user()->can('mission_server'))
            return Redirect::to('backend/server');


        $message = "";
        if (Input::hasFile('mission'))
        {
            $maxFileSizeBytes = 50 * 1024 * 1024;
            
            if(Input::file('mission')->getSize() > $maxFileSizeBytes)
            {
                $message            = "danger/Failed to upload mission: '".Input::file('mission')->getClientOriginalName()."' the mission size is over ".($maxFileSizeBytes/1024/1024)." megabytes.";
            }
            else if(Input::file('mission')->move("C:/arma3/mpmissions", Input::file('mission')->getClientOriginalName()))
            {
                $message            = "success/Successfully uploaded mission: ".Input::file('mission')->getClientOriginalName();
            } 
            else 
            {
                $message            = "danger/Failed to upload mission: ".Input::file('mission')->getClientOriginalName();
            }
        } 
        else 
        {
            $message            = "warning/No mission to upload selected.";
        }

        
        if($message != "") return Redirect::to('backend#backend/server/missions/'.$message);
        else return Redirect::to('backend#backend/server/missions'); // original
    }

    public function GetMissionsList()
    {
        return array_slice(scandir("C:/arma3/mpmissions"), 2);
    }
    
    public function GetDeleteMission($mission)
    {
        if ( ! Auth::user()->can('mission_server'))
            return Redirect::to('backend/server');
        
        if(unlink("C:/arma3/mpmissions/$mission")) $message = "success/Successfully deleted mission: $mission";
        else $message = "danger/Failed to delete mission: $mission";

        return Redirect::to('backend/server/missions/'.$message);
    }
    
    public function GetDownloadMission($mission)
    {
        if ( ! Auth::user()->can('mission_server'))
            return Redirect::to('backend/server');
        
        return Response::download("C:/arma3/mpmissions/$mission");
    }
    
    public function GetBans()
    {
        if ( ! Auth::user()->can('bans_server'))
            return Redirect::to('backend/server');

        $data['bans']   = ServerBans::all();

        return View::make('backend.server.bans', $data);
    }
    
    public function PostBans()
    {
        if ( ! Auth::user()->can('bans_server'))
            return Redirect::to('backend/server');

        $row                                            = Input::get('row');
        $guid                                           = Input::get('guid');
        $time                                           = Input::get('time');
        $reason                                         = Input::get('reason');
        $is_not_delete                                  = array();
        for($i=0; $i < count(Input::get('row')); $i++)
        {
            if(!empty($guid[$i]))
            {
                if(!$row[$i]==0)
                {
                    $ban                                = ServerBans::find($row[$i]);
                    $ban->guid                          = $guid[$i];
                    $ban->time                          = $time[$i];
                    $ban->reason                        = $reason[$i];
                    $ban->save();
                    $is_not_delete[]                    = $ban->id;
                    unset($ban);
                }
                else
                {
                    $ban                                = new ServerBans;
                    $ban->user_id                       = Auth::user()->id;
                    $ban->guid                          = $guid[$i];
                    $ban->time                          = $time[$i];
                    $ban->reason                        = $reason[$i];
                    $ban->save(); 
                    $is_not_delete[]                    = $ban->id;
                    
                    unset($ban);
                }
            }
        }
        if(!empty($is_not_delete))
        {
            ServerBans::whereNotIn('id', $is_not_delete)->delete();
        }
        else
        {
            DB::table('server_bans')->delete();
        }
        unset($is_not_delete);

        $this->GenerateBansFile();

        return Redirect::to('backend#backend/server/bans');
    }

    public function ApiGetPlayerStats()
    {
        $data['servers']            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->orderBy('name', 'asc')->get();
    
        $GameQ = new \GameQ\GameQ();

        foreach($data['servers'] as $server)
        {
            $GameQ->addServer([
                'type' => 'Armedassault3',
                'host' => '127.0.0.1:' . $server->port . '2',
            ]);
        }
        $data['gameq']                                         = $GameQ->process();

        foreach($data['servers'] as $server)
        {
            if(!isset($data['gameq']['127.0.0.1:' . $server->port . '2']['gq_online']))
            {
                $data['gameq']['127.0.0.1:' . $server->port . '2']['gq_online'] = 0;
            }

            if(isset($data['gameq']['127.0.0.1:' . $server->port . '2']['num_players']))
            {
                $data['players']['127.0.0.1:' . $server->port . '2']['num']        = $data['gameq']['127.0.0.1:' . $server->port . '2']['num_players'];
                $data['players']['127.0.0.1:' . $server->port . '2']['max']        = $server->server_cfg->maxPlayers;
                $data['players']['127.0.0.1:' . $server->port . '2']['percentage'] = (isset($server->server_cfg->maxPlayers)) ? ((100 / $server->server_cfg->maxPlayers) * $data['gameq']['127.0.0.1:' . $server->port . '2']['num_players']) : 0 ;
                
            }
            else
            {
                $data['players']['127.0.0.1:' . $server->port . '2']['num']        = 0;
                $data['players']['127.0.0.1:' . $server->port . '2']['max']        = (isset($server->server_cfg->maxPlayers)) ? $server->server_cfg->maxPlayers : 0 ;
                $data['players']['127.0.0.1:' . $server->port . '2']['percentage'] = 0;
            }
        
        }

        return Response::json($data);
    }

    public function ApiGetServerStats()
    {
        $data['servers']            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->orderBy('name', 'asc')->get();

        $data['cpu'] = [];
        $data['mem'] = [];
        $data['net'] = [];
        $pids = '';
        $i = 0;
        foreach($data['servers'] as $server)
        {
            if(file_exists('C:\\arma3\\instances\\' . $server->port . '2\\server.pid'))
            {
                $pid = str_replace(PHP_EOL, '', file_get_contents('C:\\arma3\\instances\\' . $server->port . '2\\server.pid'));
                if($i === 0)
                {
                    $pids .= (string) '/?' . $pid . '='. $server->port . '2';
                }
                else
                {
                    $pids .= (string) ',' . $pid . '='. $server->port . '2';
                }
                $i++;
            }
        }
        unset($i);

        $url        = 'http://127.0.0.1:2020';
        $opts       =
        [
            'http' =>
            [
                'ignore_errors' => true
            ]
        ];
        $context    = stream_context_create($opts);
        $file       = file_get_contents($url . $pids, false, $context);
        $pidlist    = json_decode($file, true);
        unset($url);
        unset($opts);
        unset($context);
        unset($file);
        unset($pids);

        foreach($data['servers'] as $server)
        {
            if(file_exists('C:\\arma3\\instances\\' . $server->port . '2\\server.pid'))
            {
                $data['cpu']['127.0.0.1:' . $server->port . '2']                = [];
                $data['cpu']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
                $data['mem']['127.0.0.1:' . $server->port . '2']                = [];
                $data['mem']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
                $data['net']['127.0.0.1:' . $server->port . '2']                = 0;

                $pid = str_replace(PHP_EOL, '', file_get_contents('C:\\arma3\\instances\\' . $server->port . '2\\server.pid'));
                if(isset($pidlist[$pid]))
                {
                    $data['cpu']['127.0.0.1:' . $server->port . '2']['percentage']  = $pidlist[$pid]['cpu'];
                    $data['mem']['127.0.0.1:' . $server->port . '2']['percentage']  = ((100 / $server->memory) * ($pidlist[$pid]['memory']) / 1024 / 1024);
                    $data['net']['127.0.0.1:' . $server->port . '2']                = $pidlist[$pid]['network'];
                }
            }
            else
            {
                $data['cpu']['127.0.0.1:' . $server->port . '2']                = [];
                $data['cpu']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
                $data['mem']['127.0.0.1:' . $server->port . '2']                = [];
                $data['mem']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
                $data['net']['127.0.0.1:' . $server->port . '2']                = 0;
            }
        }

        return Response::json($data);
    }

    private function getpidinfo($pid, $ps_opt="aux")
    {
        $ps=shell_exec("\\usr\\bin\\sudo \\bin\\ps ".$ps_opt."p ".$pid);
        $ps=explode("\n", $ps);

        if(count($ps)<2)
        {
            trigger_error("PID ".$pid." doesn't exists", E_USER_WARNING);
            return false;
        }

        foreach($ps as $key=>$val)
        {
            $ps[$key]=explode(" ", preg_replace("\\ +\\", " ", trim($ps[$key])));
        }

        foreach($ps[0] as $key=>$val)
        {
            $pidinfo[$val] = $ps[1][$key];
            unset($ps[1][$key]);
        }

        if(is_array($ps[1]))
        {
            $pidinfo[$val].=" ".implode(" ", $ps[1]);
        }
        return $pidinfo;
    }
    
    public function file_force_contents($filename, $data, $flags = 0)
    {
        if(!is_dir(dirname($filename)))
            mkdir(dirname($filename).'/', 0777, TRUE);
        
        return file_put_contents($filename, $data,$flags);
    }
}
