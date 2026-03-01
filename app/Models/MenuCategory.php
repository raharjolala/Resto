<?php
// app/Models/MenuCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuCategory extends Model
{
    use HasFactory;

    protected $table = 'menu_categories';

    protected $fillable = [
        'name',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the menu items for the category.
     */
    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'category_id');
    }

    /**
     * Get active menu items for the category.
     */
    public function activeMenuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'category_id')->where('is_available', true);
    }

    /**
     * Scope a query to only active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order by sort_order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}