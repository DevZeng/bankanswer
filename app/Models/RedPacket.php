<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedPacket extends Model
{
    //
    public function warehouse()
    {
        return $this->hasOne('App\Model\Warehouse','id','warehouse_id')->first();
    }
}
