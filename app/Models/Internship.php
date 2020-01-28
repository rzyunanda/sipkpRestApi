<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $table = 'internship_students';

    protected $fillable = ['id', 
                           'proposal_id',
                           'student_id', 
                        ];
}
