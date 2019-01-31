<?php

namespace ReactorCMS\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    
    protected $table = 'contacts';
    protected $fillable = ['name','last_name', 'email', 'phone', 'description'];
}
