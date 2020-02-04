<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agencies extends Model
{
    protected $table = 'internship_agencies';
    
    protected $fillable = [ 'id',
                            'name', 
                            'address'];

}
