<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'number',
        'date',
        'item_id',
        'protocol_type_id',
        'verdict',
        'notes',
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function protocolType()
    {
        return $this->belongsTo(ProtocolType::class);
    }

    public function devices()
    {
        return $this->belongsToMany(Device::class);
    }

    public function nextTests()
    {
        return $this->hasMany(ProtocolNextTest::class);
    }

    public $primaryKey = 'id';

    public $timestamps = false;
}