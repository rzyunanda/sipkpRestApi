<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    protected $fillable = [ 'id',
                            'name', 
                            'year',
                            'birthplace',
                            'birth_date',
                            'address',
                            'marital_status',
                        ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id');
    }  

    public function internship()
    {
        return $this->hasMany('App\Models\Internship');
    }

    




}
