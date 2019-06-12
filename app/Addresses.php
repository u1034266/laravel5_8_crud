<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $table = 'addresses';

    /**
     * The person that belongs to the address.
     */
    public function person()
    {
        return $this->belongsToMany('App\Persons');
    }
}
