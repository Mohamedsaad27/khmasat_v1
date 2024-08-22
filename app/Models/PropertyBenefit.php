<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBenefit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'property_id',
        'benefit_id',
    ];

    /**
     * Get the property associated with this benefit.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Get the benefit associated with this property.
     */
    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }
}
