<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'name'];

    public function devices()
    {
        return $this->belongsToMany(Device::class, 'customer_device');
    }

}
