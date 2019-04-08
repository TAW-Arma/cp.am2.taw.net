<?php

class ServerDifficulty extends Eloquent
{
    protected $table = 'server_difficulty';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}