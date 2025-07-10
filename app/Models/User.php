<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'user_type',
        'experience_level',
        'industry',
        'sales_goal',
        'notifications_enabled',
        'leaderboard_enabled',
        'job_title',
        'company_name',
        'company_size',
        'website',
        'company_phone',
        'sales_team_size',
        'monthly_revenue_goal',
        'sales_process',
        'integrations',
        'team_leaderboard_enabled',
        'team_challenges_enabled',
        'performance_analytics_enabled',
        'automated_reports_enabled',
        'team_notifications_enabled',
        'advanced_permissions_enabled',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'sales_goal' => 'decimal:2',
            'monthly_revenue_goal' => 'decimal:2',
            'notifications_enabled' => 'boolean',
            'leaderboard_enabled' => 'boolean',
            'team_leaderboard_enabled' => 'boolean',
            'team_challenges_enabled' => 'boolean',
            'performance_analytics_enabled' => 'boolean',
            'automated_reports_enabled' => 'boolean',
            'team_notifications_enabled' => 'boolean',
            'advanced_permissions_enabled' => 'boolean',
            'integrations' => 'array',
        ];
    }
}
