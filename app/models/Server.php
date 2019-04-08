<?php

class Server extends Eloquent
{
    protected $table = 'server';

    public function users()
    {
        return $this->belongsToMany('User', 'user_has_server', 'server_id', 'user_id');
    }

    public function server_cfg()
    {
        return $this->hasOne('ServerCFG', 'server_id', 'id');
    }

    public function server_basic_cfg()
    {
        return $this->hasOne('ServerBasicCFG', 'server_id', 'id');
    }

    public function server_profile()
    {
        return $this->hasOne('ServerProfile', 'server_id', 'id');
    }

    public function server_difficulty()
    {
        return $this->hasOne('ServerDifficulty', 'server_id', 'id');
    }
}