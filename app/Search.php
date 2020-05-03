<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable = [
        '',
    ];
    
    public function developments()
    {
        return $this->hasMany(Development::class);
    }
}
