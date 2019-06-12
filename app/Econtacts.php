<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Econtacts extends Model
{
    protected $table = 'econtacts';

    /**
     * The person that belongs to the econtact.
     */
    public function person()
    {
        return $this->belongsToMany('App\Persons');
    }
}
