<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-2xl w-full space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <div class="floating-animation">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-yellow-400 rounded-2xl mx-auto flex items-center justify-center mb-4 pulse-glow">
                        <i class="fas fa-user-ninja text-white text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Become a Solo Warrior!</h1>
                <p class="text-base text-gray-600 leading-relaxed">Join the elite ranks of independent sales champions</p>
                
                <!-- Achievement Preview -->
                <div class="flex justify-center gap-2 mt-4">
                    <div class="achievement-badge bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full text-xs">
                        <i class="fas fa-star mr-1"></i>Rookie Badge
                    </div>
                    <div class="achievement-badge bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">
                        <i class="fas fa-trophy mr-1"></i>First Sale
                    </div>
                    <div class="achievement-badge bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs">
                        <i class="fas fa-fire mr-1"></i>Streak Master
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
            <div class="warrior-gradient">
                <div class="warrior-gradient-content p-8">
                    <form wire:submit="register" class="space-y-6">
                        <!-- Step 1: Basic Info -->
                        <div x-show="$wire.currentStep === 1">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-user text-green-500 mr-2"></i>Warrior Identity
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-id-badge text-green-500 mr-2"></i>First Name
                                    </label>
                                    <input id="first_name" wire:model="first_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                           placeholder="Your first name">
                                    @error('first_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-id-badge text-green-500 mr-2"></i>Last Name
                                    </label>
                                    <input id="last_name" wire:model="last_name" type="text" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                           placeholder="Your last name">
                                    @error('last_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-green-500 mr-2"></i>Email Address
                                </label>
                                <input id="email" wire:model="email" type="email" required 
                                       class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                       placeholder="warrior@example.com">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-phone text-green-500 mr-2"></i>Phone Number
                                </label>
                                <input id="phone" wire:model="phone" type="tel" required 
                                       class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                       placeholder="+1 (555) 123-4567">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 2: Sales Experience -->
                        <div x-show="$wire.currentStep === 2">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-chart-line text-green-500 mr-2"></i>Sales Experience
                            </h3>
                            
                            <div>
                                <label for="experience_level" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-medal text-green-500 mr-2"></i>Experience Level
                                </label>
                                <select id="experience_level" wire:model="experience_level" required 
                                        class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                    <option value="">Select your level</option>
                                    <option value="beginner">🌱 Beginner (0-1 years)</option>
                                    <option value="intermediate">🔥 Intermediate (1-3 years)</option>
                                    <option value="advanced">⚡ Advanced (3-5 years)</option>
                                    <option value="expert">🏆 Expert (5+ years)</option>
                                </select>
                                @error('experience_level')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="industry" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-industry text-green-500 mr-2"></i>Industry Focus
                                </label>
                                <select id="industry" wire:model="industry" required 
                                        class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                    <option value="">Select your industry</option>
                                    <option value="tech">💻 Technology</option>
                                    <option value="real_estate">🏠 Real Estate</option>
                                    <option value="finance">💰 Finance</option>
                                    <option value="healthcare">🏥 Healthcare</option>
                                    <option value="retail">🛍️ Retail</option>
                                    <option value="automotive">🚗 Automotive</option>
                                    <option value="other">🎯 Other</option>
                                </select>
                                @error('industry')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sales_goal" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-target text-green-500 mr-2"></i>Monthly Sales Goal
                                </label>
                                <input id="sales_goal" wire:model="sales_goal" type="number" step="0.01" required 
                                       class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                       placeholder="10000">
                                @error('sales_goal')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 3: Security & Preferences -->
                        <div x-show="$wire.currentStep === 3">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-shield-alt text-green-500 mr-2"></i>Security & Preferences
                            </h3>
                            
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-lock text-green-500 mr-2"></i>Password
                                </label>
                                <div class="relative">
                                    <input id="password" wire:model="password" type="password" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all pr-12"
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
                                    <i class="fas fa-lock text-green-500 mr-2"></i>Confirm Password
                                </label>
                                <div class="relative">
                                    <input id="password_confirmation" wire:model="password_confirmation" type="password" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all pr-12"
                                           placeholder="Confirm your password">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password_confirmation')">
                                        <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleIcon2"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="notifications" wire:model="notifications" type="checkbox" 
                                           class="h-4 w-4 text-green-500 focus:ring-green-500 border-gray-300 rounded">
                                    <label for="notifications" class="ml-2 block text-sm text-gray-700">
                                        <i class="fas fa-bell text-green-500 mr-1"></i>Enable achievement notifications
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="leaderboard" wire:model="leaderboard" type="checkbox" 
                                           class="h-4 w-4 text-green-500 focus:ring-green-500 border-gray-300 rounded">
                                    <label for="leaderboard" class="ml-2 block text-sm text-gray-700">
                                        <i class="fas fa-trophy text-green-500 mr-1"></i>Join public leaderboard
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="terms" wire:model="terms" type="checkbox" required
                                           class="h-4 w-4 text-green-500 focus:ring-green-500 border-gray-300 rounded">
                                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                                        I agree to the <a href="#" class="text-green-600 hover:text-green-700 font-semibold">Terms of Service</a> and <a href="#" class="text-green-600 hover:text-green-700 font-semibold">Privacy Policy</a>
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
                                    class="bg-green-500 text-white px-6 py-3 rounded-xl shadow-sm hover:bg-green-600 transition-all font-semibold {{ $currentStep == $totalSteps ? 'hidden' : '' }}">
                                Next <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            
                            <button type="submit" 
                                    class="bg-gradient-to-r from-green-500 to-yellow-400 text-white px-8 py-3 rounded-xl shadow-sm hover:from-green-600 hover:to-yellow-500 transition-all font-semibold {{ $currentStep != $totalSteps ? 'hidden' : '' }}">
                                <i class="fas fa-rocket mr-2"></i>Launch My Journey!
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Back to Login -->
            <div class="text-center">
                <p class="text-sm text-gray-600">Already have an account? 
                    <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-semibold">Sign in</a>
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
