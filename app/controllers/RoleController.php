<?php

class RoleController extends BaseController
{
    public function GetIndex()
    {
        if ( ! Auth::user()->can('see_role'))
            return Redirect::to('backend#backend/dashboard');

        $data['roles']          = Role::all();

        $data['can_create']     = Auth::user()->can('create_role');
        $data['can_update']     = Auth::user()->can('update_role');
        $data['can_delete']     = Auth::user()->can('delete_role');

        return View::make('backend.security.role.index', $data);
    }

    public function GetCreate()
    {
        if ( ! Auth::user()->can('create_role'))
            return Redirect::to('backend#backend/security/role');

        return View::make('backend.security.role.create');
    }
    
    public function PostCreate()
    {
        if ( ! Auth::user()->can('create_role'))
            return Redirect::to('backend#backend/security/role');

        $role               = new Role;
        $role->name         = Input::get('name');
        $role->description  = Input::get('description');
        $role->level        = Input::get('level');
        $role->save();

        return Redirect::to('backend#backend/security/role');
    }
    
    public function GetUpdate($role_id)
    {
        if ( ! Auth::user()->can('update_role'))
            return Redirect::to('backend#backend/security/role');

        $data['role']           = Role::find($role_id);
        $data['permissions']    = Permission::all();
        $data['role_permissions']     = [];

        foreach($data['role']->permissions as $permission)
            $data['role_permissions'][$permission->id]  = $permission->id;

        return View::make('backend.security.role.update', $data);
    }
    
    public function PostUpdate($role_id)
    {
        if ( ! Auth::user()->can('update_role'))
            return Redirect::to('backend#backend/security/role');

        $role               = Role::find($role_id);
        $role->name         = Input::get('name');
        $role->description  = Input::get('description');
        $role->level        = Input::get('level');
        $role->save();

        return Redirect::to('backend#backend/security/role');
    }
    
    public function PostUpdatePermission($role_id)
    {
        if ( ! Auth::user()->can('update_role'))
            return Redirect::to('backend#backend/security/role');

        $role               = Role::find($role_id);
        $permissions        = [];

        if (null !== Input::get('permissions'))
            foreach(Input::get('permissions') as $key => $value)
                $permissions[$value]  = $value;

        $role->permissions()->sync($permissions);
        $role->save();

        return Redirect::to('backend#backend/security/role');
    }
    
    public function GetDelete($role_id)
    {
        if ( ! Auth::user()->can('delete_role'))
            return Redirect::to('backend#backend/security/role');

        $role               = Role::find($role_id);
        $role->delete();

        return Redirect::to('backend#backend/security/role');
    }

    public function GetUpdateRole($server_id)
    {
        if ( ! Auth::user()->can('update_role'))
            return Redirect::to('backend/security/role');

        $data['server']                     = Server::find($server_id);
        $data['roles']                      = Role::all();
        if (Auth::user()->is('sa') or Auth::user()->is('st'))
        {
            $data['is_admin']               = true;
        }
        else
        {
            $data['is_admin']               = false;
        }
        $data['server_roles']               = [];

        foreach($data['server']->roles as $user)
            $data['server_roles'][$user->id] = $user->id;

        return View::make('backend.security.role.update', $data);
    }
}
