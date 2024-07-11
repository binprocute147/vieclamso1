<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name_job',
        'description',
        'company_name',
        'requirements',
        'min_salary',
        'max_salary',
        'location',
        'address',
        'experience',
        'company_image',
        'job_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(JobCategories::class, 'job_category_id');
    }
}

