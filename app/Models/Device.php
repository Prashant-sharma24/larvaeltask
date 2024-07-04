<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'name'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_device');
    }

}
