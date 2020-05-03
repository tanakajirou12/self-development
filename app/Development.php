<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
    protected $fillable = ['title', 'content1', 'content2', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function search()
    {
        return $this->belongsTo(Search::class);
    }
}
