<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    protected $primaryKey = 'id';

    public function column()
    {
        return $this->belongsToMany(Column::class);
    }

    public $timestamps = false;
}
