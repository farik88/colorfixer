<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['number'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}
