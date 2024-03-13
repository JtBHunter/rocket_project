<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCV extends Model
{
    use HasFactory;

    protected $table = 'user_cv';

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'date_of_birth', 'university_id'];

    public function techologies() {
        return $this->belongsToMany(Technology::class, 'cv_technology', 'user_cv_id', 'technology_id');
    }

    public function university() {
        return $this->hasOne(University::class, 'id', 'university_id');
    }
}
