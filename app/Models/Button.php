<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $table = 'buttons';
    
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}