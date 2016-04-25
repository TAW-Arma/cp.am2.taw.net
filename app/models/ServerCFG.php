<?php

class ServerCFG extends Eloquent
{
    protected $table = 'server_cfg';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}