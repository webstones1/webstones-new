<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
     // Define the table associated with the model
     protected $table = 'menus';
     protected $primaryKey = 'id'; 

     // Define the fillable fields for mass assignment
     protected $fillable = ['title', 'link','is_enabled','is_deleted'];     
     public function submenus()
     {
         return $this->hasMany(SubMenu::class, 'menu_id')->where('is_enabled', true)->orderBy('id');
     }
} 
