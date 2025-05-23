<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'company_name',
        'description',
        'location',
        'category',
        'employment_type',
        'salary',
        'deadline',
        'image',
    ];

    public function lamarans() {
        return $this->hasMany(Lamaran::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
