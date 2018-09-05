<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['name', 'type'];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    protected function isRemote()
    {
        return preg_match('/^http(s)?:\/\//', $this->name);
    }

    public function getLinkAttribute()
    {
        $link = $this->name;

        if (!$this->isRemote()) {
            $link = '/storage/' . $this->name;
        }

        return $link;
    }
}
