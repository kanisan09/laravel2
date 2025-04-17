<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
    ];

    public $timestamps = false;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
