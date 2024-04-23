<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'device_type',
        'name',
        'serial_number',
        'check_date',
        'document_file',
    ];

    protected $dates = ['check_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function protocols()
    {
        return $this->belongsToMany(Protocol::class);
    }

    protected $primaryKey = 'id';

    public $timestamps = false;
}