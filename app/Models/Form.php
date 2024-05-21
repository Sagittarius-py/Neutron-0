<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'template_id',
    ];


    protected $primaryKey = 'id';

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public $timestamps = false;
}
