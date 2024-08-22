<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * Get the user that is associated with the employee.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
