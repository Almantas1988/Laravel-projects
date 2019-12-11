<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    public function grade()
    {

        return $this->hasMany('App\Grade', 'student_id', 'id');

    }
}
