<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $fillable = [ 'id', 
                            'nik',
                            'name',
                            'npwp',
                            'gender',
                            'birthdate',
                            'birthplace',
                            'phone',
                            'address',
                            'marital_status'];


    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }     

    

}
