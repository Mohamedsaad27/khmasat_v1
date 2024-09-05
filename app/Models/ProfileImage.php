<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    use HasFactory;
    protected $table = 'user_images';
    protected $fillable = ['user_id', 'profile_picture'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}