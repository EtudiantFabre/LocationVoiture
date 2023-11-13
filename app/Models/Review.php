<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'rating',
        'comment',
        'date'
    ];

    protected $primarykey = 'id';


    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    public function users(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'id', 'car_id');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
