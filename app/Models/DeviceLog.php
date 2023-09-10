<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function device(){
        return $this->belongsTo(Device::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
