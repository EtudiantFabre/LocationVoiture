<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'user_id', 'start_date', 'end_date', 'total_price', 'status'];

    protected $primaykey = 'id';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'id', 'car_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
