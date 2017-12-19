<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExamList extends Model
{
    //
    public function staff()
    {
        return $this->hasOne('App\Model\Staff','id','user_id')->first();
    }
}
