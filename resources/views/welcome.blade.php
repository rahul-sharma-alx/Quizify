<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: $persist(false) }" x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Quizify - Modern quiz platform for educators, trainers, and content creators. Create engaging assessments with real-time analytics and AI-powered insights.">
    <title>Quizify - Modern Assessment Platform</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {"600":"#4f46e5","500":"#6366f1","400":"#818cf8"},
                        dark: {
                            900: '#111827',
                            800: '#1f2937',
                            700: '#374151'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white dark:bg-dark-900 antialiased" style="font-family: 'Inter', sans-serif">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 dark:bg-dark-900/80 backdrop-blur-lg border-b border-gray-200 dark:border-dark-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    <span class="text-xl font-bold text-gray-900 dark:text-white">Quizify</span>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button @click="darkMode = !darkMode" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-800">
                        <span class="sr-only">Toggle theme</span>
                        <svg x-show="!darkMode" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                        </svg>
                        <svg x-show="darkMode" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    </button>
                    <a href="#features" class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">Features</a>
                    <a href="#pricing" class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400">Pricing</a>
                    <a href="{{route('dashboard')}}" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                Transform Learning with
                <span class="bg-gradient-to-r from-primary-600 to-purple-600 bg-clip-text text-transparent">Smart Assessments</span>
            </h1>
            <div class="flex justify-center space-x-4">
                <a href="#contact" class="px-8 py-4 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-colors text-lg font-semibold shadow-lg hover:shadow-primary-500/20">
                    Start Free Trial
                </a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-20 bg-gray-50 dark:bg-dark-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Cards -->
                <div class="bg-white dark:bg-dark-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">AI-Powered Analytics</h3>
                    <p class="text-gray-600 dark:text-gray-400">Get deep insights into participant performance with automatic trend detection.</p>
                </div>

                <div class="bg-white dark:bg-dark-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Custom Branding</h3>
                    <p class="text-gray-600 dark:text-gray-400">White-label platform with your logo, colors, and domain.</p>
                </div>

                <div class="bg-white dark:bg-dark-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Secure Platform</h3>
                    <p class="text-gray-600 dark:text-gray-400">Enterprise-grade security with SSL encryption and GDPR compliance.</p>
                </div>

                <div class="bg-white dark:bg-dark-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Scheduled Exams</h3>
                    <p class="text-gray-600 dark:text-gray-400">Set time-bound assessments with automatic start/end times.</p>
                </div>

                <div class="bg-white dark:bg-dark-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Question Bank</h3>
                    <p class="text-gray-600 dark:text-gray-400">Create and manage reusable question repositories.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="py-20 bg-white dark:bg-dark-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pricing Tier 1 -->
                <div class="bg-white dark:bg-dark-800 p-8 rounded-2xl shadow-xl border border-gray-200 dark:border-dark-700">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Starter</h3>
                    <p class="text-5xl font-bold text-primary-600 mb-6">$29<span class="text-xl text-gray-500">/mo</span></p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            100 participants/month
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Basic analytics
                        </li>
                    </ul>
                    <a href="#" class="w-full block text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                        Get Started
                    </a>
                </div>

                <!-- Pricing Tier 2 -->
                <div class="bg-white dark:bg-dark-800 p-8 rounded-2xl shadow-xl border border-primary-500">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Professional</h3>
                    <p class="text-5xl font-bold text-primary-600 mb-6">$99<span class="text-xl text-gray-500">/mo</span></p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            500 participants/month
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Advanced analytics
                        </li>
                    </ul>
                    <a href="#" class="w-full block text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                        Get Started
                    </a>
                </div>

                <!-- Pricing Tier 3 -->
                <div class="bg-white dark:bg-dark-800 p-8 rounded-2xl shadow-xl border border-gray-200 dark:border-dark-700">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Enterprise</h3>
                    <p class="text-5xl font-bold text-primary-600 mb-6">Custom</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Unlimited participants
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Premium support
                        </li>
                    </ul>
                    <a href="#" class="w-full block text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        <span class="text-xl font-bold text-white">Quizify</span>
                    </div>
                    <p class="text-sm">Empowering educators through smart assessments</p>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Product</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Pricing</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Security</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-primary-400 transition-colors">About</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Careers</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Documentation</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Support</a></li>
                        <li><a href="#" class="hover:text-primary-400 transition-colors">API Status</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-dark-800 mt-8 pt-8 text-center text-sm">
                <p>&copy; 2023 Quizify. All rights reserved. <a href="#" class="text-primary-400 hover:text-primary-300">Privacy Policy</a> | <a href="#" class="text-primary-400 hover:text-primary-300">Terms of Service</a></p>
            </div>
        </div>
    </footer>
</body>
</html>