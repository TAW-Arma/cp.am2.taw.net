<?php

class ServerBasicCFG extends Eloquent
{
    protected $table = 'server_basic_cfg';

    public function server()
    {
        return $this->belongsTo('Server', 'server_id', 'id');
    }
}