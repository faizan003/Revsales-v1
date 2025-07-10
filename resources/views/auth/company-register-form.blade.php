<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-4xl w-full space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <div class="floating-animation">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl mx-auto flex items-center justify-center mb-4 pulse-glow">
                        <i class="fas fa-building text-white text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Scale Your Sales Empire!</h1>
                <p class="text-base text-gray-600 leading-relaxed">Transform your sales team with AI-powered insights and gamification</p>
                
                <!-- Features Preview -->
                <div class="flex flex-wrap justify-center gap-2 mt-4">
                    <div class="feature-badge bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">
                        <i class="fas fa-chart-line mr-1"></i>Team Analytics
                    </div>
                    <div class="feature-badge bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs">
                        <i class="fas fa-users mr-1"></i>Team Management
                    </div>
                    <div class="feature-badge bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                        <i class="fas fa-trophy mr-1"></i>Leaderboards
                    </div>
                </div>
            </div>

            <!-- Progress Steps -->
            <div class="flex justify-center mb-8">
                <div class="flex items-center space-x-4">
                    @for($i = 1; $i <= $totalSteps; $i++)
                        <div class="step-indicator {{ $i == $currentStep ? 'step-active' : ($i < $currentStep ? 'step-completed' : '') }} rounded-full w-8 h-8 flex items-center justify-center text-sm font-semibold">
                            {{ $i }}
                        </div>
                        @if($i < $totalSteps)
                            <div class="w-16 h-1 bg-gray-200 rounded"></div>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Registration Form Card -->
            <div class="empire-gradient">
                <div class="empire-gradient-content p-8">
                    <form wire:submit="register" class="space-y-6">
                        <!-- Step 1: Company Info -->
                        <div x-show="$wire.currentStep === 1">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-building text-blue-500 mr-2"></i>Company Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-crown text-blue-500 mr-2"></i>Company Name
                                    </label>
                                    <input id="company_name" wire:model="company_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="Your company name">
                                    @error('company_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="company_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-envelope text-blue-500 mr-2"></i>Company Email
                                    </label>
                                    <input id="company_email" wire:model="company_email" type="email" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="contact@company.com">
                                    @error('company_email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="company_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-phone text-blue-500 mr-2"></i>Company Phone
                                    </label>
                                    <input id="company_phone" wire:model="company_phone" type="tel" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="+1 (555) 123-4567">
                                    @error('company_phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="industry" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-industry text-blue-500 mr-2"></i>Industry
                                    </label>
                                    <select id="industry" wire:model="industry" required 
                                            class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <option value="">Select industry</option>
                                        <option value="tech">💻 Technology</option>
                                        <option value="finance">💰 Finance</option>
                                        <option value="healthcare">🏥 Healthcare</option>
                                        <option value="retail">🛍️ Retail</option>
                                        <option value="manufacturing">🏭 Manufacturing</option>
                                        <option value="real_estate">🏠 Real Estate</option>
                                        <option value="other">🎯 Other</option>
                                    </select>
                                    @error('industry')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="company_size" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-users text-blue-500 mr-2"></i>Company Size
                                </label>
                                <select id="company_size" wire:model="company_size" required 
                                        class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                    <option value="">Select company size</option>
                                    <option value="1-10">1-10 employees</option>
                                    <option value="11-50">11-50 employees</option>
                                    <option value="51-200">51-200 employees</option>
                                    <option value="201-500">201-500 employees</option>
                                    <option value="500+">500+ employees</option>
                                </select>
                                @error('company_size')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 2: Admin Info -->
                        <div x-show="$wire.currentStep === 2">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-user-shield text-blue-500 mr-2"></i>Administrator Information
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="admin_first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-id-badge text-blue-500 mr-2"></i>First Name
                                    </label>
                                    <input id="admin_first_name" wire:model="admin_first_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="Admin first name">
                                    @error('admin_first_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="admin_last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-id-badge text-blue-500 mr-2"></i>Last Name
                                    </label>
                                    <input id="admin_last_name" wire:model="admin_last_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="Admin last name">
                                    @error('admin_last_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="admin_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-envelope text-blue-500 mr-2"></i>Admin Email
                                    </label>
                                    <input id="admin_email" wire:model="admin_email" type="email" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="admin@company.com">
                                    @error('admin_email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="admin_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-phone text-blue-500 mr-2"></i>Admin Phone
                                    </label>
                                    <input id="admin_phone" wire:model="admin_phone" type="tel" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="+1 (555) 123-4567">
                                    @error('admin_phone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Sales Team -->
                        <div x-show="$wire.currentStep === 3">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-chart-line text-blue-500 mr-2"></i>Sales Team Configuration
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="team_size" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-users text-blue-500 mr-2"></i>Sales Team Size
                                    </label>
                                    <select id="team_size" wire:model="team_size" required 
                                            class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <option value="">Select team size</option>
                                        <option value="1-5">1-5 salespeople</option>
                                        <option value="6-15">6-15 salespeople</option>
                                        <option value="16-30">16-30 salespeople</option>
                                        <option value="31-50">31-50 salespeople</option>
                                        <option value="50+">50+ salespeople</option>
                                    </select>
                                    @error('team_size')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="sales_target" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-target text-blue-500 mr-2"></i>Monthly Sales Target
                                    </label>
                                    <input id="sales_target" wire:model="sales_target" type="number" step="0.01" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                           placeholder="100000">
                                    @error('sales_target')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="current_crm" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-database text-blue-500 mr-2"></i>Current CRM System
                                </label>
                                <select id="current_crm" wire:model="current_crm" required 
                                        class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                    <option value="">Select current CRM</option>
                                    <option value="salesforce">Salesforce</option>
                                    <option value="hubspot">HubSpot</option>
                                    <option value="pipedrive">Pipedrive</option>
                                    <option value="zoho">Zoho CRM</option>
                                    <option value="freshsales">Freshsales</option>
                                    <option value="none">No CRM currently</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('current_crm')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 4: Security & Preferences -->
                        <div x-show="$wire.currentStep === 4">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-shield-alt text-blue-500 mr-2"></i>Security & Preferences
                            </h3>
                            
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-lock text-blue-500 mr-2"></i>Admin Password
                                </label>
                                <div class="relative">
                                    <input id="password" wire:model="password" type="password" required 
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
                                    <i class="fas fa-lock text-blue-500 mr-2"></i>Confirm Password
                                </label>
                                <div class="relative">
                                    <input id="password_confirmation" wire:model="password_confirmation" type="password" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all pr-12"
                                           placeholder="Confirm your password">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password_confirmation')">
                                        <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleIcon2"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="notifications" wire:model="notifications" type="checkbox" 
                                           class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
                                    <label for="notifications" class="ml-2 block text-sm text-gray-700">
                                        <i class="fas fa-bell text-blue-500 mr-1"></i>Enable team notifications
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="analytics" wire:model="analytics" type="checkbox" 
                                           class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
                                    <label for="analytics" class="ml-2 block text-sm text-gray-700">
                                        <i class="fas fa-chart-bar text-blue-500 mr-1"></i>Enable advanced analytics
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="terms" wire:model="terms" type="checkbox" required
                                           class="h-4 w-4 text-blue-500 focus:ring-blue-500 border-gray-300 rounded">
                                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                                        I agree to the <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Terms of Service</a> and <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between pt-6">
                            <button type="button" wire:click="previousStep" 
                                    class="bg-gray-300 text-gray-700 px-6 py-3 rounded-xl shadow-sm hover:bg-gray-400 transition-all font-semibold {{ $currentStep == 1 ? 'hidden' : '' }}">
                                <i class="fas fa-arrow-left mr-2"></i>Previous
                            </button>
                            
                            <button type="button" wire:click="nextStep" 
                                    class="bg-blue-500 text-white px-6 py-3 rounded-xl shadow-sm hover:bg-blue-600 transition-all font-semibold {{ $currentStep == $totalSteps ? 'hidden' : '' }}">
                                Next <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            
                            <button type="submit" 
                                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-xl shadow-sm hover:from-blue-600 hover:to-purple-700 transition-all font-semibold {{ $currentStep != $totalSteps ? 'hidden' : '' }}">
                                <i class="fas fa-rocket mr-2"></i>Launch Your Empire!
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
    </script>
</x-layouts.app>
