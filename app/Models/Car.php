<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the agent that owns the car.
     */
    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }
}
