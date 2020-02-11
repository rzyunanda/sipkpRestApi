<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposals extends Model
{
   

    protected $table = 'proposals';
    
    protected $fillable = [ 'id', 
                            'title',
                            'background',
                            'problem',
                            'date',
                            'institude',
                            'status',
                            'response_letter',
                            'note'
                        ];
    
    protected $enumStatus = [
        'diajukan' => 'diajukan',
        'revisi' => 'revisi',
        'diperbaiki' => 'diperbaiki',
        'ditolak' => 'ditolak',
        'diterima' => 'diterima'
    ];


    public function internship()
    {
        return $this->hasMany('App\Models\Internship', 'id');
    } 
    
    public function agencies()
    {
        return $this->hasMany('App\Models\Students', 'id');
    }

}
