<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Basic user information
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->enum('user_type', ['solo', 'company'])->default('solo');
            
            // Solo warrior specific fields
            $table->enum('experience_level', ['beginner', 'intermediate', 'advanced', 'expert'])->nullable();
            $table->string('industry')->nullable();
            $table->decimal('sales_goal', 10, 2)->nullable();
            $table->boolean('notifications_enabled')->default(true);
            $table->boolean('leaderboard_enabled')->default(true);
            
            // Company specific fields
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_size')->nullable();
            $table->string('website')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('sales_team_size')->nullable();
            $table->decimal('monthly_revenue_goal', 12, 2)->nullable();
            $table->string('sales_process')->nullable();
            $table->json('integrations')->nullable();
            
            // Company team features
            $table->boolean('team_leaderboard_enabled')->default(true);
            $table->boolean('team_challenges_enabled')->default(true);
            $table->boolean('performance_analytics_enabled')->default(true);
            $table->boolean('automated_reports_enabled')->default(true);
            $table->boolean('team_notifications_enabled')->default(true);
            $table->boolean('advanced_permissions_enabled')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
