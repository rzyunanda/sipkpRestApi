<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    protected $table = 'lectures';

    protected $fillable = ['id', 
                           'name',
                           'nik',
                           'nip',
                           'nidn',
                           'karpeg',
                           'npwp',
                           'gender',
                           'birthday',
                           'birthplace',
                           'phone',
                           'address',
                           'marital_status',
                           'religion'
                        ];
    
    
}
