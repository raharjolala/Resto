<?php
// app/Models/Promotion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // <-- PENTING: Tambahkan ini!

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';

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
        'sort_order' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * MUTATOR: Konversi dari input form (Asia/Jakarta) ke UTC untuk disimpan di database
     */
    public function setStartDateAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['start_date'] = null;
            return;
        }

        try {
            // Parse value dari form (datetime-local) sebagai waktu Asia/Jakarta
            $localTime = Carbon::parse($value, 'Asia/Jakarta');
            
            // Konversi ke UTC untuk disimpan di database
            $this->attributes['start_date'] = $localTime->setTimezone('UTC');
            
            // Log untuk debugging - SEKARANG SUDAH BISA KARENA SUDAH DI-IMPORT
            Log::info('setStartDateAttribute:', [
                'input' => $value,
                'local' => $localTime->format('Y-m-d H:i:s'),
                'utc' => $this->attributes['start_date']
            ]);
        } catch (\Exception $e) {
            Log::error('Error in setStartDateAttribute: ' . $e->getMessage());
            $this->attributes['start_date'] = Carbon::parse($value)->setTimezone('UTC');
        }
    }

    /**
     * MUTATOR: Konversi dari input form (Asia/Jakarta) ke UTC untuk disimpan di database
     */
    public function setEndDateAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['end_date'] = null;
            return;
        }

        try {
            // Parse value dari form (datetime-local) sebagai waktu Asia/Jakarta
            $localTime = Carbon::parse($value, 'Asia/Jakarta');
            
            // Konversi ke UTC untuk disimpan di database
            $this->attributes['end_date'] = $localTime->setTimezone('UTC');
            
            // Log untuk debugging
            Log::info('setEndDateAttribute:', [
                'input' => $value,
                'local' => $localTime->format('Y-m-d H:i:s'),
                'utc' => $this->attributes['end_date']
            ]);
        } catch (\Exception $e) {
            Log::error('Error in setEndDateAttribute: ' . $e->getMessage());
            $this->attributes['end_date'] = Carbon::parse($value)->setTimezone('UTC');
        }
    }

    /**
     * ACCESSOR: Konversi dari UTC (database) ke Asia/Jakarta untuk ditampilkan
     */
    public function getStartDateAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        try {
            // Parse dari database (UTC) dan konversi ke Asia/Jakarta
            $utcTime = Carbon::parse($value, 'UTC');
            $localTime = $utcTime->setTimezone('Asia/Jakarta');
            
            return $localTime;
        } catch (\Exception $e) {
            Log::error('Error in getStartDateAttribute: ' . $e->getMessage());
            return Carbon::parse($value);
        }
    }

    /**
     * ACCESSOR: Konversi dari UTC (database) ke Asia/Jakarta untuk ditampilkan
     */
    public function getEndDateAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        try {
            // Parse dari database (UTC) dan konversi ke Asia/Jakarta
            $utcTime = Carbon::parse($value, 'UTC');
            $localTime = $utcTime->setTimezone('Asia/Jakarta');
            
            return $localTime;
        } catch (\Exception $e) {
            Log::error('Error in getEndDateAttribute: ' . $e->getMessage());
            return Carbon::parse($value);
        }
    }

    /**
     * SCOPE: Promosi yang aktif (menggunakan query database langsung)
     * CATATAN: Scope ini membandingkan dengan UTC karena di database tersimpan UTC
     */
    public function scopeActive($query)
    {
        $nowUTC = Carbon::now('UTC');
        
        return $query->where('is_active', true)
            ->where('start_date', '<=', $nowUTC)
            ->where('end_date', '>=', $nowUTC);
    }

    /**
     * SCOPE: Promosi yang akan datang
     */
    public function scopeUpcoming($query)
    {
        $nowUTC = Carbon::now('UTC');
        
        return $query->where('is_active', true)
            ->where('start_date', '>', $nowUTC);
    }

    /**
     * SCOPE: Promosi yang sudah kadaluarsa
     */
    public function scopeExpired($query)
    {
        $nowUTC = Carbon::now('UTC');
        
        return $query->where('is_active', true)
            ->where('end_date', '<', $nowUTC);
    }

    /**
     * Get the image URL attribute with fallback
     */
    public function getImageUrlAttribute($value)
    {
        if (empty($value)) {
            return 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80';
        }
        
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }
        
        if (file_exists(public_path('storage/promotions/' . $value))) {
            return asset('storage/promotions/' . $value);
        }
        
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
     * Get status label as array
     */
    public function getStatusAttribute()
    {
        if (!$this->is_active) {
            return ['label' => 'Nonaktif', 'class' => 'danger', 'icon' => 'fa-times-circle'];
        }
        
        $nowJakarta = Carbon::now('Asia/Jakarta');
        $start = $this->start_date;
        $end = $this->end_date;
        
        if ($start > $nowJakarta) {
            return ['label' => 'Akan Datang', 'class' => 'info', 'icon' => 'fa-clock'];
        }
        
        if ($end < $nowJakarta) {
            return ['label' => 'Kadaluarsa', 'class' => 'secondary', 'icon' => 'fa-calendar-times'];
        }
        
        return ['label' => 'Aktif', 'class' => 'success', 'icon' => 'fa-check-circle'];
    }
    
    /**
     * Get status label as string
     */
    public function getStatusLabelAttribute()
    {
        return $this->status['label'];
    }
    
    /**
     * Get status class
     */
    public function getStatusClassAttribute()
    {
        return $this->status['class'];
    }
    
    /**
     * Get status icon
     */
    public function getStatusIconAttribute()
    {
        return $this->status['icon'];
    }
    
    /**
     * Cek apakah promosi sedang aktif berdasarkan waktu sekarang (Asia/Jakarta)
     */
    public function isCurrentlyActive()
    {
        if (!$this->is_active) {
            return false;
        }
        
        if (!$this->start_date || !$this->end_date) {
            return false;
        }
        
        $nowJakarta = Carbon::now('Asia/Jakarta');
        return $this->start_date <= $nowJakarta && $this->end_date >= $nowJakarta;
    }
    
    /**
     * Get raw start date from database (untuk debugging)
     */
    public function getRawStartDateAttribute()
    {
        return $this->attributes['start_date'] ?? null;
    }
    
    /**
     * Get raw end date from database (untuk debugging)
     */
    public function getRawEndDateAttribute()
    {
        return $this->attributes['end_date'] ?? null;
    }
    
    /**
     * Format start date untuk display
     */
    public function getStartDateFormattedAttribute()
    {
        return $this->start_date ? $this->start_date->format('d M Y H:i') : '-';
    }
    
    /**
     * Format end date untuk display
     */
    public function getEndDateFormattedAttribute()
    {
        return $this->end_date ? $this->end_date->format('d M Y H:i') : '-';
    }
    
    /**
     * Get duration in days
     */
    public function getDurationDaysAttribute()
    {
        if (!$this->start_date || !$this->end_date) {
            return 0;
        }
        
        return $this->start_date->diffInDays($this->end_date);
    }
}