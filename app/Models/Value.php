<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'column_id',
        'value'
    ];


    protected $primaryKey = 'id';

    protected function record()
    {
        return $this->belongsTo(Record::class);
    }

    protected function column()
    {
        return $this->belongsTo(Column::class);
    }

    public $timestamps = false;
}
