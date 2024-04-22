<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDevice extends Model
{
    protected $table = 'test_devices';
    protected $fillable = ['typ_przyrzadu', 'nazwa_miernika',  'nr_seryjny', 'report_id', 'user_id', 'updated_at', 'created_at'];

    protected $casts = [
        'test_devices' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
