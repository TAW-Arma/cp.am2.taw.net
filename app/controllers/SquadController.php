<?php

class SquadController extends BaseController
{
    public function GetIndex()
    {
        if ( ! Auth::user()->can('see_squad'))
            return Redirect::to('backend#backend/dashboard/index');

        if( Auth::user()->is('sa') ):

            $data['squads']             = Squad::all();

        else:

            $data['squads']             = Auth::user()->squads;

        endif;

        $data['can_create']         = Auth::user()->can('create_squad');
        $data['can_update']         = Auth::user()->can('update_squad');
        $data['can_delete']         = Auth::user()->can('delete_squad');
        $data['can_manage']         = Auth::user()->can('manage_squad');

        return View::make('backend.squad.index', $data);
    }

    public function GetCreate()
    {
        if ( ! Auth::user()->can('create_squad'))
            return Redirect::to('backend#backend/squad');

        return View::make('backend.squad.create');
    }
    
    public function PostCreate()
    {
        if ( ! Auth::user()->can('create_squad'))
            return Redirect::to('backend#backend/squad');

        $squad                      = new Squad;
        $squad->nickname            = Input::get('nickname');
        $squad->name                = Input::get('name');
        $squad->email               = Input::get('email');
        $squad->web                 = Input::get('web');
        if (Input::hasFile('picture'))
        {
            Input::file('picture')->move('C:\\www\\cp.am2.taw.net\\public\\assets\\modules\\squad\\', $squad->nickname . '.png');
            $squad->picture         = '/assets/modules/squad/' . $squad->nickname . '.png';
            shell_exec('C:\\ImageToPAA\\ImageToPAA.exe C:\\www\\cp.am2.taw.net\\public\\assets\\modules\\squad\\' . $squad->nickname . '.png C:\\www\\cp.am2.taw.net\\public\\assets\\modules\\squad\\' . $squad->nickname . '.paa');
        }
        else
        {
            $squad->picture         = '';
        }
        $squad->title               = Input::get('title');
        $squad->save();

        

        return Redirect::to('backend#backend/squad');
    }
    
    public function GetUpdate($squad_id)
    {
        if ( ! Auth::user()->can('update_squad'))
            return Redirect::to('backend#backend/squad');

        $data['squad']              = Squad::find($squad_id);
        $data['users']              = User::all();
        if(Auth::user()->is('sa') or Auth::user()->is('st'))
        {
            $data['is_admin']           = true;
        }
        else
        {
            $data['is_admin']           = false;
        }
        $data['squad_users']        = [];
        foreach($data['squad']->users as $user)
            $data['squad_users'][$user->id] = $user->id;

        return View::make('backend.squad.update', $data);
    }
    
    public function PostUpdate($squad_id)
    {
        if ( ! Auth::user()->can('update_squad'))
            return Redirect::to('backend#backend/squad');

        $squad                      = Squad::find($squad_id);
        $squad->nickname            = Input::get('nickname');
        $squad->name                = Input::get('name');
        $squad->email               = Input::get('email');
        $squad->web                 = Input::get('web');
        if (Input::hasFile('picture'))
        {
            Input::file('picture')->move('C:\\www\\cp.am2.taw.net\\public\\assets\\modules\\squad\\', $squad->nickname . '.png');
            $squad->picture         = '/assets/modules/squad/' . $squad->nickname . '.png';
            shell_exec('C:\\ImageToPAA\\ImageToPAA.exe C:\\www\\cp.am2.taw.net\\public\\assets\\modules\\squad\\' . $squad->nickname . '.png C:\\www\\cp.am2.taw.net\\public\\assets\\modules\\squad\\' . $squad->nickname . '.paa');
        }
        $squad->title               = Input::get('title');
        $squad->save();

        return Redirect::to('backend#backend/squad');
    }
    
    public function PostUpdateManagement($squad_id)
    {
        if ( ! Auth::user()->can('update_squad'))
            return Redirect::to('backend#backend/squad');

        $squad                      = Squad::find($squad_id);
        $squad->users()->sync(Input::get('users'));
        $squad->save();

        return Redirect::to('backend#backend/squad');
    }
    
    public function GetUpdateMembers($squad_id)
    {
        if ( ! Auth::user()->can('manage_squad'))
            return Redirect::to('backend#backend/squad');

        $data['squad']              = Squad::find($squad_id);
        $data['members']            = SquadMember::where('squad_id', '=', $squad_id)->get();

        return View::make('backend.squad.members', $data);
    }
    
