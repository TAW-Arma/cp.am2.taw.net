<?php

class ServerDificultyRecruit extends Eloquent
{
    protected $table = 'server_dificulty_recruit';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}