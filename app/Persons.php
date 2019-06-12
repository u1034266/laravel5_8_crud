<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $table = 'persons';

    /**
     * The econtact that belongs to the person.
     */
    public function econtact()
    {
        return $this->belongsToMany('App\Econtacts');
    }

    /**
     * The address that belongs to the person.
     */
    public function address()
    {
        return $this->belongsToMany('App\Addresses');
    }
}
