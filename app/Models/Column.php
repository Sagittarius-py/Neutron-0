<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];


    protected $primaryKey = 'id';

    protected function templates()
    {
        return $this->belongsToMany(Template::class);
    }

    public $timestamps = false;
}
