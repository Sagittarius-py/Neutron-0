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


    public $primaryKey = 'id';


    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function columns()
    {
        return $this->belongsToMany(Column::class);
    }

    public $timestamps = false;
}
