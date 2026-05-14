<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'name',
        'slug',
        'description',
        'specifications',
        'image',
        'gallery',
        'is_featured',
        'is_best_seller',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'specifications' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_best_seller' => 'boolean',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }
}
