<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
     
    public function profile(){
        return $this->belongsTo("App\Models\User");
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
