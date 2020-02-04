<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logbooks extends Model
{
    protected $table = 'logbooks';

    protected $fillable = [ 'id', 
                            'internship_id',
                            'date',
                            'activities',
                            'note'];

    public function internship()
    {
        return $this->belongsTo('App\Models\Internship','id');
    }  
}
