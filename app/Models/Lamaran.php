<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamarans';
    
    protected $fillable = ['job_id', 'name', 'email', 'phone', 'address', 'cv_path', 'message'];

    public function job() {
        return $this->belongsTo(Job::class);
    }
    
}
