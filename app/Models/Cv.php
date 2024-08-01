<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_cv',
        'name_cv',
        'full_name',
        'email',
        'phone_number',
        'position_applied',
        'career_goals',
        'work_experience',
        'education',
        'projects',
        'skills',
        'interests',
        'activities',
        'referrals',
        'awards',
        'certifications',
        'address'
    ];

    /**
     * Liên kết với User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
