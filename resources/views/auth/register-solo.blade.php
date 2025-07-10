<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevSales - Join as Solo Warrior</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f9fafb 0%, #e5e7eb 100%); }
        .warrior-gradient {
            background: linear-gradient(135deg, #10b981, #facc15);
            padding: 2px;
            border-radius: 1rem;
        }
        .warrior-gradient-content {
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
            from { box-shadow: 0 0 20px rgba(16, 185, 129, 0.3); }
            to { box-shadow: 0 0 30px rgba(16, 185, 129, 0.6); }
        }
        .achievement-badge {
            animation: bounce 2s ease-in-out infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }
        .step-indicator {
            transition: all 0.3s ease;
        }
        .step-active {
            background: linear-gradient(135deg, #10b981, #facc15);
            color: white;
        }
        .step-completed {
            background: #10b981;
            color: white;
        }
    </style>
</head>
<body class="h-full font-sans">
    <div class="min-h-screen flex items-center justify-center p-4 lg:p-8" x-data="{ isLoading: false }">
        <div class="max-w-2xl lg:max-w-3xl xl:max-w-4xl w-full space-y-8">
            <!-- Header Section -->
            <div class="text-center">
                <div class="floating-animation">
                    <div class="w-24 h-24 lg:w-28 lg:h-28 bg-gradient-to-br from-green-500 to-yellow-400 rounded-2xl mx-auto flex items-center justify-center mb-4 pulse-glow">
                        <i class="fas fa-user-ninja text-white text-3xl lg:text-4xl"></i>
                    </div>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-2">Become a Solo Warrior!</h1>
                <p class="text-base lg:text-lg text-gray-600 leading-relaxed">Join the elite ranks of independent sales champions</p>
                
                <!-- Achievement Preview -->
                <div class="flex justify-center gap-2 mt-4 lg:gap-3">
                    <div class="achievement-badge bg-yellow-100 text-yellow-600 px-2 py-1 lg:px-3 lg:py-2 rounded-full text-xs lg:text-sm">
                        <i class="fas fa-star mr-1"></i>Rookie Badge
                    </div>
                    <div class="achievement-badge bg-green-100 text-green-600 px-2 py-1 lg:px-3 lg:py-2 rounded-full text-xs lg:text-sm">
                        <i class="fas fa-trophy mr-1"></i>First Sale
                    </div>
                    <div class="achievement-badge bg-blue-100 text-blue-600 px-2 py-1 lg:px-3 lg:py-2 rounded-full text-xs lg:text-sm">
                        <i class="fas fa-fire mr-1"></i>Streak Master
                    </div>
                </div>
            </div>

            <!-- Progress Steps -->
            <div class="flex justify-center mb-8">
                <div class="flex items-center space-x-4 lg:space-x-6">
                    <div class="step-indicator step-active rounded-full w-8 h-8 lg:w-10 lg:h-10 flex items-center justify-center text-sm lg:text-base font-semibold">1</div>
                    <div class="w-16 lg:w-20 h-1 bg-gray-200 rounded"></div>
                    <div class="step-indicator bg-gray-200 rounded-full w-8 h-8 lg:w-10 lg:h-10 flex items-center justify-center text-sm lg:text-base font-semibold text-gray-500">2</div>
                    <div class="w-16 lg:w-20 h-1 bg-gray-200 rounded"></div>
                    <div class="step-indicator bg-gray-200 rounded-full w-8 h-8 lg:w-10 lg:h-10 flex items-center justify-center text-sm lg:text-base font-semibold text-gray-500">3</div>
                </div>
            </div>

            <!-- Registration Form Card -->
            <div class="warrior-gradient">
                <div class="warrior-gradient-content p-6 lg:p-8 xl:p-10">
                    <form class="space-y-6" action="{{ route('register.solo') }}" method="POST" id="soloForm">
                        @csrf
                        <input type="hidden" name="user_type" value="solo">
                        
                        <!-- Step 1: Basic Info -->
                        <div id="step1" class="step-content">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-user text-green-500 mr-2"></i>Warrior Identity
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        <i class="fas fa-id-badge text-green-500 mr-2"></i>First Name
                                    </label>
                                    <input id="first_name" name="first_name" type="text" required 
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
                                    <input id="last_name" name="last_name" type="text" required 
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
                                <input id="email" name="email" type="email" required 
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
                                <input id="phone" name="phone" type="tel" required 
                                       class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                       placeholder="+1 (555) 123-4567">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 2: Sales Experience -->
                        <div id="step2" class="step-content hidden">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-chart-line text-green-500 mr-2"></i>Sales Experience
                            </h3>
                            
                            <div>
                                <label for="experience_level" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-medal text-green-500 mr-2"></i>Experience Level
                                </label>
                                <select id="experience_level" name="experience_level" required 
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
                                <select id="industry" name="industry" required 
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
                                <input id="sales_goal" name="sales_goal" type="number" step="0.01" required 
                                       class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                       placeholder="10000">
                                @error('sales_goal')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 3: Security & Preferences -->
                        <div id="step3" class="step-content hidden">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">
                                <i class="fas fa-shield-alt text-green-500 mr-2"></i>Security & Preferences
                            </h3>
                            
                            <div>
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-lock text-green-500 mr-2"></i>Password
                                </label>
                                <div class="relative">
                                    <input id="password" name="password" type="password" required 
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
                                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                                           class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all pr-12"
                                           placeholder="Confirm your password">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password_confirmation')">
                                        <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleIcon2"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="notifications" name="notifications" type="checkbox" checked
                                           class="h-4 w-4 text-green-500 focus:ring-green-500 border-gray-300 rounded">
                                    <label for="notifications" class="ml-2 block text-sm text-gray-700">
                                        <i class="fas fa-bell text-green-500 mr-1"></i>Enable achievement notifications
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="leaderboard" name="leaderboard" type="checkbox" checked
                                           class="h-4 w-4 text-green-500 focus:ring-green-500 border-gray-300 rounded">
                                    <label for="leaderboard" class="ml-2 block text-sm text-gray-700">
                                        <i class="fas fa-trophy text-green-500 mr-1"></i>Join public leaderboard
                                    </label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="terms" name="terms" type="checkbox" required
                                           class="h-4 w-4 text-green-500 focus:ring-green-500 border-gray-300 rounded">
                                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                                        I agree to the <a href="#" class="text-green-600 hover:text-green-700 font-semibold">Terms of Service</a> and <a href="#" class="text-green-600 hover:text-green-700 font-semibold">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-between pt-6">
                            <button type="button" id="prevBtn" onclick="changeStep(-1)" 
                                    class="bg-gray-300 text-gray-700 px-6 py-3 rounded-xl shadow-sm hover:bg-gray-400 transition-all font-semibold hidden">
                                <i class="fas fa-arrow-left mr-2"></i>Previous
                            </button>
                            
                            <button type="button" id="nextBtn" onclick="changeStep(1)" 
                                    class="bg-green-500 text-white px-6 py-3 rounded-xl shadow-sm hover:bg-green-600 transition-all font-semibold ml-auto">
                                Next <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            
                            <button type="submit" id="submitBtn" 
                                    @click="isLoading = true"
                                    class="bg-gradient-to-r from-green-500 to-yellow-400 text-white px-8 py-3 rounded-xl shadow-sm hover:from-green-600 hover:to-yellow-500 transition-all font-semibold hidden">
                                <span x-show="!isLoading">
                                    <i class="fas fa-rocket mr-2"></i>Launch My Journey!
                                </span>
                                <span x-show="isLoading" class="flex items-center">
                                    <i class="fas fa-spinner fa-spin mr-2"></i>Starting Journey...
                                </span>
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
        let currentStep = 1;
        const totalSteps = 3;

        function changeStep(direction) {
            const newStep = currentStep + direction;
            
            if (newStep < 1 || newStep > totalSteps) return;
            
            // Hide current step
            document.getElementById(`step${currentStep}`).classList.add('hidden');
            
            // Update step indicator
            const currentIndicator = document.querySelectorAll('.step-indicator')[currentStep - 1];
            currentIndicator.classList.remove('step-active');
            currentIndicator.classList.add('step-completed');
            
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