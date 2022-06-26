<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'entity__students';
    protected $fillable = [
        'student_id',
        'student_fullname',
        'student_class',
        'student_class',
        'student_placebirth',
        'student_datebirth',
        'student_father',
        'student_nsm',
        'student_nisn',
        'student_phone',
        'student_nopes',
        'student_nik',
        'student_view',
        'student_comment',
        'student_desc',
        'student_agreement',];
    protected $primaryKey = 'student_id';
    public $timestamps = false;
}
