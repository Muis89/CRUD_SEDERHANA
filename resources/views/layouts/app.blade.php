<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 CRUD MUIS GANTENG</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        .fade-enter-active, .fade-leave-active {
            transition: all 0.5s ease;
        }
        .fade-enter-from, .fade-leave-to {
            opacity: 0;
            transform: translateY(20px);
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">
    <div x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 30 })"
         class="min-h-screen flex flex-col">

        <header class="fixed w-full z-50 transition-all duration-300"
                :class="{ 'bg-gray-800 shadow-lg': scrolled, 'bg-transparent': !scrolled }">
            <nav class="container mx-auto px-4 py-4">
                <div class="flex items-center justify-between">
                    <a href="/" class="text-2xl font-bold text-white transition-colors duration-300">
                        MUIS GANTENG.COM
                    </a>
                    <div class="flex space-x-4">
                        <a href="/" class="text-white hover:text-blue-400 transition-colors duration-300">Home</a>
                        <a href="/products" class="text-white hover:text-blue-400 transition-colors duration-300">Products</a>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-grow">
            <div class="container mx-auto px-4 pt-24">
                @yield('content')
            </div>
        </main>

        <footer class="bg-gray-800 text-white py-8 mt-12">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-xl font-bold mb-4">About Us</h3>
                        <p class="text-gray-400">Modern and dynamic CRUD application showcasing the power of Laravel and modern web technologies.</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="/" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a></li>
                            <li><a href="/products" class="text-gray-400 hover:text-white transition-colors duration-300">Products</a></li>
                        </ul>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-xl font-bold mb-4">Contact</h3>
                        <p class="text-gray-400">Email: muis@example.com</p>
                        <div class="mt-4 flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2025 MUIS GANTENG.com. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>
</html>
