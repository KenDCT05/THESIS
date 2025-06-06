<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-animation:nth-child(2) {
            animation-delay: -2s;
        }
        
        .floating-animation:nth-child(3) {
            animation-delay: -4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="floating-animation absolute top-20 left-10 w-20 h-20 bg-white bg-opacity-10 rounded-full"></div>
        <div class="floating-animation absolute top-40 right-20 w-16 h-16 bg-white bg-opacity-10 rounded-full"></div>
        <div class="floating-animation absolute bottom-32 left-20 w-12 h-12 bg-white bg-opacity-10 rounded-full"></div>
        <div class="floating-animation absolute bottom-20 right-10 w-24 h-24 bg-white bg-opacity-10 rounded-full"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center p-4 py-12 relative z-10">
        <div class="w-full max-w-6xl">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white bg-opacity-20 rounded-2xl mb-6 backdrop-blur-sm">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h1 class="text-6xl font-bold text-white mb-4 tracking-tight">Welcome to Saint Bernard</h1>
                <p class="text-xl text-white text-opacity-90 max-w-2xl mx-auto leading-relaxed">Transform your learning experience with our intelligent platform designed for modern education</p>
            </div>

            <!-- Main Card -->
            <div class="glass-effect rounded-3xl p-6 md:p-8 lg:p-12 hover-lift">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Left Side - Content -->
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-4xl font-bold text-white mb-4">
                                <span class="text-gradient bg-white bg-clip-text text-transparent">LMS</span>
                            </h2>
                            <p class="text-lg text-white text-opacity-80 font-medium mb-6">Learning Management System</p>
                            <p class="text-white text-opacity-70 text-lg leading-relaxed">
                                Experience the future of education with our smart and intuitive classroom platform. 
                                Built for both learners and educators to thrive in the digital age.
                            </p>
                        </div>
                        
                        <!-- Features -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white text-opacity-80">Interactive Learning Experience</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white text-opacity-80">Real-time Collaboration Tools</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-white text-opacity-80">Progress Tracking & Analytics</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - CTA -->
                    <div class="text-center space-y-6">
                        <div class="bg-white bg-opacity-10 rounded-2xl p-8 backdrop-blur-sm">
                            <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">Ready to Start?</h3>
                            <p class="text-white text-opacity-70 mb-6">Join thousands of learners and educators already using our platform</p>
                            
                            <!-- Login Button -->
                            <button onclick="handleLogin()" class="btn-primary w-full text-white font-semibold py-4 px-8 rounded-xl text-lg mb-4 hover-lift">
                                Log In to Your Account
                            </button>
                            
                            <!-- Secondary Actions -->
                            {{-- <div class="space-y-3">
                                <button onclick="handleDemo()" class="w-full text-white text-opacity-80 hover:text-white font-medium py-3 px-6 rounded-xl border border-white border-opacity-30 hover:bg-white hover:bg-opacity-10 transition-all duration-300">
                                    Try Demo
                                </button>
                                <button onclick="handleSignup()" class="w-full text-white text-opacity-80 hover:text-white font-medium py-3 px-6 rounded-xl hover:bg-white hover:bg-opacity-10 transition-all duration-300">
                                    Create New Account
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-12">
                <p class="text-white text-opacity-60">© 2025 LMS Platform. Empowering education through technology.</p>
            </div>
        </div>
    </div>

    <script>
        function handleLogin() {
            // In your Laravel app, replace this with: window.location.href = "{{ route('login') }}";
             window.location.href = "{{ route('login') }}";
        }
        
        // function handleDemo() {
        //     alert('Starting demo...');
        // }
        
        // function handleSignup() {
        //     alert('Redirecting to signup page...');
        // }
        
        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.hover-lift');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px) scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>