<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    /**
     * Ebben a projektben nem használunk timestamp mezőket.
     */
    public $timestamps = false;

    /**
     * Tömegesen kitölthető mezők.
     */
    protected $fillable = [
        'name',
        'brand_id'
    ];

    /**
     * Egy model egy márkához(brandhez) tartozik.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
