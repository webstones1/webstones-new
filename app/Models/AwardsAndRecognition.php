<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardsAndRecognition extends Model
{
    //use SoftDeletes;

    protected $table = 'awardsandrecognition';

    protected $fillable = [
        'title',
        'description',
        'image',
        'is_enabled',
        'is_deleted',
    ];

    //protected $dates = ['deleted_at'];
}
