<?php

class ServerDificultyRegular extends Eloquent
{
    protected $table = 'server_dificulty_regular';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}