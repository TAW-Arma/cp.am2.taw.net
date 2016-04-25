<?php

class User extends Toddish\Verify\Models\User
{
    public function squads()
    {
        return $this->belongsToMany('Squad', 'user_has_squad', 'user_id', 'squad_id');
    }

    public function servers()
    {
        return $this->belongsToMany('Server', 'user_has_server', 'user_id', 'server_id');
    }
}