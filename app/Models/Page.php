<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class Page extends Model
{
    use HasFactory;

    // Hanya definisikan kolom dasar yang pasti ada berdasarkan migration awal
    // Menurut migration 2026_01_12_044028_create_pages_table.php, kolom yang ada:
    // id, name, slug, title, content, meta_title, meta_description, is_active, created_at, updated_at
    // TAPI jika kolom is_active tidak ada di database, kita akan handle secara dinamis
    
    protected $fillable = [
        'slug', 'title', 'content', 'meta_title', 'meta_description'
    ]; // HAPUS 'name' dan 'is_active' sementara

    protected $casts = [
        'content' => 'array'
        // HAPUS 'is_active' => 'boolean' untuk sementara
    ];

    // Override constructor untuk setup dinamis
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        // Setup fillable berdasarkan kolom yang ada
        $this->setupFillable();
    }

    /**
     * Setup fillable columns dynamically based on database structure
     */
    private function setupFillable()
    {
        try {
            $table = $this->getTable();
            $columns = Schema::getColumnListing($table);
            
            // Reset fillable
            $this->fillable = [];
            
            // Tambahkan kolom yang ada (kecuali id, created_at, updated_at)
            foreach ($columns as $column) {
                if (!in_array($column, ['id', 'created_at', 'updated_at'])) {
                    $this->fillable[] = $column;
                }
            }
            
            Log::info('Page model fillable set to: ' . implode(', ', $this->fillable));
            
        } catch (\Exception $e) {
            Log::error('Error setting up fillable: ' . $e->getMessage());
            // Fallback ke fillable dasar
            $this->fillable = ['slug', 'title', 'content', 'meta_title', 'meta_description'];
        }
    }

    /**
     * Override fill method untuk handle kolom yang tidak ada
     */
    public function fill(array $attributes)
    {
        // Filter attributes hanya untuk kolom yang ada di fillable
        $filteredAttributes = [];
        
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $filteredAttributes[$key] = $value;
            }
        }
        
        return parent::fill($filteredAttributes);
    }

    // Get about page dengan query yang aman
    public static function getAboutPage()
    {
        try {
            // Selalu gunakan slug karena itu pasti ada
            return static::where('slug', 'tentang-kami')->first();
            
        } catch (\Exception $e) {
            Log::error('Error in getAboutPage: ' . $e->getMessage());
            return null;
        }
    }

    // Get home page
    public static function getHomePage()
    {
        try {
            return static::where('slug', 'beranda')->first();
        } catch (\Exception $e) {
            Log::error('Error in getHomePage: ' . $e->getMessage());
            return null;
        }
    }

    // Get contact page
    public static function getContactPage()
    {
        try {
            return static::where('slug', 'hubungi-kami')->first();
        } catch (\Exception $e) {
            Log::error('Error in getContactPage: ' . $e->getMessage());
            return null;
        }
    }

    // Helper untuk cek kolom
    public function hasColumn($column)
    {
        static $columns = null;
        
        if ($columns === null) {
            try {
                $columns = Schema::getColumnListing($this->getTable());
            } catch (\Exception $e) {
                Log::error('Error getting columns: ' . $e->getMessage());
                $columns = [];
            }
        }
        
        return in_array($column, $columns);
    }
}