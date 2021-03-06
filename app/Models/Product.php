<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }
}
