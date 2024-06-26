<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'protocol_id',
        'name',
        'parent_id',
    ];


    public function parent()
    {
        return $this->belongsTo(Item::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Item::class, 'parent_id');
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }
    public function tests()
    {
        return $this->hasMany(Test::class);
    }


    public $primaryKey = 'id';

    public $timestamps = false;
}
