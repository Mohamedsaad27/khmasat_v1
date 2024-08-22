<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'type',
    ];

    /**
     * Define a one-to-many relationship with the Property model.
     */
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
