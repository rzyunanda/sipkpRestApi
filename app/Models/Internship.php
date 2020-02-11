<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $table = 'internship_students';

    protected $fillable = ['id', 
                           'proposal_id',
                           'student_id',
                           'status',
                           'advisor_id',
                           'start_at',
                           'end_at',
                           'report_title',
                           'seminar_date',
                           'seminar_time',
                           'seminar_room',
                           'seminar_deadline',
                           'internship_score',
                           'activity_report',
                           'news_event',
                           'work_report',
                           'certifivate',
                        ];

    protected $enumStatus = [
        'diajukan' => 'diajukan',
        'revisi' => 'revisi',
        'diperbaiki' => 'diperbaiki',
        'ditolak' => 'ditolak',
        'diterima' => 'diterima'
    ];

    public function students()
    {
        return $this->belongsTo('App\Models\Students', 'id');
    }

    public function proposals()
    {
        return $this->belongsTo('App\Models\Proposals','id');
    }

    public function logbooks(){
        return $this->hasMany('App\Models\Logbooks','id');
    }

}
