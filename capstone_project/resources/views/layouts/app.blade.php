<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Custom pastel pink theme styles */
            .bg-pastel-gradient {
                background: linear-gradient(135deg, #fce7f3 0%, #fdf2f8 50%, #fef7f7 100%);
            }
            
            .bg-soft-pink {
                background: linear-gradient(to right, #fbcfe8, #f9a8d4);
            }
            
            .shadow-pink {
                box-shadow: 0 10px 25px rgba(236, 72, 153, 0.1);
            }
            
            .border-gradient {
                border-image: linear-gradient(45deg, #ec4899, #f472b6, #fbbf24) 1;
            }
            
            .text-gradient {
                background: linear-gradient(135deg, #be185d, #ec4899, #f472b6);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .hover-lift {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .hover-lift:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 40px rgba(236, 72, 153, 0.15);
            }
            
            .glass-effect {
                background: rgba(251, 207, 232, 0.25);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(236, 72, 153, 0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-pastel-gradient min-h-screen">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="glass-effect shadow-pink hover-lift">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <div class="text-gradient font-semibold text-xl">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-pink p-6 hover-lift border border-pink-200/50">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
        
        <!-- Decorative elements -->
        <div class="fixed top-0 left-0 w-full h-full pointer-events-none overflow-hidden z-0">
            <div class="absolute top-10 left-10 w-32 h-32 bg-pink-300/20 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute top-1/3 right-20 w-24 h-24 bg-rose-300/30 rounded-full blur-lg animate-bounce" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-1/4 w-20 h-20 bg-fuchsia-300/25 rounded-full blur-lg animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-1/3 right-1/3 w-28 h-28 bg-pink-400/15 rounded-full blur-xl animate-bounce" style="animation-delay: 0.5s;"></div>
        </div>
        
        <style>
            /* Additional animations */
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            
            .animate-float {
                animation: float 3s ease-in-out infinite;
            }
            
            /* Responsive improvements */
            @media (max-width: 768px) {
                .glass-effect {
                    margin: 0 1rem;
                    border-radius: 1rem;
                }
            }
        </style>
    </body>
</html>