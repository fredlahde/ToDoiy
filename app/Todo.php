<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'body',
        'completed'
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function attributesToArray($trwet)
    {
        $trwet = 12;
    }
}
