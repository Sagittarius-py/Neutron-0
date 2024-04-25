<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'address',
    ];

    protected $dates = ['check_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public $primaryKey = 'id';

    public $timestamps = false;
}
