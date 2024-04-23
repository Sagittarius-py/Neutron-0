<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocolNextTest extends Model
{
    use HasFactory;
    protected $fillable = [
        'protocol_id',
        'next_test_date',
    ];

    protected $dates = ['next_test_date'];

    public function protocol()
    {
        return $this->belongsTo(Protocol::class);
    }
    protected $primaryKey = 'id';

    public $timestamps = false;
}