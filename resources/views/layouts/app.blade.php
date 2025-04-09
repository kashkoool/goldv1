<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'مجوهرات نذار') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=tajawal:400,500,700&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --gold: #ffd700;
                --dark-gold: #d4af37;
                --black: #000000;
                --dark-gray: #111111;
                --light-gray: #e0e0e0;
            }
            
            body {
                font-family: 'Tajawal', sans-serif;
                background: 
                    url('https://www.transparenttextures.com/patterns/diamond-upholstery.png'),
                    linear-gradient(135deg, var(--black), var(--dark-gray), var(--black));
                background-attachment: fixed;
                color: var(--light-gray);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }
            
            .min-h-screen {
                background: transparent !important;
                display: flex;
                flex-direction: column;
                flex: 1;
            }
            
            header.bg-white {
                background-color: rgba(0, 0, 0, 0.8) !important;
                border-bottom: 1px solid var(--gold);
                backdrop-filter: blur(10px);
            }
            
            .bg-white.shadow {
                box-shadow: 0 4px 6px rgba(255, 215, 0, 0.1) !important;
            }
            
            .max-w-7xl {
                color: var(--gold);
            }
            
            .centered-card {
                display: flex;
                justify-content: center;
                align-items: center;
                flex: 1;
                padding: 2rem;
            }
            
            .elegant-card {
                background: rgba(0, 0, 0, 0.8);
                border: 1px solid rgba(255, 215, 0, 0.3);
                border-radius: 16px;
                backdrop-filter: blur(12px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 
                            0 0 0 1px rgba(255, 215, 0, 0.1),
                            0 0 30px rgba(255, 215, 0, 0.1);
                width: 100%;
                max-width: 1200px;
                padding: 3rem;
                position: relative;
                overflow: hidden;
            }
            
            .elegant-card::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, 
                    rgba(255, 215, 0, 0.05) 0%, 
                    rgba(255, 215, 0, 0) 70%);
                z-index: -1;
                animation: rotate 15s linear infinite;
            }
            
            @keyframes rotate {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            

            <!-- Page Content -->
            <main class="centered-card">
                <div class="elegant-card">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>