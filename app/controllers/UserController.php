<?php

class UserController extends BaseController
{
    public function GetIndex()
    {
        if ( ! Auth::user()->can('see_user'))
            return Redirect::to('backend#backend/dashboard/index');

        $data['users']          = User::all();

        $data['can_create']     = Auth::user()->can('create_user');
        $data['can_update']     = Auth::user()->can('update_user');
        $data['can_delete']     = Auth::user()->can('delete_user');
        $data['can_profile']    = Auth::user()->can('edit_profile');

        return View::make('backend.security.user.index', $data);
    }

    public function GetMyProfile()
    {
		if ( ! Auth::user()->can('edit_profile'))
            return Redirect::to('backend#backend/dashboard/index');
		
        $data['profile'] = Auth::user();

        return View::make('backend.security.profile.index', $data);
    }

    public function PostMyProfile()
    {
        $user = User::find(Auth::id());

        if (Input::get('password') != '')
            $user->password = Input::get('password');
    
		if (Input::hasFile('picture'))
		{
			$extension = Input::file('picture')->getClientOriginalExtension();
			$username  = $user->username;
			Input::file('picture')->move('C:/inetpub/wwwroot/cp.am2.taw.net/public/assets/modules/profile/', $username . '.' . $extension);
			$user->picture = '/assets/modules/profile/' . $username . '.' . $extension;
		}
		$user->save();
		
		return Redirect::to('backend#backend/my-profile');
    }

    public function GetCreate()
    {
        if ( ! Auth::user()->can('create_user'))
            return Redirect::to('backend#backend/security/user');

        return View::make('backend.security.user.create');
    }
    
    public function PostCreate()
    {
        if ( ! Auth::user()->can('create_user'))
            return Redirect::to('backend#backend/security/user');

        $user                   = new User;
        $user->username         = Input::get('username');
        $user->password         = Input::get('password');
        $user->email            = Input::get('email');
        $user->verified         = Input::get('verified') == 'no' ? 0 : 1 ;
        $user->disabled         = Input::get('disabled') == 'no' ? 0 : 1 ;
        $user->save();

        return Redirect::to('backend#backend/security/user');
    }
    
    public function GetUpdate($user_id)
    {
        if ( ! Auth::user()->can('update_user'))
            return Redirect::to('backend#backend/security/user');

        $data['user']           = User::find($user_id);
        $data['roles']          = Role::all();
        $data['user_roles']     = [];
        foreach($data['user']->roles as $role)
            $data['user_roles'][$role->id] = $role->id;

        return View::make('backend.security.user.update', $data);
    }
    
    public function PostUpdate($user_id)
    {
        if ( ! Auth::user()->can('update_user'))
            return Redirect::to('backend#backend/security/user');

        $user                   = User::find($user_id);
        $user->username         = Input::get('username');

        if (Input::get('password') != '')
            $user->password = Input::get('password');

        $user->email            = Input::get('email');
        $user->verified         = Input::get('verified') == 'no' ? 0 : 1 ;
        $user->disabled         = Input::get('disabled') == 'no' ? 0 : 1 ;
        $user->save();

        return Redirect::to('backend#backend/security/user');
    }
    
    public function PostUpdateRole($user_id)
    {
        if ( ! Auth::user()->can('update_user'))
            return Redirect::to('backend#backend/security/user');

        $user                   = User::find($user_id);
        $roles                  = [];
        
        if (null !== Input::get('roles'))
            foreach(Input::get('roles') as $key => $value)
                $roles[$value] = $value;

        $user->roles()->sync($roles);
        $user->save();

        return Redirect::to('backend#backend/security/user');
    }
    
    public function GetDelete($user_id)
    {
        if ( ! Auth::user()->can('delete_user'))
            return Redirect::to('backend#backend/security/user');

        $user                   = User::find($user_id);
        $user->delete();

        return Redirect::to('backend#backend/security/user');
    }		
}
