<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevSales - Company Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f9fafb 0%, #e5e7eb 100%); }
        .company-gradient {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            padding: 2px;
            border-radius: 1rem;
        }
        .company-gradient-content {
            background: white;
            border-radius: calc(1rem - 2px);
        }
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }
        @keyframes pulse-glow {
            from { box-shadow: 0 0 20px rgba(37, 99, 235, 0.3); }
            to { box-shadow: 0 0 30px rgba(37, 99, 235, 0.6); }
        }
        .team-feature {
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .step-indicator {
            transition: all 0.3s ease;
        }
        .step-active {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
        }
        .step-completed {
            background: #2563eb;
            color: white;
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="h-full font-sans">
    <div class="min-h-screen flex items-center justify-center p-4 lg:p-8" x-data="{ isLoading: false }">
        <div class="max-w-4xl lg:max-w-5xl xl:max-w-6xl w-full space-y-6">
            <!-- Header Section -->
            <div class="text-center">
                <div class="floating-animation">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl mx-auto flex items-center justify-center mb-4 pulse-glow">
                        <i class="fas fa-building text-white text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-2">Build Your Sales Empire</h1>
                <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Unite your team and conquer the sales world together</p>
                
                <!-- Enterprise Features Preview -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4 mt-4 sm:mt-6">
                    <div class="feature-card bg-white rounded-xl p-3 sm:p-4 shadow-md">
                        <div class="text-blue-600 text-xl sm:text-2xl mb-2">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="font-semibold text-xs sm:text-sm text-gray-900">Team Management</h3>
                        <p class="text-xs text-gray-600">Manage unlimited team members</p>
                    </div>
                    <div class="feature-card bg-white rounded-xl p-3 sm:p-4 shadow-md">
                        <div class="text-purple-600 text-xl sm:text-2xl mb-2">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="font-semibold text-xs sm:text-sm text-gray-900">Advanced Analytics</h3>
                        <p class="text-xs text-gray-600">Comprehensive team insights</p>
                    </div>
                    <div class="feature-card bg-white rounded-xl p-3 sm:p-4 shadow-md">
                        <div class="text-green-600 text-xl sm:text-2xl mb-2">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3 class="font-semibold text-xs sm:text-sm text-gray-900">Team Competitions</h3>
                        <p class="text-xs text-gray-600">Boost team motivation</p>
                    </div>
                </div>
            </div>

            <!-- Progress Steps -->
            <div class="flex justify-center mb-6 sm:mb-8">
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div class="step-indicator step-active rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center text-xs sm:text-sm font-semibold">1</div>
                    <div class="w-8 sm:w-16 h-1 bg-gray-200 rounded"></div>
                    <div class="step-indicator bg-gray-200 rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center text-xs sm:text-sm font-semibold text-gray-500">2</div>
                    <div class="w-8 sm:w-16 h-1 bg-gray-200 rounded"></div>
                    <div class="step-indicator bg-gray-200 rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center text-xs sm:text-sm font-semibold text-gray-500">3</div>
                    <div class="w-8 sm:w-16 h-1 bg-gray-200 rounded"></div>
                    <div class="step-indicator bg-gray-200 rounded-full w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center text-xs sm:text-sm font-semibold text-gray-500">4</div>
                </div>
            </div>

            <!-- Registration Form Card -->
            <div class="company-gradient">
                <div class="company-gradient-content p-4 sm:p-6 md:p-8">
                    <form class="space-y-6" action="{{ route('register.company') }}" method="POST" id="companyForm">
                        @csrf
                        <input type="hidden" name="user_type" value="company">
                        
                        <!-- Step 1: Company Information -->
                        <div id="step1" class="step-content">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-building text-blue-600 mr-2"></i>Company Information
                            </h3>
                            
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-building text-blue-600 mr-2"></i>Company Name
                                    </label>
                                    <input id="company_name" name="company_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="Acme Corporation">
                                    @error('company_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="industry" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-industry text-blue-600 mr-2"></i>Industry
                                    </label>
                                    <select id="industry" name="industry" required 
                                            class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <option value="">Select industry</option>
                                        <option value="technology">💻 Technology</option>
                                        <option value="finance">💰 Finance</option>
                                        <option value="healthcare">🏥 Healthcare</option>
                                        <option value="manufacturing">🏭 Manufacturing</option>
                                        <option value="retail">🛍️ Retail</option>
                                        <option value="real_estate">🏠 Real Estate</option>
                                        <option value="consulting">📊 Consulting</option>
                                        <option value="other">🎯 Other</option>
                                    </select>
                                    @error('industry')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="company_size" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-users text-blue-600 mr-2"></i>Company Size
                                    </label>
                                    <select id="company_size" name="company_size" required 
                                            class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <option value="">Select size</option>
                                        <option value="startup">🚀 Startup (1-10 employees)</option>
                                        <option value="small">🌱 Small (11-50 employees)</option>
                                        <option value="medium">🔥 Medium (51-200 employees)</option>
                                        <option value="large">⚡ Large (201-1000 employees)</option>
                                        <option value="enterprise">🏢 Enterprise (1000+ employees)</option>
                                    </select>
                                    @error('company_size')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="website" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-globe text-blue-600 mr-2"></i>Website (Optional)
                                    </label>
                                    <input id="website" name="website" type="url" 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="https://www.example.com">
                                    @error('website')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-phone text-blue-600 mr-2"></i>Company Phone
                                    </label>
                                    <input id="phone" name="phone" type="tel" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="+1 (555) 123-4567">
                                    @error('phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Administrator Details -->
                        <div id="step2" class="step-content hidden">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-user-tie text-blue-600 mr-2"></i>Administrator Details
                            </h3>
                            
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="admin_first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-id-badge text-blue-600 mr-2"></i>First Name
                                    </label>
                                    <input id="admin_first_name" name="admin_first_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="John">
                                    @error('admin_first_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="admin_last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-id-badge text-blue-600 mr-2"></i>Last Name
                                    </label>
                                    <input id="admin_last_name" name="admin_last_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="Doe">
                                    @error('admin_last_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="admin_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-envelope text-blue-600 mr-2"></i>Email Address
                                    </label>
                                    <input id="admin_email" name="admin_email" type="email" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="admin@company.com">
                                    @error('admin_email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="admin_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-phone text-blue-600 mr-2"></i>Phone Number
                                    </label>
                                    <input id="admin_phone" name="admin_phone" type="tel" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="+1 (555) 123-4567">
                                    @error('admin_phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="job_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-briefcase text-blue-600 mr-2"></i>Job Title
                                </label>
                                <input id="job_title" name="job_title" type="text" required 
                                       class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                       placeholder="Sales Manager">
                                @error('job_title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 3: Sales Configuration -->
                        <div id="step3" class="step-content hidden">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-chart-line text-blue-600 mr-2"></i>Sales Configuration
                            </h3>
                            
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="sales_team_size" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-users text-blue-600 mr-2"></i>Sales Team Size
                                    </label>
                                    <select id="sales_team_size" name="sales_team_size" required 
                                            class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <option value="">Select team size</option>
                                        <option value="2-5">2-5 members</option>
                                        <option value="6-10">6-10 members</option>
                                        <option value="11-25">11-25 members</option>
                                        <option value="26-50">26-50 members</option>
                                        <option value="50+">50+ members</option>
                                    </select>
                                    @error('sales_team_size')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="monthly_revenue_goal" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-target text-blue-600 mr-2"></i>Monthly Revenue Goal
                                    </label>
                                    <input id="monthly_revenue_goal" name="monthly_revenue_goal" type="number" step="0.01" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="100000">
                                    @error('monthly_revenue_goal')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="sales_process" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-cogs text-blue-600 mr-2"></i>Current Sales Process
                                </label>
                                <select id="sales_process" name="sales_process" required 
                                        class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                    <option value="">Select your process</option>
                                    <option value="basic">📝 Basic CRM</option>
                                    <option value="structured">📊 Structured Pipeline</option>
                                    <option value="advanced">🚀 Advanced Automation</option>
                                    <option value="custom">⚙️ Custom Process</option>
                                    <option value="none">🆕 No Process Yet</option>
                                </select>
                                @error('sales_process')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="integration_needs" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-plug text-blue-600 mr-2"></i>Integration Needs
                                </label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="integrations[]" value="email" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">📧 Email</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="integrations[]" value="calendar" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">📅 Calendar</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="integrations[]" value="crm" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">🏢 CRM</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="integrations[]" value="accounting" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">💰 Accounting</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="integrations[]" value="marketing" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">📈 Marketing</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="integrations[]" value="support" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-700">🎧 Support</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Security & Preferences -->
                        <div id="step4" class="step-content hidden">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-shield-alt text-blue-600 mr-2"></i>Security & Preferences
                            </h3>
                            
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-lock text-blue-600 mr-2"></i>Password
                                    </label>
                                    <div class="relative">
                                        <input id="password" name="password" type="password" required 
                                               class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all pr-12"
                                               placeholder="Create a strong password">
                                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password')">
                                            <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleIcon1"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-lock text-blue-600 mr-2"></i>Confirm Password
                                    </label>
                                    <div class="relative">
                                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                                               class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all pr-12"
                                               placeholder="Confirm your password">
                                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password_confirmation')">
                                            <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleIcon2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <h4 class="text-base sm:text-lg font-semibold text-gray-900">Team Features</h4>
                                
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <input id="team_leaderboard" name="team_leaderboard" type="checkbox" checked
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label for="team_leaderboard" class="ml-2 block text-sm text-gray-700">
                                                <i class="fas fa-trophy text-blue-600 mr-1"></i>Enable team leaderboard
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="team_challenges" name="team_challenges" type="checkbox" checked
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label for="team_challenges" class="ml-2 block text-sm text-gray-700">
                                                <i class="fas fa-flag text-blue-600 mr-1"></i>Team challenges
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="performance_analytics" name="performance_analytics" type="checkbox" checked
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label for="performance_analytics" class="ml-2 block text-sm text-gray-700">
                                                <i class="fas fa-chart-bar text-blue-600 mr-1"></i>Performance analytics
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <input id="automated_reports" name="automated_reports" type="checkbox" checked
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label for="automated_reports" class="ml-2 block text-sm text-gray-700">
                                                <i class="fas fa-file-alt text-blue-600 mr-1"></i>Automated reports
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="team_notifications" name="team_notifications" type="checkbox" checked
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label for="team_notifications" class="ml-2 block text-sm text-gray-700">
                                                <i class="fas fa-bell text-blue-600 mr-1"></i>Team notifications
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="advanced_permissions" name="advanced_permissions" type="checkbox"
                                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label for="advanced_permissions" class="ml-2 block text-sm text-gray-700">
                                                <i class="fas fa-shield-alt text-blue-600 mr-1"></i>Advanced permissions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center pt-4">
                                    <input id="terms" name="terms" type="checkbox" required
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                                        I agree to the <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Terms of Service</a>, <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Privacy Policy</a>, and <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Enterprise Agreement</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-6">
                            <button type="button" id="prevBtn" onclick="changeStep(-1)" 
                                    class="bg-gray-300 text-gray-700 px-4 sm:px-6 py-3 rounded-xl shadow-sm hover:bg-gray-400 transition-all font-semibold hidden order-2 sm:order-1">
                                <i class="fas fa-arrow-left mr-2"></i>Previous
                            </button>
                            
                            <button type="button" id="nextBtn" onclick="changeStep(1)" 
                                    class="bg-blue-600 text-white px-4 sm:px-6 py-3 rounded-xl shadow-sm hover:bg-blue-700 transition-all font-semibold order-1 sm:order-2">
                                Next <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            
                            <button type="submit" id="submitBtn" 
                                    @click="isLoading = true"
                                    class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 sm:px-8 py-3 rounded-xl shadow-sm hover:from-blue-700 hover:to-purple-700 transition-all font-semibold hidden order-1 sm:order-2">
                                <span x-show="!isLoading">
                                    <i class="fas fa-rocket mr-2"></i>Launch Our Empire!
                                </span>
                                <span x-show="isLoading" class="flex items-center">
                                    <i class="fas fa-spinner fa-spin mr-2"></i>Creating Empire...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Back to Login -->
            <div class="text-center">
                <p class="text-sm text-gray-600">Already have an account? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Sign in</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 4;

        function changeStep(direction) {
            const newStep = currentStep + direction;
            
            if (newStep < 1 || newStep > totalSteps) return;
            
            // Hide current step
            document.getElementById(`step${currentStep}`).classList.add('hidden');
            
            // Update step indicator
            const currentIndicator = document.querySelectorAll('.step-indicator')[currentStep - 1];
            currentIndicator.classList.remove('step-active');
            if (direction > 0) {
                currentIndicator.classList.add('step-completed');
            }
            
            // Show new step
            currentStep = newStep;
            document.getElementById(`step${currentStep}`).classList.remove('hidden');
            
            // Update step indicator
            const newIndicator = document.querySelectorAll('.step-indicator')[currentStep - 1];
            newIndicator.classList.add('step-active');
            newIndicator.classList.remove('step-completed');
            
            // Update buttons
            updateButtons();
        }

        function updateButtons() {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            
            prevBtn.classList.toggle('hidden', currentStep === 1);
            nextBtn.classList.toggle('hidden', currentStep === totalSteps);
            submitBtn.classList.toggle('hidden', currentStep !== totalSteps);
        }

        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleIcon = fieldId === 'password' ? document.getElementById('toggleIcon1') : document.getElementById('toggleIcon2');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Initialize
        updateButtons();
    </script>
</body>
</html> 