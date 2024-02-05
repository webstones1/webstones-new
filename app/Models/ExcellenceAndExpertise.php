<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcellenceAndExpertise extends Model
{
    use HasFactory;
    protected $table = 'excellenceandexpertise';
    protected $fillable = [
        'title',
        'description',        
        'image',
        'is_enabled',
        'is_deleted',
    ];
}
