<?php

class ServerProfile extends Eloquent
{
    protected $table = 'server_profile';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}