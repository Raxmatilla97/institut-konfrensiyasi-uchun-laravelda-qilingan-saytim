<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kof_chilar extends Model
{
    public $table = "kof_chilar";

   
    protected $fillable = [
        'title',
        'last_name',
        'first_name',
        'middle_name',
        'gender',
        'email',
        'country',
        'city',
        'organization',
        'position',
        'academic_degree',
        'work_phone',
        'desired_status',
        'accompanying_person',
        'comments',
        'tolov',
        'tolov_info',
        'created_at',
        'user_id',
        'id',
        'hato_bormi',
        'hatolarni_infosi',
        'file_pdf',
        'file_zip'
       
        

    ];

    public function Users ()
    {
        return $this->belongsTo ('App\User');
    }
}
