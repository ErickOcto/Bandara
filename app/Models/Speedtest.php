<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Speedtest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
    ];

    /**
     * Get the user that owns the Speedtest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userSpeed(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
