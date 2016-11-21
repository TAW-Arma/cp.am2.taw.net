<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->call('SquadTableSeeder');
        $this->call('ServerTableSeeder');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        $permission['see_dashboard']                        = new Permission;
        $permission['see_dashboard']->name                  = 'see_dashboard';
        $permission['see_dashboard']->description           = 'See Dashboard';
        $permission['see_dashboard']->save();

        $permission['see_security']                         = new Permission;
        $permission['see_security']->name                   = 'see_security';
        $permission['see_security']->description            = 'See Security';
        $permission['see_security']->save();

        $permission['see_user']                             = new Permission;
        $permission['see_user']->name                       = 'see_user';
        $permission['see_user']->description                = 'See User';
        $permission['see_user']->save();

        $permission['create_user']                          = new Permission;
        $permission['create_user']->name                    = 'create_user';
        $permission['create_user']->description             = 'Create User';
        $permission['create_user']->save();

        $permission['update_user']                          = new Permission;
        $permission['update_user']->name                    = 'update_user';
        $permission['update_user']->description             = 'Update User';
        $permission['update_user']->save();

        $permission['delete_user']                          = new Permission;
        $permission['delete_user']->name                    = 'delete_user';
        $permission['delete_user']->description             = 'Delete User';
        $permission['delete_user']->save();

        $permission['see_role']                             = new Permission;
        $permission['see_role']->name                       = 'see_role';
        $permission['see_role']->description                = 'See Role';
        $permission['see_role']->save();

        $permission['create_role']                          = new Permission;
        $permission['create_role']->name                    = 'create_role';
        $permission['create_role']->description             = 'Create Role';
        $permission['create_role']->save();

        $permission['update_role']                          = new Permission;
        $permission['update_role']->name                    = 'update_role';
        $permission['update_role']->description             = 'Update Role';
        $permission['update_role']->save();

        $permission['delete_role']                          = new Permission;
        $permission['delete_role']->name                    = 'delete_role';
        $permission['delete_role']->description             = 'Delete Role';
        $permission['delete_role']->save();

        $permission['see_permission']                       = new Permission;
        $permission['see_permission']->name                 = 'see_permission';
        $permission['see_permission']->description          = 'See Permission';
        $permission['see_permission']->save();

        $permission['create_permission']                    = new Permission;
        $permission['create_permission']->name              = 'create_permission';
        $permission['create_permission']->description       = 'Create Permission';
        $permission['create_permission']->save();

        $permission['update_permission']                    = new Permission;
        $permission['update_permission']->name              = 'update_permission';
        $permission['update_permission']->description       = 'Update Permission';
        $permission['update_permission']->save();

        $permission['delete_permission']                    = new Permission;
        $permission['delete_permission']->name              = 'delete_permission';
        $permission['delete_permission']->description       = 'Delete Permission';
        $permission['delete_permission']->save();

        $permission['see_server']                             = new Permission;
        $permission['see_server']->name                       = 'see_server';
        $permission['see_server']->description                = 'See Server';
        $permission['see_server']->save();

        $permission['create_server']                          = new Permission;
        $permission['create_server']->name                    = 'create_server';
        $permission['create_server']->description             = 'Create Server';
        $permission['create_server']->save();

        $permission['update_server']                          = new Permission;
        $permission['update_server']->name                    = 'update_server';
        $permission['update_server']->description             = 'Update Server';
        $permission['update_server']->save();

        $permission['delete_server']                          = new Permission;
        $permission['delete_server']->name                    = 'delete_server';
        $permission['delete_server']->description             = 'Delete Server';
        $permission['delete_server']->save();

        $permission['manage_server']                          = new Permission;
        $permission['manage_server']->name                    = 'manage_server';
        $permission['manage_server']->description             = 'Manage Server';
        $permission['manage_server']->save();

        $permission['see_squad']                             = new Permission;
        $permission['see_squad']->name                       = 'see_squad';
        $permission['see_squad']->description                = 'See Squad';
        $permission['see_squad']->save();

        $permission['create_squad']                          = new Permission;
        $permission['create_squad']->name                    = 'create_squad';
        $permission['create_squad']->description             = 'Create Squad';
        $permission['create_squad']->save();

        $permission['update_squad']                          = new Permission;
        $permission['update_squad']->name                    = 'update_squad';
        $permission['update_squad']->description             = 'Update Squad';
        $permission['update_squad']->save();

        $permission['delete_squad']                          = new Permission;
        $permission['delete_squad']->name                    = 'delete_squad';
        $permission['delete_squad']->description             = 'Delete Squad';
        $permission['delete_squad']->save();

        $permission['manage_squad']                          = new Permission;
        $permission['manage_squad']->name                    = 'manage_squad';
        $permission['manage_squad']->description             = 'Manage Squad';
        $permission['manage_squad']->save();
		
		$permission['config_server_server']                          	= new Permission;
        $permission['config_server_server']->name                    	= 'config_server_server';
        $permission['config_server_server']->description             	= 'Can change server.cfg';
        $permission['config_server_server']->save();
		
		$permission['config_server_basic']                         	 	= new Permission;
        $permission['config_server_basic']->name                    	= 'config_server_basic';
        $permission['config_server_basic']->description             	= 'Can change basic.cfg';
        $permission['config_server_basic']->save();
		
		$permission['config_server_profile']                          	= new Permission;
        $permission['config_server_profile']->name                    	= 'config_server_profile';
        $permission['config_server_profile']->description             	= 'Can change profile settings of the server';
        $permission['config_server_profile']->save();
		
		$permission['service_server']                          			= new Permission;
        $permission['service_server']->name                    			= 'service_server';
        $permission['service_server']->description             			= 'Can Start / Stop / Restart servers';
        $permission['service_server']->save();
		
		$permission['mission_server']                          			= new Permission;
        $permission['mission_server']->name                    			= 'mission_server';
        $permission['mission_server']->description             			= 'Can upload mission files';
        $permission['mission_server']->save();
		
		$permission['bans_server']                          			= new Permission;
        $permission['bans_server']->name                    			= 'bans_server';
        $permission['bans_server']->description             			= 'Can manage the server bans';
        $permission['bans_server']->save();
		
		$permission['see_all_servers']                          		= new Permission;
        $permission['see_all_servers']->name                    		= 'see_all_servers';
        $permission['see_all_servers']->description            			= 'Can see all server';
        $permission['see_all_servers']->save();
		
		$permission['delete_mission']                          			= new Permission;
        $permission['delete_mission']->name                    			= 'delete_mission';
        $permission['delete_mission']->description             			= 'Delete Mission';
        $permission['delete_mission']->save();
		
		$permission['edit_profile']                          			= new Permission;
        $permission['edit_profile']->name                    			= 'edit_profile';
        $permission['edit_profile']->description             			= 'Edit own user profile';
        $permission['edit_profile']->save();
		
		$permission['see_administration']                          		= new Permission;
        $permission['see_administration']->name                    		= 'See Administration';
        $permission['see_administration']->description             		= 'See Administration';
        $permission['see_administration']->save();

        $role['administrators']                             = new Role;
        $role['administrators']->name                       = 'administrators';
        $role['administrators']->description                = 'Administrators';
        $role['administrators']->level                      = 1;
        $role['administrators']->save();
        $role['administrators']->permissions()->sync(
        [
            $permission['see_dashboard']->id,
            $permission['see_security']->id,
            $permission['see_user']->id,
            $permission['create_user']->id,
            $permission['update_user']->id,
            $permission['delete_user']->id,
            $permission['see_role']->id,
            $permission['create_role']->id,
            $permission['update_role']->id,
            $permission['delete_role']->id,
            $permission['see_permission']->id,
            $permission['create_permission']->id,
            $permission['update_permission']->id,
            $permission['delete_permission']->id,
            $permission['see_server']->id,
            $permission['create_server']->id,
            $permission['update_server']->id,
            $permission['delete_server']->id,
            $permission['manage_server']->id,
            $permission['see_squad']->id,
            $permission['create_squad']->id,
            $permission['update_squad']->id,
            $permission['delete_squad']->id,
            $permission['manage_squad']->id,
			$permission['config_server_server']->id,
			$permission['config_server_basic']->id,
			$permission['config_server_profile']->id,
			$permission['service_server']->id,
			$permission['mission_server']->id,
			$permission['bans_server']->id,
			$permission['see_all_servers']->id,
			$permission['delete_mission']->id,
			$permission['edit_profile']->id,
			$permission['see_administration']->id,
        ]);
        $role['administrators']->save();

        $role['squad_leaders']                              = new Role;
        $role['squad_leaders']->name                        = 'squad_leaders';
        $role['squad_leaders']->description                 = 'Squad Leaders';
        $role['squad_leaders']->level                       = 7;
        $role['squad_leaders']->save();
        $role['squad_leaders']->permissions()->sync(
        [
            $permission['see_dashboard']->id,
            $permission['see_server']->id,
            $permission['manage_server']->id,
            $permission['see_squad']->id,
            $permission['manage_squad']->id
        ]);
        $role['squad_leaders']->save();
		
		$user['admin']                                  	= new User;
        $user['admin']->email                           = 'admin@taw.net';   
        $user['admin']->picture                         = '/assets/modules/profile/admin.png';         		
        $user['admin']->username                        = 'admin';
        $user['admin']->password                        = 'admin';
        $user['admin']->verified                        = 1;
        $user['admin']->disabled                        = 0;
        $user['admin']->save();
        $user['admin']->roles()->sync(
        [
            $role['administrators']->id
        ]);
        $user['admin']->save();

     
    }
}

class SquadTableSeeder extends Seeder
{
    public function run()
    {
        $user                                               = [];

        $user['admin']                                  	= User::where('username', '=', 'admin')->first();
    }
}

class ServerTableSeeder extends Seeder
{
    public function run()
    {
        $user                                               = [];
        $server                                             = [];
        
        $user['admin']                                  = User::where('username', '=', 'admin')->first();

    }
}