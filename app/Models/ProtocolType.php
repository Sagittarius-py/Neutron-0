<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocolType extends Model
{
    use HasFactory;
    protected $table = 'protocol_types';

    protected $fillable = [
        'name',
    ];

    protected $primaryKey = 'id';

    public $timestamps = false;
}