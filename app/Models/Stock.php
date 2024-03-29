<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function stockRequests()
    {
        return $this->hasMany(StockRequest::class);
    }
}
