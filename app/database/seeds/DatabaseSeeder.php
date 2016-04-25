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
            $permission['manage_squad']->id
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

        $user['feraldude']                                  = new User;
        $user['feraldude']->email                           = 'feraldude@taw.net';
        $user['feraldude']->username                        = 'feraldude';
        $user['feraldude']->password                        = '0p3r@t!0n';
        $user['feraldude']->verified                        = 1;
        $user['feraldude']->disabled                        = 0;
        $user['feraldude']->save();
        $user['feraldude']->roles()->sync(
        [
            $role['administrators']->id
        ]);
        $user['feraldude']->save();

        $user['aeroson']                                    = new User;
        $user['aeroson']->email                             = 'aeroson@taw.net';
        $user['aeroson']->username                          = 'aeroson';
        $user['aeroson']->password                          = 'welcome1234';
        $user['aeroson']->verified                          = 1;
        $user['aeroson']->disabled                          = 0;
        $user['aeroson']->save();
        $user['aeroson']->roles()->sync(
        [
            $role['administrators']->id
        ]);
        $user['aeroson']->save();

        $user['cloudstalker']                               = new User;
        $user['cloudstalker']->email                        = 'cloudstalker@taw.net';
        $user['cloudstalker']->username                     = 'cloudstalker';
        $user['cloudstalker']->password                     = 'welcome1234';
        $user['cloudstalker']->verified                     = 1;
        $user['cloudstalker']->disabled                     = 0;
        $user['cloudstalker']->save();
        $user['cloudstalker']->roles()->sync(
        [
            $role['administrators']->id
        ]);
        $user['cloudstalker']->save();

        $user['juvenis']                                    = new User;
        $user['juvenis']->email                             = 'juvenis@taw.net';
        $user['juvenis']->username                          = 'juvenis';
        $user['juvenis']->password                          = 'AcoUbJOYlxKtS00f';
        $user['juvenis']->verified                          = 1;
        $user['juvenis']->disabled                          = 0;
        $user['juvenis']->save();
        $user['juvenis']->roles()->sync(
        [
            $role['administrators']->id
        ]);
        $user['juvenis']->save();

        $user['samblues']                                   = new User;
        $user['samblues']->email                            = 'samblues@taw.net';
        $user['samblues']->username                         = 'samblues';
        $user['samblues']->password                         = 'nZ6OpPRCQONG1xoU';
        $user['samblues']->verified                         = 1;
        $user['samblues']->disabled                         = 0;
        $user['samblues']->save();
        $user['samblues']->roles()->sync(
        [
            $role['administrators']->id
        ]);
        $user['samblues']->save();

        $user['mavericksabre']                              = new User;
        $user['mavericksabre']->email                       = 'mavericksabre@taw.net';
        $user['mavericksabre']->username                    = 'mavericksabre';
        $user['mavericksabre']->password                    = '4AleEH1LnRezSFvS';
        $user['mavericksabre']->verified                    = 1;
        $user['mavericksabre']->disabled                    = 0;
        $user['mavericksabre']->save();
        $user['mavericksabre']->roles()->sync(
        [
            $role['administrators']->id
        ]);
        $user['mavericksabre']->save();

        $user['fijapowa']                                   = new User;
        $user['fijapowa']->email                            = 'fijapowa@taw.net';
        $user['fijapowa']->username                         = 'fijapowa';
        $user['fijapowa']->password                         = 'x2roBIo7sGTEtssa';
        $user['fijapowa']->verified                         = 1;
        $user['fijapowa']->disabled                         = 0;
        $user['fijapowa']->save();
        $user['fijapowa']->roles()->sync(
        [
            $role['squad_leaders']->id
        ]);
        $user['fijapowa']->save();

        $user['wargamer']                                   = new User;
        $user['wargamer']->email                            = 'wargamer@taw.net';
        $user['wargamer']->username                         = 'wargamer';
        $user['wargamer']->password                         = 'nrGSf6qPsexyoqfP';
        $user['wargamer']->verified                         = 1;
        $user['wargamer']->disabled                         = 0;
        $user['wargamer']->save();
        $user['wargamer']->roles()->sync(
        [
            $role['squad_leaders']->id
        ]);
        $user['wargamer']->save();

        $user['dutchwarrior']                               = new User;
        $user['dutchwarrior']->email                        = 'dutchwarrior@taw.net';
        $user['dutchwarrior']->username                     = 'dutchwarrior';
        $user['dutchwarrior']->password                     = '6BLEvVLnth3pNCUS';
        $user['dutchwarrior']->verified                     = 1;
        $user['dutchwarrior']->disabled                     = 0;
        $user['dutchwarrior']->save();
        $user['dutchwarrior']->roles()->sync(
        [
            $role['squad_leaders']->id
        ]);
        $user['dutchwarrior']->save();

        $user['naffi']                                      = new User;
        $user['naffi']->email                               = 'naffi@taw.net';
        $user['naffi']->username                            = 'naffi';
        $user['naffi']->password                            = '0LYmW7ngOoDmwVg6';
        $user['naffi']->verified                            = 1;
        $user['naffi']->disabled                            = 0;
        $user['naffi']->save();
        $user['naffi']->roles()->sync(
        [
            $role['squad_leaders']->id
        ]);
        $user['naffi']->save();

        $user['zlipnit']                                    = new User;
        $user['zlipnit']->email                             = 'zlipnit@taw.net';
        $user['zlipnit']->username                          = 'zlipnit';
        $user['zlipnit']->password                          = 'sXnC3B4PDo4k83Fe';
        $user['zlipnit']->verified                          = 1;
        $user['zlipnit']->disabled                          = 0;
        $user['zlipnit']->save();
        $user['zlipnit']->roles()->sync(
        [
            $role['squad_leaders']->id
        ]);
        $user['zlipnit']->save();

        $user['tbone']                                      = new User;
        $user['tbone']->email                               = 'tbone@taw.net';
        $user['tbone']->username                            = 'tbone';
        $user['tbone']->password                            = 'IVEZgCjQAWN7UkMo';
        $user['tbone']->verified                            = 1;
        $user['tbone']->disabled                            = 0;
        $user['tbone']->save();
        $user['tbone']->roles()->sync(
        [
            $role['squad_leaders']->id
        ]);
        $user['tbone']->save();

        $user['mzone']                                      = new User;
        $user['mzone']->email                               = 'mzone@taw.net';
        $user['mzone']->username                            = 'mzone';
        $user['mzone']->password                            = 'x2roBIo7sGTEtssa';
        $user['mzone']->verified                            = 1;
        $user['mzone']->disabled                            = 0;
        $user['mzone']->save();
        $user['mzone']->roles()->sync(
        [
            $role['squad_leaders']->id
        ]);
        $user['mzone']->save();
    }
}

