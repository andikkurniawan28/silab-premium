<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use HasFactory;

    public function sample(){
        return $this->belongsTo(Sample::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
