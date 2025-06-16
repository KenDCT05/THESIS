{{-- guest.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Maroon gradient background */
        .maroon-gradient-bg {
               background: linear-gradient(135deg, #8B1538 0%, #B91C1C 30%, #DC2626 70%, #EF4444 100%);
        }
        
        /* Glassmorphism effect */
        .glass-card {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="font-sans antialiased maroon-gradient-bg text-white">  
    
    <div class="min-h-screen flex flex-col justify-center items-center relative z-10 py-12 px-4 sm:px-6 lg:px-8">
        
       <br>
       <div class="inline-flex items-center justify-center w-24 h-24 book-icon-bg rounded-3xl mb-8 pulse-animationb bg-gray-500/50">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
       <h1 class="">WELCOME BACK!</h1>
<br>
        <!-- Auth Card Container -->
        <div class="w-full max-w-lg relative">
            <!-- Decorative background elements -->
            <div class="absolute -top-4 -left-4 w-8 h-8 bg-white rounded-full opacity-10"></div>
            <div class="absolute -bottom-4 -right-4 w-6 h-6 bg-white rounded-full opacity-10"></div>
            <div class="absolute top-1/2 -left-2 w-4 h-4 bg-white rounded-full opacity-8"></div>
            <div class="absolute top-1/4 -right-2 w-3 h-3 bg-white rounded-full opacity-8"></div>
            
            <!-- Main Card -->
            <div class="glass-card px-8 py-10 rounded-2xl shadow-2xl border border-white/20 hover:shadow-3xl transition-all duration-300">
                {{ $slot }}
            </div>
        </div>

        <!-- Enhanced Footer -->
        <div class="mt-8 text-center space-y-2">
            <div class="flex items-center justify-center space-x-2 text-sm text-white/70">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span>Capstone Project.</span>
            </div>
        </div>
        
        <!-- Scroll indicator for mobile -->
        <div class="fixed bottom-4 left-1/2 transform -translate-x-1/2 md:hidden">
            <div class="animate-bounce">
                <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </div>
</body>
</html>