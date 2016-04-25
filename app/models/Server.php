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

    public function server_dificulty_recruit()
    {
        return $this->hasOne('ServerDificultyRecruit', 'server_id', 'id');
    }

    public function server_dificulty_regular()
    {
        return $this->hasOne('ServerDificultyRegular', 'server_id', 'id');
    }

    public function server_dificulty_veteran()
    {
        return $this->hasOne('ServerDificultyVeteran', 'server_id', 'id');
    }

    public function server_dificulty_mercenary()
    {
        return $this->hasOne('ServerDificultyMercenary', 'server_id', 'id');
    }
}