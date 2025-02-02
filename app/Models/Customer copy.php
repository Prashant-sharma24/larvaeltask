<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mobile_no', 'email', 'description'];

    public function devices()
    {
        return $this->belongsToMany(Device::class, 'customer_device');
    }


}
