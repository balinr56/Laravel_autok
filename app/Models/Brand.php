<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * Ebben a projektben nem használunk timestamp mezőket.
     */
    public $timestamps = false;

    /**
     * Tömegesen kitölthető mezők.
     */
    protected $fillable = ['name'];

    /**
     * Egy megyéhez több város tartozhat.
     */
    public function models()
    {
        return $this->hasMany(Models::class);
    }
}
