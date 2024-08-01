<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'quantity',
        'gender',
        'job_type',
        'slug',
    ];

    public function setNameJobAttribute($value)
    {
        $this->attributes['name_job'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category()
    {
        return $this->belongsTo(JobCategories::class, 'job_category_id');
    }
}
