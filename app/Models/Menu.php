<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name', 'price', 'description', 'category', 'image'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
