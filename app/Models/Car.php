<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id', 
        'make', 
        'model', 
        'year',
        'description', 
        'photos', 
        'price_per_day', 
        'availability_calendar'
    ];


    protected $primarykey = 'id';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    // https://laravel.com/docs/10.x/eloquent-relationships#one-to-many-inverse

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'owner_id');
    }
}
