<?php

class SquadMember extends Eloquent
{
    protected $table = 'squad_member';

    public function squad()
    {
        return $this->belongsTo('Squad', 'squad_id', 'id');
    }
}