<?php

class Squad extends Eloquent
{
    protected $table = 'squad';

    public function members()
    {
        return $this->hasMany('SquadMember', 'squad_id', 'íd');
    }

    public function users()
    {
        return $this->belongsToMany('User', 'user_has_squad', 'squad_id', 'user_id');
    }
}