<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\QueryBuilder\QueryBuilder;

class Kost extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function scopePriceStartsBetween(Builder $query, $price1, $price2): Builder
    {
        return $query->where('price', '>=', $price1)
        ->where('price', '<=', $price2);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
