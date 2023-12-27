<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FavoriteItems extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
}
