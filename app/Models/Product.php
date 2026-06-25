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
        'price',
        'sale_price',
        'stock',
        'purity_options',
    ];

    protected $casts = [
        'specifications' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_best_seller' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'stock' => 'integer',
        'purity_options' => 'array',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }
}
