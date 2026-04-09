<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red CX Enterprise Dashboard</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.fonts.googleapis.com/disable">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.fonts.googleapis.com/disable/css2?family=Poppins:wght@400;500;700;800&family=Syncopate:wght@700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-mont bg-main-gradient text-white min-h-screen flex flex-col selection:bg-white selection:text-power-red">

    <!-- SVG External Background -->
    <div class="fixed inset-0 pointer-events-none z-[-1] bg-cover bg-center"
        style="background-image: url('{{ asset('assets/landing/Landing Page.svg') }}'); opacity: 0.9;">
    </div>

    <!-- Header -->
    <header class="relative z-10 flex flex-col md:flex-row justify-between items-center p-8 md:px-16 pt-10">
        <!-- Logo Left -->
        <div class="flex items-center gap-4 group cursor-pointer">
            <div
                class="bg-white text-power-red font-rosca text-3xl w-14 h-14 flex justify-center items-center rounded-tl-xl rounded-tr-xl rounded-bl-xl rounded-br transition-transform group-hover:scale-110 shadow-lg shadow-black/20">
                R
            </div>
            <div>
                <h1 class="font-rosca text-3xl tracking-tight leading-none text-white drop-shadow-md">Red CX</h1>
                <p class="text-[11px] font-medium tracking-wide text-white/80 mt-1 uppercase">We Grow. We Serve. We
                    Thrive</p>
            </div>
        </div>

        <!-- Logo Right (Infomedia) -->
        <div class="flex flex-col items-end mt-6 md:mt-0 opacity-90 transition-opacity hover:opacity-100">
            <h2 class="font-bold text-2xl tracking-tighter flex items-center gap-2 drop-shadow">
                <svg viewBox="0 0 24 24" class="w-6 h-6 fill-white">
                    <path d="M12 2C12 2 13 8 18 8C13 8 12 14 12 14C12 14 11 8 6 8C11 8 12 2 12 2Z" />
                    <path d="M7 6L17 10L12 18L7 6Z" fill-opacity="0.5" />
                </svg>
                infomedia
            </h2>
            <p class="text-[10px] tracking-wide mt-1">Your Digital CX Partner - by Telkom Indonesia</p>
        </div>
    </header>

    <!-- Main Dashboard -->
    <main class="flex-1 flex justify-center items-center p-6 relative z-10 pb-20">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 lg:gap-12 max-w-7xl w-full">

            <!-- Card 1: PERFORMANCE OPS (Hover 3D + Tailwind Glass) -->
            <div onclick="window.location.href='/performance'"
                class="glass-card tilt-card card-entrance rounded-[30px] p-8 lg:p-10 relative overflow-hidden group cursor-pointer flex flex-col sm:flex-row items-center justify-between min-h-[200px] hover:shadow-2xl hover:shadow-power-red/40">
                
                <!-- Elegant White Gradient & Wave Overlay (Mimics Reference Texture) -->
                <div class="absolute inset-0 pointer-events-none rounded-[30px] overflow-hidden z-0">
                    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(240, 240, 245, 0.8) 0%, rgba(255, 255, 255, 0.5) 40%, rgba(255, 255, 255, 1) 100%);"></div>
                    <svg class="absolute w-full h-full opacity-[0.12] -rotate-12 scale-125 top-0 -left-10" viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke="#888" stroke-width="0.3" d="M 0 20 Q 50 10 100 80 M 0 25 Q 50 15 100 85 M 0 30 Q 50 20 100 90 M 0 35 Q 50 25 100 95 M 0 40 Q 50 30 100 100 M 0 45 Q 50 35 100 105 M 0 50 Q 50 40 100 110 M 0 55 Q 50 45 100 115" />
                    </svg>
                </div>

                <!-- Sweeping Background Overlay -->
                <div
                    class="absolute inset-y-0 left-0 bg-power-red w-0 group-hover:w-full transition-all duration-500 ease-in-out z-0 rounded-[30px]">
                </div>

                <!-- Number Badge Inside -->
                <div
                    class="absolute top-6 right-6 w-10 h-10 bg-power-red group-hover:bg-white text-white group-hover:text-power-red transition-colors duration-500 flex items-center justify-center rounded-full font-extrabold shadow-inner drop-shadow-md text-sm z-20">
                    01</div>

                <!-- Inner Glow Pattern -->
                <div
                    class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-gray-100/40 to-transparent pointer-events-none rounded-r-[30px] transition-opacity group-hover:opacity-100 opacity-50 z-0">
                </div>

                <!-- Animated Icon Reference Perfect: OPS -->
                <svg viewBox="0 0 100 100" class="w-[120px] h-[120px] sm:w-32 sm:h-32 stroke-power-red group-hover:stroke-white fill-transparent stroke-[3.5] stroke-linecap-round stroke-linejoin-round relative z-10 group-hover:scale-110 transition-transform duration-500">
                    <!-- Base line -->
                    <line class="draw-line" x1="10" y1="80" x2="90" y2="80" style="animation-delay: 0.1s" />
                    <!-- Semi-circle Gauge -->
                    <path class="draw-line" d="M 20 80 A 30 30 0 0 1 80 80" style="animation-delay: 0.2s" />
                    <!-- Ticks -->
                    <line class="draw-line" x1="30" y1="52" x2="25" y2="45" style="animation-delay: 0.3s" />
                    <line class="draw-line" x1="50" y1="50" x2="50" y2="40" style="animation-delay: 0.4s" />
                    <line class="draw-line" x1="70" y1="52" x2="75" y2="45" style="animation-delay: 0.5s" />
                    
                    <!-- 3 Mastercrafted Perfect Stars -->
                    <polygon class="draw-line origin-[30px_25px] transition-transform duration-700 ease-out group-hover:rotate-[72deg] group-hover:scale-110" style="animation-delay: 0.5s" points="30,18 32,23 37,23 33,26 34,31 30,28 26,31 27,26 23,23 28,23" />
                    <polygon class="draw-line origin-[50px_15px] transition-transform duration-700 ease-out group-hover:rotate-[72deg] group-hover:scale-110 delay-100" style="animation-delay: 0.6s" points="50,6 52,12 59,12 53,16 55,22 50,18 45,22 47,16 41,12 48,12" />
                    <polygon class="draw-line origin-[70px_25px] transition-transform duration-700 ease-out group-hover:rotate-[72deg] group-hover:scale-110 delay-200" style="animation-delay: 0.7s" points="70,18 72,23 77,23 73,26 74,31 70,28 66,31 67,26 63,23 68,23" />
                    
                    <!-- Elegant Needle -->
                    <circle cx="50" cy="80" r="6" />
                    <path class="draw-line origin-[50px_80px] transition-transform duration-700 ease-[cubic-bezier(0.87,0,0.13,1)] group-hover:rotate-[45deg]" style="animation-delay: 0.8s" d="M 46 76 L 50 40 L 54 76 Z" />
                </svg>

                <!-- Text -->
                <div class="text-right flex-1 sm:ml-6 mt-6 sm:mt-0 relative z-10">
                    <h2
                        class="font-rosca font-bold text-[28px] lg:text-[32px] text-[#1A1A1A] group-hover:text-white transition-colors duration-500 leading-tight tracking-tighter">
                        PERFORMANCE<br><span
                            class="text-power-red group-hover:text-white transition-colors duration-500">OPS</span></h2>
                </div>
            </div>

            <!-- Card 2: BAPP (Top Right) -->
            <div onclick="window.location.href='/bapp'"
                class="glass-card tilt-card card-entrance rounded-[30px] p-8 lg:p-10 relative overflow-hidden group cursor-pointer flex flex-col-reverse sm:flex-row items-center justify-between min-h-[200px] hover:shadow-2xl hover:shadow-power-red/40">
                
                <!-- Elegant White Gradient & Wave Overlay (Mimics Reference Texture) -->
                <div class="absolute inset-0 pointer-events-none rounded-[30px] overflow-hidden z-0">
                    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(235, 235, 242, 0.9) 0%, rgba(255, 255, 255, 0.6) 45%, rgba(255, 255, 255, 1) 100%);"></div>
                    <svg class="absolute w-full h-[150%] opacity-[0.14] rotate-6 scale-[1.3] top-[-20%] left-0" viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke="#888" stroke-width="0.3" d="M -10 10 Q 40 40 110 5 M -10 15 Q 40 45 110 10 M -10 20 Q 40 50 110 15 M -10 25 Q 40 55 110 20 M -10 30 Q 40 60 110 25 M -10 35 Q 40 65 110 30 M -10 40 Q 40 70 110 35 M -10 45 Q 40 75 110 40" />
                    </svg>
                </div>

                <!-- Sweeping Background Overlay -->
                <div
                    class="absolute inset-y-0 left-0 bg-power-red w-0 group-hover:w-full transition-all duration-500 ease-in-out z-0 rounded-[30px]">
                </div>

                <!-- Number Badge Top Left -->
                <div
                    class="absolute top-6 left-6 w-10 h-10 bg-power-red group-hover:bg-white text-white group-hover:text-power-red transition-colors duration-500 flex items-center justify-center rounded-full font-extrabold shadow-inner drop-shadow-md text-sm z-20">
                    03</div>

                <!-- Floating Tooltip -->
                <div
                    class="absolute -top-12 sm:-top-8 left-1/2 sm:left-40 bg-white text-[#1A1A1A] text-xs font-semibold py-2 px-4 rounded-md shadow-lg shadow-black/20 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:-translate-y-2 z-30 pointer-events-none">
                    Click here to follow
                    <div
                        class="absolute -bottom-[5px] left-1/2 -translate-x-1/2 border-[6px] border-transparent border-t-white">
                    </div>
                </div>

                <div
                    class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-gray-100/40 to-transparent pointer-events-none rounded-r-[30px] opacity-50 z-0">
                </div>

                <div class="text-left flex-1 w-full mt-6 sm:mt-0 relative z-10 pl-2 lg:pl-4">
                    <h2
                        class="font-rosca font-bold text-[32px] lg:text-[40px] text-[#1A1A1A] group-hover:text-white transition-colors duration-500 leading-tight tracking-tighter">
                        BAPP</h2>
                </div>

                <svg viewBox="0 0 100 100" class="w-[120px] h-[120px] sm:w-32 sm:h-32 stroke-power-red group-hover:stroke-white fill-transparent stroke-[3.5] stroke-linecap-round stroke-linejoin-round relative z-10 group-hover:scale-110 transition-transform duration-500">
                    <!-- Back Paper (Tilted) -->
                    <path class="draw-line origin-bottom group-hover:translate-x-2 transition-transform duration-700" style="animation-delay: 0.1s" d="M 50 15 L 75 20 L 90 35 L 80 80 L 40 70 Z" />
                    
                    <!-- Front Paper (Straight) with white fill to obscure back paper -->
                    <path class="draw-line fill-[#FDFDFD] group-hover:fill-power-red transition-colors duration-500" style="animation-delay: 0.2s" d="M 30 25 L 55 25 L 70 40 L 70 80 L 30 80 Z" />
                    <path class="draw-line" style="animation-delay: 0.3s" d="M 55 25 L 55 40 L 70 40" />
                    
                    <!-- Elegant Euro Symbol -->
                    <path class="draw-line" style="animation-delay:0.4s" d="M 57 52 C 50 50 45 53 45 58 C 45 63 50 66 57 64" />
                    <line class="draw-line" style="animation-delay:0.5s" x1="42" y1="56" x2="52" y2="56" />
                    <line class="draw-line" style="animation-delay:0.5s" x1="42" y1="60" x2="52" y2="60" />
                    
                    <!-- Modern Body text lines -->
                    <line x1="40" y1="70" x2="60" y2="70" class="draw-line opacity-0 group-hover:opacity-100 transition-opacity duration-700" style="animation-delay:0.7s" />

                    <!-- Red filled Checkmark -->
                    <circle cx="25" cy="75" r="16" class="fill-power-red group-hover:fill-white transition-colors duration-500 stroke-none" />
                    <polyline points="18,77 23,82 33,70" class="draw-line stroke-white group-hover:stroke-power-red stroke-[4] transition-colors duration-500" style="animation-delay:0.8s" />
                </svg>
            </div>

            <!-- Card 3: PERFORMANCE FINANCIAL (Bottom Left) -->
            <div onclick="window.location.href='/financial'" style="animation-delay: 0.3s;"
                class="glass-card tilt-card card-entrance rounded-[30px] p-8 lg:p-10 relative overflow-hidden group cursor-pointer flex flex-col sm:flex-row items-center justify-between min-h-[200px] hover:shadow-2xl hover:shadow-power-red/40">
                
                <!-- Elegant White Gradient & Wave Overlay (Mimics Reference Texture) -->
                <div class="absolute inset-0 pointer-events-none rounded-[30px] overflow-hidden z-0">
                    <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(240, 240, 245, 0.8) 0%, rgba(255, 255, 255, 0.5) 40%, rgba(255, 255, 255, 1) 100%);"></div>
                    <svg class="absolute w-full h-[150%] opacity-[0.11] rotate-[-15deg] scale-[1.4] -top-8 left-4" viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke="#888" stroke-width="0.3" d="M -10 10 Q 60 70 110 -10 M -10 15 Q 60 75 110 -5 M -10 20 Q 60 80 110 0 M -10 25 Q 60 85 110 5 M -10 30 Q 60 90 110 10 M -10 35 Q 60 95 110 15" />
                    </svg>
                </div>

                <!-- Sweeping Background Overlay -->
                <div
                    class="absolute inset-y-0 left-0 bg-power-red w-0 group-hover:w-full transition-all duration-500 ease-in-out z-0 rounded-[30px]">
                </div>

                <div
                    class="absolute top-6 right-6 w-10 h-10 bg-power-red group-hover:bg-white text-white group-hover:text-power-red transition-colors duration-500 flex items-center justify-center rounded-full font-extrabold shadow-inner drop-shadow-md text-sm z-20">
                    02</div>
                <div
                    class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-gray-100/40 to-transparent pointer-events-none rounded-r-[30px] transition-opacity group-hover:opacity-100 opacity-50 z-0">
                </div>

                <svg viewBox="0 0 100 100" class="w-[120px] h-[120px] sm:w-32 sm:h-32 stroke-power-red group-hover:stroke-white fill-transparent stroke-[3.5] stroke-linecap-round stroke-linejoin-round relative z-10 group-hover:scale-110 transition-transform duration-500">
                    <!-- Gauge Arc (Perfectly symmetrical smaller radius) -->
                    <path class="draw-line" d="M 25 85 A 25 25 0 0 1 75 85" />
                    <line class="draw-line" style="animation-delay:0.1s" x1="20" y1="85" x2="30" y2="85" />
                    <line class="draw-line" style="animation-delay:0.2s" x1="70" y1="85" x2="80" y2="85" />
                    <line class="draw-line" style="animation-delay:0.3s" x1="50" y1="60" x2="50" y2="55" />

                    <!-- 4 PERFECTLY SYMMETRICAL SMILING FACES CIRCLING THE GAUGE -->
                    
                    <!-- 1. Smile 1 (Left - 155 deg, wider radius gap) -->
                    <g class="transition-transform duration-700 ease-in-out group-hover:-translate-y-1">
                        <circle class="draw-line" style="animation-delay:0.2s" cx="12" cy="67" r="8" />
                        <line x1="9" y1="64" x2="9.1" y2="64" class="stroke-[4] stroke-linecap-round" />
                        <line x1="15" y1="64" x2="15.1" y2="64" class="stroke-[4] stroke-linecap-round" />
                        <path class="draw-line" d="M 8 68 Q 12 73 16 68" />
                    </g>
                    <!-- 2. Smile 2 (Top Left - 115 deg) -->
                    <g class="transition-transform duration-700 ease-in-out group-hover:-translate-y-2 delay-75">
                        <circle class="draw-line" style="animation-delay:0.3s" cx="32" cy="47" r="8" />
                        <line x1="29" y1="44" x2="29.1" y2="44" class="stroke-[4] stroke-linecap-round" />
                        <line x1="35" y1="44" x2="35.1" y2="44" class="stroke-[4] stroke-linecap-round" />
                        <path class="draw-line" d="M 28 48 Q 32 53 36 48" />
                    </g>
                    <!-- 3. Smile 3 (Top Right - 65 deg) -->
                    <g class="transition-transform duration-700 ease-in-out group-hover:-translate-y-2 delay-100">
                        <circle class="draw-line" style="animation-delay:0.4s" cx="68" cy="47" r="8" />
                        <line x1="65" y1="44" x2="65.1" y2="44" class="stroke-[4] stroke-linecap-round" />
                        <line x1="71" y1="44" x2="71.1" y2="44" class="stroke-[4] stroke-linecap-round" />
                        <path class="draw-line" d="M 64 48 Q 68 53 72 48" />
                    </g>
                    <!-- 4. Smile 4 (Right - 25 deg) -->
                    <g class="transition-transform duration-700 ease-in-out group-hover:-translate-y-1 delay-150">
                        <circle class="draw-line" style="animation-delay:0.5s" cx="88" cy="67" r="8" />
                        <line x1="85" y1="64" x2="85.1" y2="64" class="stroke-[4] stroke-linecap-round" />
                        <line x1="91" y1="64" x2="91.1" y2="64" class="stroke-[4] stroke-linecap-round" />
                        <path class="draw-line" d="M 84 68 Q 88 73 92 68" />
                    </g>

                    <!-- Elegant Needle originally pointing Up slightly left, dynamically sweeping to Happy -->
                    <circle cx="50" cy="85" r="5" />
                    <path class="draw-line origin-[50px_85px] transition-transform duration-700 ease-[cubic-bezier(0.87,0,0.13,1)] group-hover:rotate-[65deg]" style="animation-delay:0.7s" d="M 47 81 L 50 55 L 53 81 Z" />
                </svg>

                <div class="text-right flex-1 sm:ml-6 mt-6 sm:mt-0 relative z-10">
                    <h2
                        class="font-rosca font-bold text-[26px] lg:text-[28px] text-[#1A1A1A] group-hover:text-white transition-colors duration-500 leading-tight tracking-tighter">
                        PERFORMANCE<br><span
                            class="text-power-red group-hover:text-white transition-colors duration-500">FINANCIAL</span>
                    </h2>
                </div>
            </div>

            <!-- Card 4: SDM (Bottom Right) -->
            <div onclick="window.location.href='/sdm'"
                class="glass-card tilt-card card-entrance rounded-[30px] p-8 lg:p-10 relative overflow-hidden group cursor-pointer flex flex-col-reverse sm:flex-row items-center justify-between min-h-[200px] hover:shadow-2xl hover:shadow-power-red/40">
                
                <!-- Elegant White Gradient & Wave Overlay (Mimics Reference Texture) -->
                <div class="absolute inset-0 pointer-events-none rounded-[30px] overflow-hidden z-0">
                    <div class="absolute inset-0" style="background: radial-gradient(ellipse at 10% 10%, rgba(230, 230, 240, 0.9) 0%, rgba(255, 255, 255, 0.7) 50%, rgba(255, 255, 255, 1) 100%);"></div>
                    <svg class="absolute w-full h-[120%] opacity-[0.14] -rotate-[8deg] scale-125 top-0 left-0" viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke="#888" stroke-width="0.3" d="M 0 10 Q 30 50 110 30 M 0 15 Q 30 55 110 35 M 0 20 Q 30 60 110 40 M 0 25 Q 30 65 110 45 M 0 30 Q 30 70 110 50 M 0 35 Q 30 75 110 55 M 0 40 Q 30 80 110 60" />
                    </svg>
                </div>

                <!-- Sweeping Background Overlay -->
                <div
                    class="absolute inset-y-0 left-0 bg-power-red w-0 group-hover:w-full transition-all duration-500 ease-in-out z-0 rounded-[30px]">
                </div>

                <div
                    class="absolute top-6 left-6 w-10 h-10 bg-power-red group-hover:bg-white text-white group-hover:text-power-red transition-colors duration-500 flex items-center justify-center rounded-full font-extrabold shadow-inner drop-shadow-md text-sm z-20">
                    04</div>
                <div
                    class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-gray-100/40 to-transparent pointer-events-none rounded-r-[30px] opacity-50 z-0">
                </div>

                <div class="text-left flex-1 mt-6 sm:mt-0 relative z-10 pl-2 lg:pl-4">
                    <h2
                        class="font-rosca font-bold text-[32px] lg:text-[40px] text-[#1A1A1A] group-hover:text-white transition-colors duration-500 leading-tight tracking-tighter">
                        SDM</h2>
                </div>

                <svg viewBox="0 0 100 100" class="w-[120px] h-[120px] sm:w-32 sm:h-32 stroke-power-red group-hover:stroke-white fill-transparent stroke-[4] stroke-linecap-round stroke-linejoin-round relative z-10 group-hover:scale-110 transition-transform duration-500">
                    <!-- Head -->
                    <circle cx="50" cy="35" r="16" class="draw-line group-hover:-translate-y-2 transition-transform duration-500 ease-out" style="animation-delay:0.1s" />
                    <!-- Shoulders -->
                    <path class="draw-line group-hover:translate-y-1 transition-transform duration-500 ease-out" style="animation-delay:0.3s" d="M 22 85 Q 22 55 50 55 Q 78 55 78 85" />
                </svg>
            </div>

        </div>
    </main>

    <!-- Scroll Down Indicator -->
    <div
        class="absolute bottom-6 left-1/2 -translate-x-1/2 w-12 h-12 bg-white rounded-full flex justify-center items-center cursor-pointer shadow-lg hover:-translate-y-1 transition-transform z-20 animate-bounce">
        <svg fill="none" stroke="#E31E24" viewBox="0 0 24 24" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>

</body>

</html>