<?php

class ServerDificultyVeteran extends Eloquent
{
    protected $table = 'server_dificulty_veteran';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}