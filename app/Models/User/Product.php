<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];
}

