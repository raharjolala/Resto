<?php
// app/Models/Promotion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'current_price',
        'old_price',
        'badge_text',
        'button_text',
        'image_url',
        'is_active',
        'sort_order',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'current_price' => 'decimal:2',
        'old_price' => 'decimal:2',
        'is_active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }
    
    /**
     * Get the image URL attribute with fallback
     */
    public function getImageUrlAttribute($value)
    {
        // If image is empty or null, return default promotion image
        if (empty($value)) {
            return 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80';
        }
        
        // If image is already a full URL (starts with http)
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }
        
        // If image is a filename from storage (for future file upload support)
        if (file_exists(public_path('storage/promotions/' . $value))) {
            return asset('storage/promotions/' . $value);
        }
        
        // Default fallback
        return 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80';
    }
    
    /**
     * Get the formatted current price with currency
     */
    public function getFormattedCurrentPriceAttribute()
    {
        return 'Rp ' . number_format($this->current_price, 0, ',', '.');
    }
    
    /**
     * Get the formatted old price with currency
     */
    public function getFormattedOldPriceAttribute()
    {
        return $this->old_price ? 'Rp ' . number_format($this->old_price, 0, ',', '.') : null;
    }
    
    /**
     * Calculate discount percentage
     */
    public function getDiscountPercentageAttribute()
    {
        if ($this->old_price && $this->old_price > $this->current_price) {
            return round((($this->old_price - $this->current_price) / $this->old_price) * 100);
        }
        return 0;
    }
    
    /**
     * Get status label
     */
    public function getStatusAttribute()
    {
        if (!$this->is_active) {
            return ['label' => 'Nonaktif', 'class' => 'danger'];
        }
        
        $now = now();
        
        if ($this->start_date > $now) {
            return ['label' => 'Akan Datang', 'class' => 'info'];
        }
        
        if ($this->end_date < $now) {
            return ['label' => 'Kadaluarsa', 'class' => 'secondary'];
        }
        
        return ['label' => 'Aktif', 'class' => 'success'];
    }
}