<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Get the user that owns the images
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}