class SquadTableSeeder extends Seeder
{
    public function run()
    {
        $user                                               = [];

        $user['feraldude']                                  = User::where('username', '=', 'feraldude')->first();
        $user['aeroson']                                    = User::where('username', '=', 'aeroson')->first();
        $user['cloudstalker']                               = User::where('username', '=', 'cloudstalker')->first();
        $user['juvenis']                                    = User::where('username', '=', 'juvenis')->first();
        $user['samblues']                                   = User::where('username', '=', 'samblues')->first();
        $user['mavericksabre']                              = User::where('username', '=', 'mavericksabre')->first();
        $user['fijapowa']                                   = User::where('username', '=', 'fijapowa')->first();
        $user['wargamer']                                   = User::where('username', '=', 'wargamer')->first();
        $user['dutchwarrior']                               = User::where('username', '=', 'dutchwarrior')->first();
        $user['naffi']                                      = User::where('username', '=', 'naffi')->first();
        $user['zlipnit']                                    = User::where('username', '=', 'zlipnit')->first();
        $user['tbone']                                      = User::where('username', '=', 'tbone')->first();
        $user['mzone']                                      = User::where('username', '=', 'mzone')->first();
    }
}

class ServerTableSeeder extends Seeder
{
    public function run()
    {
        $user                                               = [];
        $server                                             = [];
        
        $user['feraldude']                                  = User::where('username', '=', 'feraldude')->first();
        $user['aeroson']                                    = User::where('username', '=', 'aeroson')->first();
        $user['cloudstalker']                               = User::where('username', '=', 'cloudstalker')->first();
        $user['juvines']                                    = User::where('username', '=', 'juvines')->first();
        $user['samblues']                                   = User::where('username', '=', 'samblues')->first();
        $user['mavericksabre']                              = User::where('username', '=', 'mavericksabre')->first();
        $user['fijapowa']                                   = User::where('username', '=', 'fijapowa')->first();
        $user['wargamer']                                   = User::where('username', '=', 'wargamer')->first();
        $user['dutchwarrior']                               = User::where('username', '=', 'dutchwarrior')->first();
        $user['naffi']                                      = User::where('username', '=', 'naffi')->first();
        $user['zlipnit']                                    = User::where('username', '=', 'zlipnit')->first();
        $user['tbone']                                      = User::where('username', '=', 'tbone')->first();
        $user['mzone']                                      = User::where('username', '=', 'mzone')->first();

    }
}