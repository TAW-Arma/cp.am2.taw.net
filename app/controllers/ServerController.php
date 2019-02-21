<?php

use Barryvdh\Elfinder;

require_once(__DIR__ ."/../../vendor/austinb/gameq/src/GameQ/Autoloader.php");

class ServerController extends BaseController
{   

    public $fireDeamonExe = "C:/FireDaemon/FireDaemon.exe";
    public $arma3path = "C:/Steam/steamapps/common/Arma 3 Server";

    public function GetIndex()
    {
        if ( ! Auth::user()->can('see_server'))
            return Redirect::to('backend/dashboard/index');

        if( Auth::user()->can('see_all_servers') ):

            $data['servers']            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->orderBy('name', 'asc')->get();
            $data['is_admin']           = true;

        else:

            $user_servers               = [];
            foreach(Auth::user()->servers as $server)
                $user_servers[]         = $server->id;

            $data['servers']            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->whereIn('id', $user_servers)->orderBy('name', 'asc')->get();
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
		$server->command_password			= Input::get('command_password');
        $server->parameters                 = '-loadMissionToMemory -mod=curator;heli;kart;mark;argo;jets;orange;tacops;tank;';
        $server->save();

        $server_cfg                         = new ServerCFG;
        $server_cfg->server()->associate($server);
        $server_cfg->motd                   = 'Welcome to ' . $server->hostname . ', Watch each others backs and have fun!';
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

        $server_difficulty                  = new ServerDifficulty;
        $server_difficulty->server()->associate($server);
        $server_difficulty->save();

        mkdir($this->arma3path . $server->name . "");
        mkdir($this->arma3path . $server->name . "/battleye");
        mkdir($this->arma3path . $server->name . "/profile");
        mkdir($this->arma3path . $server->name . "/profile/users");
        mkdir($this->arma3path . $server->name . "/profile/users/arma3");
        mkdir($this->arma3path . $server->name . "/profile/users/root");

        $this->GenerateFiles($server->id);

        return Redirect::to('backend#backend/server');
    }
    
