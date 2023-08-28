<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    protected $with = ['owner'];

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }
}
