<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAttribute extends Model
{
    use HasFactory;
    protected $table = 'property_attributes';
    protected $fillable = ['property_id', 'attribute_name', 'value'];
    public function property(){
        return $this->belongsTo(Property::class);
    }
    public function attribute_name(){
        return $this->belongsTo(Attribute::class);
    }
}
