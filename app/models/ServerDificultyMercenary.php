<?php

class ServerDificultyMercenary extends Eloquent
{
    protected $table = 'server_dificulty_mercenary';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}