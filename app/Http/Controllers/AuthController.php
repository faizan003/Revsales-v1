<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Redirect based on user type
            $user = Auth::user();
            if ($user->user_type === 'company') {
                return redirect()->intended('/dashboard/company');
            } else {
                return redirect()->intended('/dashboard/solo');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Handle solo warrior registration
     */
    public function registerSolo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'experience_level' => 'required|string|in:beginner,intermediate,advanced,expert',
            'industry' => 'required|string',
            'sales_goal' => 'required|numeric|min:0',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'user_type' => 'solo',
                'experience_level' => $request->experience_level,
                'industry' => $request->industry,
                'sales_goal' => $request->sales_goal,
                'notifications_enabled' => $request->has('notifications'),
                'leaderboard_enabled' => $request->has('leaderboard'),
                'email_verified_at' => now(), // Auto-verify for demo
            ]);

            // Log the user in
            Auth::login($user);

            // Redirect to solo dashboard with welcome message
            return redirect('/dashboard/solo')->with('success', 'Welcome to RevSales, Solo Warrior! Your journey begins now! 🚀');
            
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Registration failed. Please try again.'])->withInput();
        }
    }

    /**
     * Handle company registration
     */
    public function registerCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string',
            'company_size' => 'required|string',
            'website' => 'nullable|url',
            'phone' => 'required|string|max:20',
            'admin_first_name' => 'required|string|max:255',
            'admin_last_name' => 'required|string|max:255',
            'admin_email' => 'required|string|email|max:255|unique:users,email',
            'admin_phone' => 'required|string|max:20',
            'job_title' => 'required|string|max:255',
            'sales_team_size' => 'required|string',
            'monthly_revenue_goal' => 'required|numeric|min:0',
            'sales_process' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'first_name' => $request->admin_first_name,
                'last_name' => $request->admin_last_name,
                'name' => $request->admin_first_name . ' ' . $request->admin_last_name,
                'email' => $request->admin_email,
                'phone' => $request->admin_phone,
                'password' => Hash::make($request->password),
                'user_type' => 'company',
                'job_title' => $request->job_title,
                'industry' => $request->industry,
                'company_name' => $request->company_name,
                'company_size' => $request->company_size,
                'website' => $request->website,
                'company_phone' => $request->phone,
                'sales_team_size' => $request->sales_team_size,
                'monthly_revenue_goal' => $request->monthly_revenue_goal,
                'sales_process' => $request->sales_process,
                'integrations' => $request->integrations ? json_encode($request->integrations) : null,
                'team_leaderboard_enabled' => $request->has('team_leaderboard'),
                'team_challenges_enabled' => $request->has('team_challenges'),
                'performance_analytics_enabled' => $request->has('performance_analytics'),
                'automated_reports_enabled' => $request->has('automated_reports'),
                'team_notifications_enabled' => $request->has('team_notifications'),
                'advanced_permissions_enabled' => $request->has('advanced_permissions'),
                'email_verified_at' => now(), // Auto-verify for demo
            ]);

            // Log the user in
            Auth::login($user);

            // Redirect to company dashboard with welcome message
            return redirect('/dashboard/company')->with('success', 'Welcome to RevSales! Your sales empire is ready to conquer! 🏢🚀');
            
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Registration failed. Please try again.'])->withInput();
        }
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
} 