<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RevSales - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f9fafb 0%, #e5e7eb 100%); }
        .gradient-border {
            background: linear-gradient(135deg, #2563eb, #10b981);
            padding: 2px;
            border-radius: 1rem;
        }
        .gradient-border-content {
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
    </style>
</head>
<body class="h-full font-sans">
    <div class="min-h-screen flex items-center justify-center p-4 lg:p-8" x-data="{ isLoading: false }">
        <div class="max-w-md lg:max-w-lg xl:max-w-xl w-full space-y-8">
            <!-- Logo & Brand Section -->
            <div class="text-center">
                <div class="floating-animation">
                    <div class="w-20 h-20 lg:w-24 lg:h-24 bg-gradient-to-br from-blue-600 to-green-500 rounded-2xl mx-auto flex items-center justify-center mb-4 pulse-glow">
                        <i class="fas fa-rocket text-white text-2xl lg:text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Welcome Back!</h1>
                <p class="text-base lg:text-lg text-gray-600 leading-relaxed">Sign in to continue your sales journey</p>
            </div>

            <!-- Login Form Card -->
            <div class="gradient-border">
                <div class="gradient-border-content p-6 lg:p-8 xl:p-10">
                    <form class="space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-blue-600 mr-2"></i>Email Address
                            </label>
                            <input id="email" name="email" type="email" required 
                                   class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   placeholder="Enter your email">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock text-blue-600 mr-2"></i>Password
                            </label>
                            <div class="relative">
                                <input id="password" name="password" type="password" required 
                                       class="rounded-xl px-4 py-3 w-full border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all pr-12"
                                       placeholder="Enter your password">
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword()">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" 
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 block text-sm text-gray-700">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-semibold">
                                Forgot password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white px-4 py-3 rounded-xl shadow-sm hover:bg-blue-700 transition-all font-semibold text-base">
                            <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                        </button>

                        <!-- Social Login -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" 
                                    class="flex justify-center items-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:bg-gray-50 transition-all">
                                <i class="fab fa-google text-red-500 mr-2"></i>
                                <span class="text-sm font-semibold">Google</span>
                            </button>
                            <button type="button" 
                                    class="flex justify-center items-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:bg-gray-50 transition-all">
                                <i class="fab fa-microsoft text-blue-500 mr-2"></i>
                                <span class="text-sm font-semibold">Microsoft</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Register Links -->
            <div class="text-center space-y-3">
                <p class="text-sm text-gray-600">Don't have an account?</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('register.solo') }}" 
                       @click="isLoading = true"
                       class="bg-green-500 text-white px-6 py-2 rounded-xl shadow-sm hover:bg-green-600 transition-all font-semibold text-sm relative">
                        <span x-show="!isLoading">
                            <i class="fas fa-user-ninja mr-2"></i>Solo Warrior
                        </span>
                        <span x-show="isLoading" class="flex items-center">
                            <i class="fas fa-spinner fa-spin mr-2"></i>Loading...
                        </span>
                    </a>
                    <a href="{{ route('register.company') }}" 
                       @click="isLoading = true"
                       class="bg-purple-600 text-white px-6 py-2 rounded-xl shadow-sm hover:bg-purple-700 transition-all font-semibold text-sm relative">
                        <span x-show="!isLoading">
                            <i class="fas fa-building mr-2"></i>Company Team
                        </span>
                        <span x-show="isLoading" class="flex items-center">
                            <i class="fas fa-spinner fa-spin mr-2"></i>Loading...
                        </span>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center text-xs text-gray-500 mt-8">
                <p>&copy; 2024 RevSales. All rights reserved.</p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
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
</body>
</html> 