    public function PostUpdateMembers($squad_id)
    {
        if ( ! Auth::user()->can('manage_squad'))
            return Redirect::to('backend#backend/squad');
        
        $squad                      = Squad::find($squad_id);

        $row                                                = Input::get('row');
        $player_id                                          = Input::get('player_id');
        $nickname                                           = Input::get('nickname');
        $name                                               = Input::get('name');
        $email                                              = Input::get('email');
        $icq                                                = Input::get('icq');
        $remark                                             = Input::get('remark');
        $is_not_delete                                      = array();
        for($i=0; $i < count(Input::get('row')); $i++)
        {
            if(!empty($player_id[$i]))
            {
                if(!$row[$i]==0)
                {
                    $squad_member                           = SquadMember::find($row[$i]);
                    $squad_member->squad_id                 = $squad_id;
                    $squad_member->player_id                = $player_id[$i];
                    $squad_member->nickname                 = $nickname[$i];
                    $squad_member->name                     = $name[$i];
                    $squad_member->email                    = $email[$i];
                    $squad_member->icq                      = $icq[$i];
                    $squad_member->remark                   = $remark[$i];
                    $squad_member->save();
                    $squad_member->squad()->associate($squad);
                    $is_not_delete[]                        = $squad_member->id;
                    unset($squad_member);
                }
                else
                {
                    $squad_member                           = new SquadMember;
                    $squad_member->squad_id                 = $squad_id;
                    $squad_member->player_id                = $player_id[$i];
                    $squad_member->nickname                 = $nickname[$i];
                    $squad_member->name                     = $name[$i];
                    $squad_member->email                    = $email[$i];
                    $squad_member->icq                      = $icq[$i];
                    $squad_member->remark                   = $remark[$i];
                    $squad_member->save();
                    $squad_member->squad()->associate($squad);
                    $is_not_delete[]                        = $squad_member->id;
                    
                    unset($squad_member);
                }
            }
        }
        if(!empty($is_not_delete))
        {
            SquadMember::where('squad_id','=', $squad_id)->whereNotIn('id', $is_not_delete)->delete();
        }
        else
        {
            SquadMember::where('squad_id','=', $squad_id)->delete();
        }
        unset($is_not_delete);
        
        $this->GenerateFiles($squad_id);

        return Redirect::to('backend#backend/squad');
    }
    
    public function GetDelete($squad_id)
    {
        if ( ! Auth::user()->can('delete_squad'))
            return Redirect::to('backend#backend/squad');

        $squad                      = Squad::find($squad_id);
        $squad->delete();

        return Redirect::to('backend#backend/squad');
    }
    
    public function GenerateFiles($squad_id)
    {
        $data['squad']      = Squad::find($squad_id);
        $data['members']    = SquadMember::where('squad_id', '=', $data['squad']->id)->get();

        $files['xml']       = View::make('backend.squad.xml', $data);
        $files['xsl']       = View::make('backend.squad.xsl', $data);
        $files['dtd']       = View::make('backend.squad.dtd', $data);
        $files['css']       = View::make('backend.squad.css', $data);
        $files['png']       = @file_get_contents('C:\\www\\cp.am2.taw.net\\public' . $data['squad']->picture);
        $files['paa']       = @file_get_contents('C:\\www\\cp.am2.taw.net\\public' . substr($data['squad']->picture, 0, -4) . '.paa');

        @mkdir('C:\\www\\am2.taw.net\\public\\squads\\' . $data['squad']->nickname);
        file_put_contents('C:\\www\\am2.taw.net\\public\\squads\\' . $data['squad']->nickname . '\\squad.xml', $files['xml']);
        file_put_contents('C:\\www\\am2.taw.net\\public\\squads\\' . $data['squad']->nickname . '\\squad.xsl', $files['xsl']);
        file_put_contents('C:\\www\\am2.taw.net\\public\\squads\\' . $data['squad']->nickname . '\\squad.dtd', $files['dtd']);
        file_put_contents('C:\\www\\am2.taw.net\\public\\squads\\' . $data['squad']->nickname . '\\squad.css', $files['css']);
        file_put_contents('C:\\www\\am2.taw.net\\public\\squads\\' . $data['squad']->nickname . '\\' . $data['squad']->nickname . '.png',  $files['png']);
        file_put_contents('C:\\www\\am2.taw.net\\public\\squads\\' . $data['squad']->nickname . '\\' . $data['squad']->nickname . '.paa',  $files['paa']);

    }

    public function GetSquadXML($squad_nickname)
    {
        $data['squad']              = Squad::where('nickname', '=', $squad_nickname)->first();
        $data['members']            = SquadMember::where('squad_id', '=', $data['squad']->id)->get();

        $content = View::make('backend.squad.xml', $data);
        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
    
    public function GetSquadXSL($squad_nickname)
    {
        $data['squad']              = Squad::where('nickname', '=', $squad_nickname)->first();
        $data['members']            = SquadMember::where('squad_id', '=', $data['squad']->id)->get();

        $content = View::make('backend.squad.xsl', $data);
        return Response::make($content, '200')->header('Content-Type', 'text/xsl');
    }
    
    public function GetSquadDTD($squad_nickname)
    {
        $content =  View::make('backend.squad.dtd');
        return Response::make($content, '200')->header('Content-Type', 'text/dtd');
    }
    
    public function GetSquadCSS($squad_nickname)
    {
        $content =  View::make('backend.squad.css');
        return Response::make($content, '200')->header('Content-Type', 'text/css');
    }
    
    public function GetSquadLogoPAA($squad_nickname)
    {
        $squad      = Squad::where('nickname', '=', $squad_nickname)->first();
        $content    = file_get_contents('C:\\www\\cp.am2.taw.net\\public' . substr($squad->picture, 0, -4) . '.paa');
        return Response::make($content, '200');
    }
    
    public function GetSquadLogoPNG($squad_nickname)
    {
        $squad      = Squad::where('nickname', '=', $squad_nickname)->first();
        $content    = file_get_contents('C:\\www\\cp.am2.taw.net\\public' . $squad->picture);
        return Response::make($content, '200')->header('Content-Type', 'image/jpeg');
    }
}
