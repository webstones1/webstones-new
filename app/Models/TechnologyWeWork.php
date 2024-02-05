<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyWeWork extends Model
{
   //use SoftDeletes;

   protected $table = 'technologywework';

   protected $fillable = [
       'title',
       'description',
       'image',
       'is_enabled',
       'is_deleted',
   ];

   //protected $dates = ['deleted_at'];
}
