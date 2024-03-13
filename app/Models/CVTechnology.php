<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVTechnology extends Model
{
    use HasFactory;

    protected $table = 'cv_technology';

    protected $fillable = ['user_cv_id', 'technology_id'];

    public function userCV() {
        return $this->belongsTo(UserCV::class, 'user_cv_id');
    }

    public function technology() {
        return $this->belongsTo(Technology::class, 'technology_id');
    }
}
