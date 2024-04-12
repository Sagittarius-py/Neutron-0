<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = ['user_id', 'report_number', 'report'];

    protected $casts = [
        'report' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
