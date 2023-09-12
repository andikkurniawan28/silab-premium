<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function write($action, $model, $data){
        $description = "{$action} {$model} {$data}.";
        self::insert([
            "description"   => $description,
            "user_id"       => Auth()->user()->id,
        ]);
    }
}
