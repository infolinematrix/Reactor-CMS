<?php

namespace ReactorCMS\Site\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    
    protected $table = 'appointment';
    protected $fillable = ['node_id','booking_date','booking_time','patient_name','patient_email','patient_contact','zip_code'];


    public function nodes()
    {
        return $this->hasOne(Node::class, 'id');
    }

}
