<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\City;
use App\Models\Governorate;
use App\Models\ShopCategory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
use App\Models\FavoriteItems;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'f_name',
        'l_name',
        'email',
        'role',
        'address',
        'governorate_id',
        'city_id',
        'shop_category_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function shopCategory(): BelongsTo
    {
        return $this->belongsTo(ShopCategory::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(UserPhone::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function favoriteItems():HasMany
    {
        return $this->hasMany(FavoriteItems::class);
    }
}
