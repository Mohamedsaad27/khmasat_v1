<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'category_id',
        'user_id',
        'type_id',
        'title',
        'slug',
        'description',
        'price',
        'status',
        'furnished',
        'bathroom',
        'bedroom',
        'feature',
        'area',
        'price_after_discount',
        'installment_amount',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'furnished' => 'boolean',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->slug = Str::slug($property->title);
        });
    }


    /**
     * Get the user that owns the property.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the user that owns the property.
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    /**
     * Get the category that owns the property.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get the property type that owns the property.
     */
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'type_id');
    }
    /**
     * Get the benefits that owns the property.
     */
    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'property_benefits');
    }
    /**
     * Get the property Images that owns the property.
     */
    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }
    /**
     * Get the property Attributes that owns the property.
     */
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    // Override on model binding for give property using slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

}