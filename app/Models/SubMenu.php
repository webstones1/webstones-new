<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
     // Define the table associated with the model
     protected $table = 'submenus';
     protected $primaryKey = 'id'; 

     // Define the fillable fields for mass assignment
     protected $fillable = ['menu_id','title', 'link','is_enabled','is_deleted'];

    // Define relationship with Menu model
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    } 
}
