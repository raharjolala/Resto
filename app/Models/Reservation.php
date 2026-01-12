<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'email',
        'phone',
        'branch_id',
        'reservation_date',
        'reservation_time',
        'guest_count',
        'special_request',
        'status',
    ];

    protected $casts = [
        'reservation_date' => 'date',
        'guest_count' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}