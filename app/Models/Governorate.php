<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\City;

class Governorate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
