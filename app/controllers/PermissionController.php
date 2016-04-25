<?php

class PermissionController extends BaseController
{
    public function GetIndex()
    {
        if ( ! Auth::user()->can('see_permission'))
            return Redirect::to('backend#backend/dashboard');

        $data['permissions']        = Permission::all();

        $data['can_create']         = Auth::user()->can('create_permission');
        $data['can_update']         = Auth::user()->can('update_permission');
        $data['can_delete']         = Auth::user()->can('delete_permission');
        
        return View::make('backend.security.permission.index', $data);
    }

    public function GetCreate()
    {
        if ( ! Auth::user()->can('create_permission'))
            return Redirect::to('backend#backend/security/permission');

        return View::make('backend.security.permission.create');
    }
    
    public function PostCreate()
    {
        if ( ! Auth::user()->can('create_permission'))
            return Redirect::to('backend#backend/security/permission');

        $permission                 = new Permission;
        $permission->name           = Input::get('name');
        $permission->description    = Input::get('description');
        $permission->save();

        return Redirect::to('backend#backend/security/permission');
    }
    
    public function GetUpdate($permission_id)
    {
        if ( ! Auth::user()->can('update_permission'))
            return Redirect::to('backend#backend/security/permission');

        $data['permission']         = Permission::find($permission_id);

        return View::make('backend.security.permission.update', $data);
    }
    
    public function PostUpdate($permission_id)
    {
        if ( ! Auth::user()->can('update_permission'))
            return Redirect::to('backend#backend/security/permission');

        $permission                 = Permission::find($permission_id);
        $permission->name           = Input::get('name');
        $permission->description    = Input::get('description');
        $permission->save();

        return Redirect::to('backend#backend/security/permission');
    }
    
    public function GetDelete($permission_id)
    {
        if ( ! Auth::user()->can('delete_permission'))
            return Redirect::to('backend#backend/security/permission');

        $permission                 = Permission::find($permission_id);
        $permission->delete();

        return Redirect::to('backend#backend/security/permission');
    }
}
