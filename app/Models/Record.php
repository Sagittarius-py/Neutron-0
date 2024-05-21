<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
    ];


    protected $primaryKey = 'id';

    protected function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function values()
    {
        return $this->hasMany(Value::class);
    }

    public $timestamps = false;
}
