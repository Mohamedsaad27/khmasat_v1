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
        'price_after_discount',
        'installment_amount',
        'bathroom',
        'bedroom',
        'area',
        'status',
        'feature',
        'furnished',
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
    protected $hidden = ['created_at', 'updated_at'];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->slug = Str::slug($property->title);
        });
    }

    public function scopeFilter($query, $request)
    {
        return $query->when($request->query('category_name'), function ($query) use ($request) {
            $query->WhereHas('category', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query('category_name') . '%');
            });
        })
            ->when($request->query('type_name'), function ($query) use ($request) {
                $query->WhereHas('propertyType', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->query('type_name') . '%');
                });
            })
            ->when($request->query('status') && $request->query('status') !== 'all', function ($query) use ($request) {
                $query->where('status', $request->query('status'));
            })
            ->when($request->query('bedroom'), function ($query) use ($request) {
                $query->Where('bedroom', $request->query('bedroom'));
            })
            ->when($request->query('bathroom'), function ($query) use ($request) {
                $query->Where('bathroom', $request->query('bathroom'));
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
     * Get the favorites that owns the property.
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }



    // Override on model binding for give property using slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