    public function GetUpdate($server_id, $error = '')
    {
        if ( ! Auth::user()->can('update_server'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::find($server_id);
        $data['error']                      = $error;
        if (Auth::user()->is('administrators'))
        {
            $data['is_admin']               = true;
        }
        else
        {
            $data['is_admin']               = false;
        }

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
        $server->save();

        $parameters = Input::get('parameters');
        if (strpos($parameters, '-mod=') !== false)
        {
            return Redirect::to('backend#backend/server/update/' . $server_id . '/no_mods');
        }
        $server->parameters             = Input::get('parameters');
        $server->save();

        return Redirect::to('backend#backend/server');
    }

    public function GetUpdateMods($server_id)
    {
        if ( ! Auth::user()->can('update_server'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::find($server_id);
        $data['mods']                       = $this->get_all_mods();
        if($data['server']->mods == '')
        {
            $data['server']->mods = serialize(array());
        }

        if (Auth::user()->is('administrators'))
        {
            $data['is_admin']               = true;
        }
        else
        {
            $data['is_admin']               = false;
        }

        return View::make('backend.server.update_mods', $data);
    }
    
    public function PostUpdateMods($server_id)
    {
        if ( ! Auth::user()->can('update_server'))
            return Redirect::to('backend/server');

        $server                             = Server::find($server_id);
        $server->mods                       = serialize(Input::get('mods'));
        $server->save();

        return Redirect::to('backend#backend/server');
    }

    public function GetUpdateAdmin($server_id, $error = '')
    {
        if ( ! Auth::user()->can('update_server'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::find($server_id);
        $data['users']                      = User::all();
        if (Auth::user()->is('administrators'))
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

        return View::make('backend.server.update_admin', $data);
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
        $this->recursively_remove_directory($this->arma3path . $server->name . "");
        $server->delete();

        return Redirect::to('backend/server');
    }
    

    public function GetStart($server_id)
    {
        if ( ! Auth::user()->can('service_server'))
            return Redirect::to('backend#backend/server');

        ApiStart($server_id);

        return Redirect::to('backend/server');
    }

    public function GetRestart($server_id)
    {
        if ( ! Auth::user()->can('service_server'))
            return Redirect::to('backend#backend/server');

        ApiRestart($server_id);
 
        return Redirect::to('backend/server');
    }

    public function GetStop($server_id)
    {
        if ( ! Auth::user()->can('service_server'))
            return Redirect::to('backend#backend/server');

        ApiStop($server_id);

        return Redirect::to('backend/server');
    }
    

    public function ApiStart($server_id)
    {
        $server = Server::find($server_id);

        $this->GenerateFiles($server_id);

        shell_exec($this->fireDeamonExe.' --start "' . $server->name . '"');

        if($server->cpu_count > 0) shell_exec($this->fireDeamonExe.' --start "' . $server->name . '_hc1"');
        if($server->cpu_count > 1) shell_exec($this->fireDeamonExe.' --start "' . $server->name . '_hc2"');
        if($server->cpu_count > 2) shell_exec($this->fireDeamonExe.' --start "' . $server->name . '_hc3"');

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
        $server = Server::find($server_id);

        if($server->cpu_count > 0) shell_exec($this->fireDeamonExe.' --stop "' . $server->name . '_hc1"');
        if($server->cpu_count > 1) shell_exec($this->fireDeamonExe.' --stop "' . $server->name . '_hc2"');
        if($server->cpu_count > 2) shell_exec($this->fireDeamonExe.' --stop "' . $server->name . '_hc3"');

        shell_exec($this->fireDeamonExe.' --stop "' . $server->name . '"');
        @unlink($this->arma3path.'/instances/' . $server->name . '/server.pid');
   
        $this->GenerateFiles($server_id);

        return $server->name;
    }
    
    public function GetUpdateServerCFG($server_id)
    {
        if ( ! Auth::user()->can('config_server_server'))
            return Redirect::to('backend/server');

        $data['server']                     = Server::with('server_cfg')->find($server_id);
        $data['missions']                   = $this->GetMissionsList();
        $data['is_admin']                   = true;    

        return View::make('backend.server.update_server_cfg', $data);
    }
    
    public function PostUpdateServerCFG($server_id)
    {
        if ( ! Auth::user()->can('config_server_server'))
            return Redirect::to('backend/server');

    
        $server                                         = Server::with('server_cfg')->find($server_id);
        $server->server_cfg->motd                       = Input::get('motd');
        $server->server_cfg->motd_interval              = Input::get('motd_interval');
        $server->server_cfg->battleye                   = Input::get('battleye');
        $server->server_cfg->force_rotor_lib_simulation = Input::get('force_rotor_lib_simulation');
        $server->server_cfg->reporting_ip               = Input::get('reporting_ip');
        $server->server_cfg->kickDuplicate              = Input::get('kickDuplicate');
        $server->server_cfg->verifySignatures           = Input::get('verifySignatures');
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
		$server->server_cfg->drawingInMap				= Input::get('drawingInMap');
        $server->server_cfg->save();
        $server->save();

       
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

        $data['server']                     = Server::with('server_profile', 'server_difficulty')->find($server_id);
        $data['is_admin']                   = Auth::user()->is('administrators');

        return View::make('backend.server.update_profile', $data);
    }
    
    public function PostUpdateProfile($server_id)
    {
        if ( ! Auth::user()->can('config_server_profile'))
            return Redirect::to('backend/server');

        $server                                                 = Server::with('server_profile', 'server_difficulty')->find($server_id);
        
        $server->server_profile->single_voice                   = Input::get('single_voice');
        $server->server_profile->max_samples_played             = Input::get('max_samples_played');
        $server->server_profile->battleye_license               = Input::get('battleye_license');
        $server->server_profile->scene_complexity               = Input::get('scene_complexity');
        $server->server_profile->shadow_z_distance              = Input::get('shadow_z_distance');
        $server->server_profile->view_distance                  = Input::get('view_distance');
        $server->server_profile->preferred_object_view_distance = Input::get('preferred_object_view_distance');
        $server->server_profile->terrain_grid                   = Input::get('terrain_grid');
        $server->server_profile->shadow_z_distance              = Input::get('shadow_z_distance');
        $server->server_profile->volume_cd                      = Input::get('volume_cd');
        $server->server_profile->volume_fx                      = Input::get('volume_fx');
        $server->server_profile->volume_speech                  = Input::get('volume_speech');
        $server->server_profile->volume_von                     = Input::get('volume_von');
        $server->server_profile->von_rec_threshold              = Input::get('von_rec_threshold');
        $server->server_profile->active_keys                    = Input::get('active_keys');
        $server->server_profile->save();

        $server->server_difficulty->auto_report                 = Input::get('auto_report');
        $server->server_difficulty->camera_shake                = Input::get('camera_shake');
        $server->server_difficulty->commands                    = Input::get('commands');
        $server->server_difficulty->death_messages              = Input::get('death_messages');
        $server->server_difficulty->detected_mines              = Input::get('detected_mines');
        $server->server_difficulty->enemy_tags                  = Input::get('enemy_tags');
        $server->server_difficulty->friendly_tags               = Input::get('friendly_tags');
        $server->server_difficulty->group_indicators            = Input::get('group_indicators');
        $server->server_difficulty->map_content                 = Input::get('map_content');
        $server->server_difficulty->map_content_enemy           = Input::get('map_content_enemy');
        $server->server_difficulty->map_content_friendly        = Input::get('map_content_friendly');
        $server->server_difficulty->map_content_mines           = Input::get('map_content_mines');
        $server->server_difficulty->map_content_ping            = Input::get('map_content_ping');
        $server->server_difficulty->multiple_saves              = Input::get('multiple_saves');
        $server->server_difficulty->reduced_damage              = Input::get('reduced_damage');
        $server->server_difficulty->score_table                 = Input::get('score_table');
        $server->server_difficulty->squad_radar                 = Input::get('squad_radar');
        $server->server_difficulty->stamina_bar                 = Input::get('stamina_bar');
        $server->server_difficulty->stance_indicator            = Input::get('stance_indicator');
        $server->server_difficulty->tactical_ping               = Input::get('tactical_ping');
        $server->server_difficulty->third_person_view           = Input::get('third_person_view');
        $server->server_difficulty->vision_aid                  = Input::get('vision_aid');
        $server->server_difficulty->vonid                       = Input::get('vonid');
        $server->server_difficulty->waypoints                   = Input::get('waypoints');
        $server->server_difficulty->weapon_crosshair            = Input::get('weapon_crosshair');
        $server->server_difficulty->weapon_info                 = Input::get('weapon_info');
        $server->server_difficulty->skill_ai                    = Input::get('skill_ai');
        $server->server_difficulty->precision_ai                = Input::get('precision_ai');
        $server->server_difficulty->save();

        $server->save();

        return Redirect::to('backend#backend/server');
    }

    public function GenerateFiles($server_id)
    {
        $data['server']             = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->find($server_id);
        $data['bans']               = ServerBans::all();

        $data['server']['hostname_escaped'] =  htmlspecialchars($data['server']['hostname']);

        $server = Server::find($server_id);

        $file                       = new stdClass();
        $file->server_init          = View::make('backend.server.cfg_server_init', $data)->renderSections();
        $file->server_bat           = View::make('backend.server.cfg_server_bat', $data)->renderSections();
        $file->server_cfg           = View::make('backend.server.cfg_server_cfg', $data)->renderSections();
        if($server->cpu_count > 0) $file->hc1_xml = View::make('backend.server.cfg_hc1_xml', $data)->renderSections();
        if($server->cpu_count > 1) $file->hc2_xml = View::make('backend.server.cfg_hc2_xml', $data)->renderSections();
        if($server->cpu_count > 2) $file->hc3_xml = View::make('backend.server.cfg_hc3_xml', $data)->renderSections();
        $file->server_xml           = View::make('backend.server.cfg_server_xml', $data)->renderSections();
        $file->basic_cfg            = View::make('backend.server.cfg_basic_cfg', $data)->renderSections();
        $file->parameters_cfg       = View::make('backend.server.cfg_parameters_cfg', $data)->renderSections();
        $file->bans_txt             = View::make('backend.server.cfg_bans_txt', $data)->renderSections();
        $file->beserver_cfg         = View::make('backend.server.cfg_beserver_cfg', $data)->renderSections();
        $file->arma3profile         = View::make('backend.server.cfg_arma3profile', $data)->renderSections();

        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/battleye');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/logs');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/profile');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/profile/users');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/administrator');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/arma3');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/arma3/Saved');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/arma3/Saved/steam');
        @mkdir($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/arma3/Saved/steam/meta');

        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/server.bat', $file->server_bat);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/server.cfg', $file->server_cfg);
        if($server->cpu_count > 0) $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/hc1.xml', $file->hc1_xml);
        if($server->cpu_count > 1) $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/hc2.xml', $file->hc2_xml);
        if($server->cpu_count > 2) $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/hc3.xml', $file->hc3_xml);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/server.xml', $file->server_xml);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/basic.cfg', $file->basic_cfg);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/parameters.cfg', $file->parameters_cfg);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/battleye/beserver.dll', file_get_contents($this->arma3path.'/battleye/beserver.dll'));
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/battleye/bans.txt', $file->bans_txt);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/battleye/beserver.cfg', $file->beserver_cfg);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/arma3/arma3.Arma3Profile', $file->arma3profile);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/arma3/Arma3.cfg', $file->basic_cfg);
        $this->file_force_contents($this->arma3path.'/instances/' . $data['server']->name . '/profile/users/administrator/Arma3.cfg', $file->basic_cfg);

        $hc1 = $this->arma3path.'/instances/' . $data['server']->name . '/hc1.xml';
        $hc2 = $this->arma3path.'/instances/' . $data['server']->name . '/hc2.xml';
        $hc3 = $this->arma3path.'/instances/' . $data['server']->name . '/hc3.xml';
        $ser = $this->arma3path.'/instances/' . $data['server']->name . '/server.xml';
        if($server->cpu_count > 0) shell_exec($this->fireDeamonExe.' --install "'.$hc1.'"');
        if($server->cpu_count > 1) shell_exec($this->fireDeamonExe.' --install "'.$hc2.'"');
        if($server->cpu_count > 2) shell_exec($this->fireDeamonExe.' --install "'.$hc3.'"');
        shell_exec($this->fireDeamonExe.' --install "'.$ser.'"');
    }

    public function GetLogList($server_id)
    {
        $data['server']     = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->find($server_id);
        $data['arma3path']  = $this->arma3path;

        $i=0;
        $data['console_logs'] = array();
        foreach(glob($this->arma3path.'/instances/' . $data['server']->name . '/logs/*.log') as $path)
        {
            $file = basename($path);
            $data['console_logs'][$i]['name'] = $file;
            $data['console_logs'][$i]['path'] = $path;
            $data['console_logs'][$i]['date'] = date("Y-m-d H:i:s",filemtime($this->arma3path.'/instances/' . $data['server']->name . '/logs/'.$file));
            $data['console_logs'][$i]['size'] = round((filesize($this->arma3path.'/instances/' . $data['server']->name . '/logs/'.$file)/1024/1024),2);
            $i++;
        }
        unset($i);

        $i=0;
        $data['rpt_logs'] = array();
        foreach(glob($this->arma3path.'/instances/' . $data['server']->name . '/profile/*.rpt') as $path)
        {
            $file = basename($path);
            $data['rpt_logs'][$i]['name'] = $file;
            $data['rpt_logs'][$i]['path'] = $path;
            $data['rpt_logs'][$i]['date'] = date("Y-m-d H:i:s",filemtime($this->arma3path.'/instances/' . $data['server']->name . '/profile/'.$file));
            $data['rpt_logs'][$i]['size'] = round((filesize($this->arma3path.'/instances/' . $data['server']->name . '/profile/'.$file)/1024/1024),2);
            $i++;
        }
        unset($i);

        return View::make('backend.server.loglist', $data);
    }

    public function GetLogviewer($server_id, $filepath)
    {
        $data['server']     = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->find($server_id);
        $logfile            = base64_decode($filepath);
        $data['filename']   = basename($logfile);
        if(file_exists($logfile))
        {
            $data["contents"] = file_get_contents($logfile);
            if(strlen($data["contents"]) < 1)
            {
                $data["contents"] = "Nothing in console log, there was probably no error.";
            }
        }
        else
        {
            $data["contents"] = "File doesn't exist";
        }

        return View::make('backend.server.logviewer', $data);
    }

    /*
    public function GetLogViewer($server_id)
    {
        $data['server']    = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_dificulty_recruit','server_dificulty_regular','server_dificulty_veteran','server_dificulty_mercenary')->find($server_id);

        function MostRecentFile($dir) {        
            $lastMod = 0;
            $lastModFile = '';
            foreach (scandir($dir) as $entry) {
                if (is_file($dir.$entry) && filectime($dir.$entry) > $lastMod) {
                    $lastMod = filectime($dir.$entry);
                    $lastModFile = $dir.$entry;
                } 
            }
            return $lastModFile;
        }

        $data["console_log_file"] = MostRecentFile($this->arma3path."/instances/".$data['server']['name']."/logs/");
        $data["console_log_contents"] = "";
        if(file_exists($data["console_log_file"])) {
            $data["console_log_contents"] = file_get_contents($data["console_log_file"]);
            if(strlen($data["console_log_contents"]) < 1) {
                $data["console_log_contents"] = "Nothing in console log, there was probably no error.";
            }
        } else {
            $data["console_log_contents"] = "File doesn't exist";
        }

        $data["rpt_log_file"] = MostRecentFile($this->arma3path."/instances/".$data['server']['name']."/profile/");
        $data["rpt_log_contents"] = "";
        if(file_exists($data["rpt_log_file"])) {
            $data["rpt_log_contents"] = file_get_contents($data["rpt_log_file"]);
            if(strlen($data["rpt_log_contents"]) < 1) {
                $data["rpt_log_contents"] = "Nothing in rpt log. Maybe you need to remove -noLogs or wait for server to start, loading all the mods takes a while.";
            }
        } else {
            $data["rpt_log_contents"] = "File doesn't exist";
        }

        return View::make('backend.server.logviewer', $data);
    }
    */

    public function GetFileManagerView($server_id)
    {
        $data['server']    = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->find($server_id);

        return View::make('backend.server.filemanager', $data);
    }

    public function GetFileManagerConnector($server_id)
    {
        $server    = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->find($server_id);
     
        $opts      =
        [
            'dir'       => 'files',
            'access'    => 'Barryvdh\Elfinder\Elfinder::checkAccess',
            'roots'     =>
            [
                [
                    'driver' => 'LocalFileSystem',
                    'path'   => 'C:/controlpanel/public/instances/' . $server->name . '',
                    'URL'    => 'http://arma3.odin-ict.nl/instances/' . $server->name . ''
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
            $this->file_force_contents($this->arma3path.'/instances/' . $server->name . '/battleye/bans.txt', View::make('backend.server.cfg_bans_txt', $data)->renderSections());
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
        
        $missions = array();
      
        foreach ($this->GetMissionsList() as $mission) {
            $missions[] = array(
                'name' => $mission,
                'url' => base64_encode($mission),
                'date' => date("Y-m-d H:i:s",filemtime($this->arma3path."/mpmissions/".$mission)),
                'size' => round((filesize($this->arma3path."/mpmissions/".$mission)/1024/1024),2),
            );
        }

        $data['message']            = $message;
        $data['message_type']       = $message_type;
        $data['missions']           = $missions;
        $data['can_delete']         = Auth::user()->can('delete_mission');

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
            else if(Input::file('mission')->move($this->arma3path."/mpmissions", Input::file('mission')->getClientOriginalName()))
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
        $missions = array_slice(scandir($this->arma3path."/mpmissions"), 2);
        natcasesort($missions);
        return $missions;
    }
    
    public function GetDeleteMission($mission)
    {
        if ( ! Auth::user()->can('mission_server'))
            return Redirect::to('backend/server');
        
        $mission = $this->mission_name_from_url($mission);
        $message = 'warning/no message';

        if(file_exists($this->arma3path."/mpmissions/$mission")) 
        {
            $success = true;
            try 
            {
                $success &= unlink($this->arma3path."/mpmissions/$mission");
            }
            catch (Exception $e)
            {
                $success = false;
            }
            if($success) $message = "success/Successfully deleted mission: '$mission'";
            else $message = "danger/Failed to delete mission: '$mission', some server is probably currently running this mission";
        } 
        else 
        {
            $message = "danger/Mission to delete not found: '$mission'";
        }

        return Redirect::to('backend/server/missions/'.$message);
    }
    
    public function GetDownloadMission($mission)
    {
        if ( ! Auth::user()->can('mission_server'))
            return Redirect::to('backend/server');

        $mission = $this->mission_name_from_url($mission);
     
        if(file_exists($this->arma3path."/mpmissions/$mission")) 
        {
            return Response::download($this->arma3path."/mpmissions/$mission");
        } 
        else 
        {
            $message = "danger/Mission to download not found: '$mission'";
            return Redirect::to('backend/server/missions/'.$message);
        }
    }

    public function mission_name_from_url($url) 
    {
        return base64_decode($url);
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
        try {

            $servers            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')/*->orderBy('name', 'asc')*/->get();
        
            $GameQ = new \GameQ\GameQ();

            foreach($servers as &$server)
            {    
                // if there is an offline server in the addServer serportvers, all subsequent servers will not work
                if(file_exists($this->arma3path.'/instances/' . $server->name . '/server.pid')) 
                {
                    $GameQ->addServer([
                        'type' => 'Armedassault3',
                        'host' => '127.0.0.1:' . $server->port . '2'
                    ]);
                }
            }
            $gameq = $GameQ->process();

            $data['players'] = [];

            foreach($servers as $server)
            {
                $serverAddress = '127.0.0.1:' . $server->port . '2';

                $data[$serverAddress] = [];
                if(isset($gameq[$serverAddress]))
                {
                    $data[$serverAddress]['online'] = $gameq[$serverAddress]['gq_online'];
                    $data[$serverAddress]['players'] = $gameq[$serverAddress]['players'];
                    //$data[$serverAddress]['gameq_queried'] = true;                    
                    //var_dump($gameq[$serverAddress]);
                } else {
                    $data[$serverAddress]['online'] = 0;
                    $data[$serverAddress]['players'] = [];
                    //$data[$serverAddress]['gameq_queried'] = false;
                }

                if(isset($gameq[$serverAddress]['num_players']))
                {
                    $data[$serverAddress]['players_num']        = $gameq[$serverAddress]['num_players'];
                    $data[$serverAddress]['players_max']        = $server->server_cfg->maxPlayers;
                    $data[$serverAddress]['players_percentage'] = (isset($server->server_cfg->maxPlayers)) ? ((100 / $server->server_cfg->maxPlayers) * $gameq[$serverAddress]['num_players']) : 0 ;
                    
                }
                else
                {
                    $data[$serverAddress]['players_num']        = 0;
                    $data[$serverAddress]['players_max']        = (isset($server->server_cfg->maxPlayers)) ? $server->server_cfg->maxPlayers : 0 ;
                    $data[$serverAddress]['players_percentage'] = 0;
                }
            
            }

            return Response::json($data);

        } catch (Exception $e) {
            return Response::json(array('exception' => $e->getMessage()));          
        }
    }

    public function ApiGetServerStats()
    {
        $servers            = Server::with('server_cfg', 'server_basic_cfg', 'server_profile', 'server_difficulty')->orderBy('name', 'asc')->get();

        $data['cpu'] = [];
        $data['mem'] = [];
        $data['net'] = [];
        $pids = '';
        $i = 0;
        foreach($servers as $server)
        {
            if(file_exists($this->arma3path.'/instances/' . $server->name . '/server.pid'))
            {
                $pid = str_replace(PHP_EOL, '', file_get_contents($this->arma3path.'/instances/' . $server->name . '/server.pid'));
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


        foreach($servers as $server)
        {
            $data['cpu']['127.0.0.1:' . $server->port . '2']                = [];
            $data['cpu']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
            $data['mem']['127.0.0.1:' . $server->port . '2']                = [];
            $data['mem']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
            $data['net']['127.0.0.1:' . $server->port . '2']                = 0;
        }

        $context    = stream_context_create($opts);
        $file       = @file_get_contents($url . $pids, false, $context);

        if($file) {

            $pidlist    = json_decode($file, true);
            unset($url);
            unset($opts);
            unset($context);
            unset($file);
            unset($pids);

            foreach($servers as $server)
            {
                if(file_exists($this->arma3path.'/instances/' . $server->name . '/server.pid'))
                {
                    $data['cpu']['127.0.0.1:' . $server->port . '2']                = [];
                    $data['cpu']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
                    $data['mem']['127.0.0.1:' . $server->port . '2']                = [];
                    $data['mem']['127.0.0.1:' . $server->port . '2']['percentage']  = 0;
                    $data['net']['127.0.0.1:' . $server->port . '2']                = 0;

                    $pid = str_replace(PHP_EOL, '', file_get_contents($this->arma3path.'/instances/' . $server->name . '/server.pid'));
                    if(isset($pidlist[$pid]))
                    {
                        $data['cpu']['127.0.0.1:' . $server->port . '2']['percentage']  = $pidlist[$pid]['cpu'];
                        $data['mem']['127.0.0.1:' . $server->port . '2']['percentage']  = ((100 / $server->memory) * ($pidlist[$pid]['memory']) / 1024 / 1024);
                        $data['net']['127.0.0.1:' . $server->port . '2']                = $pidlist[$pid]['network'];
                    }
                }
            }
        }

        return Response::json($data);
    }

    private function getpidinfo($pid, $ps_opt="aux")
    {
        $ps=shell_exec("/usr/bin/sudo /bin/ps ".$ps_opt."p ".$pid);
        $ps=explode("\n", $ps);

        if(count($ps)<2)
        {
            trigger_error("PID ".$pid." doesn't exists", E_USER_WARNING);
            return false;
        }

        foreach($ps as $key=>$val)
        {
            $ps[$key]=explode(" ", preg_replace("/ +/", " ", trim($ps[$key])));
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

    public function get_all_mods()
    {
        $mod_array = [];

        $objects = scandir($this->arma3path);
        foreach ($objects as $object)
        {
            if ($object != "." && $object != "..")
            {
                if ((filetype($this->arma3path . "/" . $object) == "dir") and (substr($object, 0, 1) == '@'))
                {
                    $mod_array[] = $object;
                }
            }
        }

        return $mod_array;
    }
}
