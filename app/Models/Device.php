<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function log(){
        return $this->hasMany(DeviceLog::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
