<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'content',
        'date'
    ];

    protected $primarykey = 'id';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';


    public function user_sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'sender_id');
    }

    public function user_receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'receiver_id');
    }
}
