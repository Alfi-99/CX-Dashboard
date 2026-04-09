<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview SDM</title>
    <link href="https://fonts.fonts.googleapis.com/disable/css2?family=Poppins:wght@400;500;600;700;800&family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .sdm-bg {
            background: radial-gradient(circle at 50% 50%, #E31E24 0%, #8b0000 80%, #4a0000 100%);
        }
        .sdm-dots {
            position: fixed; inset: 0; pointer-events: none; z-index: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 2px, transparent 2px);
            background-size: 24px 24px;
            mask-image: radial-gradient(ellipse at top left, black 0%, transparent 60%);
            -webkit-mask-image: radial-gradient(ellipse at top left, black 0%, transparent 60%);
        }
        .dept-btn {
            background: linear-gradient(180deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.1) 100%);
            border: 1px solid rgba(255,255,255,0.5);
            backdrop-filter: blur(10px);
            color: white;
            font-weight: 700;
            padding: 8px 16px;
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .stat-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 6px;
        }
        .stat-label {
            color: white;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .stat-dot { width: 12px; height: 12px; border-radius: 50%; }
        .stat-value {
            background: white;
            color: black;
            font-weight: 800;
            padding: 2px 24px;
            border-radius: 20px;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        .apexcharts-datalabel-value { fill: #ffffff !important; font-weight: 700 !important; }
    </style>
</head>
<body class="font-mont sdm-bg min-h-screen relative overflow-x-hidden">

    <!-- Background Decoration -->
    <div class="sdm-dots"></div>

    <!-- Header -->
    <header class="flex justify-between items-center pt-8 px-10 relative z-10 w-full mb-4">
        <!-- Logo -->
        <div class="flex items-center">
            <div class="bg-white text-[#9c171e] font-rosca text-3xl w-14 h-14 flex justify-center items-center shadow-lg rounded-tl-xl rounded-tr-xl rounded-bl-xl rounded-br" style="font-family: 'Rosca', sans-serif;">R</div>
        </div>
        
        <!-- Title -->
        <div class="flex-1 text-center">
            <h1 class="text-white font-rosca text-4xl md:text-5xl font-bold tracking-widest drop-shadow-md">OVERVIEW SDM</h1>
        </div>

        <!-- Home/Back -->
        <div class="flex gap-3">
            <a href="/" class="w-10 h-10 rounded-full bg-white text-[#9c171e] flex justify-center items-center hover:scale-105 transition-transform shadow-lg">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M3 11l9-8 9 8" /><path d="M6 9v11a1 1 0 001 1h10a1 1 0 001-1V9" /><path d="M10 21v-4a2 2 0 014 0v4" /></svg>
            </a>
            <a href="/" class="w-10 h-10 rounded-full bg-transparent border-2 border-white text-white flex justify-center items-center hover:scale-105 transition-transform shadow">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
        </div>
    </header>

    <main class="px-8 pb-12 relative z-10 w-full mx-auto max-w-[1600px] mt-8">
        <!-- Grid 4 Columns -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-8 lg:gap-12 w-full">
            
            <!-- Column 1: DB2B -->
            <div class="flex flex-col items-center">
                <div class="text-white/80 text-sm mb-0">Total Seat</div>
                <div class="text-white font-bold text-2xl mb-2">738</div>
                <div class="text-white/80 text-sm mb-0">Total SDM</div>
                <div class="text-white font-bold text-2xl mb-4">2</div>

                <div class="dept-btn mb-6 w-full text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/></svg>
                    DIGITAL CHANNEL B2B
                </div>

                <!-- Donut Chart -->
                <div class="relative w-full flex justify-center mb-6">
                    <div id="sdmDonut1" class="w-full max-w-[250px]"></div>
                </div>

                <!-- Stats Breakdown -->
                <div class="w-full max-w-[200px]">
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#1e3a8a]"></span> Agent</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#3b82f6]"></span> TL</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#fde68a]"></span> Support</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#d97706]"></span> SPV</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#f59e0b]"></span> OM</div><div class="stat-value">2</div></div>
                </div>
            </div>

            <!-- Column 2: IBC -->
            <div class="flex flex-col items-center">
                <div class="text-white/80 text-sm mb-0">Total Seat</div>
                <div class="text-white font-bold text-2xl mb-2">738</div>
                <div class="text-white/80 text-sm mb-0">Total SDM</div>
                <div class="text-white font-bold text-2xl mb-4">1</div>

                <div class="dept-btn mb-6 w-full text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    IBC OPERATION
                </div>

                <div class="relative w-full flex justify-center mb-6">
                    <div id="sdmDonut2" class="w-full max-w-[250px]"></div>
                </div>

                <div class="w-full max-w-[200px]">
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#1e3a8a]"></span> Agent</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#3b82f6]"></span> TL</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#fde68a]"></span> Support</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#d97706]"></span> SPV</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#f59e0b]"></span> OM</div><div class="stat-value">2</div></div>
                </div>
            </div>

            <!-- Column 3: OBC -->
            <div class="flex flex-col items-center">
                <div class="text-white/80 text-sm mb-0">Total Seat</div>
                <div class="text-white font-bold text-2xl mb-2">738</div>
                <div class="text-white/80 text-sm mb-0">Total SDM</div>
                <div class="text-white font-bold text-2xl mb-4">1</div>

                <div class="dept-btn mb-6 w-full text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    OBC COLLECTION
                </div>

                <div class="relative w-full flex justify-center mb-6">
                    <div id="sdmDonut3" class="w-full max-w-[250px]"></div>
                </div>

                <div class="w-full max-w-[200px]">
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#1e3a8a]"></span> Agent</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#3b82f6]"></span> TL</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#fde68a]"></span> Support</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#d97706]"></span> SPV</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#f59e0b]"></span> OM</div><div class="stat-value">2</div></div>
                </div>
            </div>

            <!-- Column 4: Grapari -->
            <div class="flex flex-col items-center">
                <div class="text-white/80 text-sm mb-0">Total Seat</div>
                <div class="text-white font-bold text-2xl mb-2">738</div>
                <div class="text-white/80 text-sm mb-0">Total SDM</div>
                <div class="text-white font-bold text-2xl mb-4">1</div>

                <div class="dept-btn mb-6 w-full text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/></svg>
                    GRAPARI WALKIN
                </div>

                <div class="relative w-full flex justify-center mb-6">
                    <div id="sdmDonut4" class="w-full max-w-[250px]"></div>
                </div>

                <div class="w-full max-w-[200px]">
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#1e3a8a]"></span> Agent</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#3b82f6]"></span> TL</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#fde68a]"></span> Support</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#d97706]"></span> SPV</div><div class="stat-value">2</div></div>
                    <div class="stat-row"><div class="stat-label"><span class="stat-dot bg-[#f59e0b]"></span> OM</div><div class="stat-value">2</div></div>
                </div>
            </div>

        </div>
        
        <!-- Bottom Trim styling requested -->
        <div class="mt-8 border-t-2 border-white/40 pt-2 w-full mx-auto"></div>
    </main>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            function createDonut(elementId, color) {
                var options = {
                    series: [100],
                    chart: { type: 'pie', height: 260, fontFamily: 'Mont, sans-serif' },
                    colors: [color],
                    plotOptions: {
                        pie: {
                            expandOnClick: false,
                            donut: { size: '0%' },
                            dataLabels: {
                                offset: 0,
                                minAngleToShowLabel: 10
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val) { return val + "%" },
                        style: { fontSize: '18px', fontFamily: 'Mont, sans-serif', fontWeight: 'bold' },
                        dropShadow: { enabled: false }
                    },
                    stroke: { show: true, colors: ['#E31E24'], width: 6 },
                    legend: { show: false },
                    tooltip: { enabled: false }
                };

                new ApexCharts(document.querySelector("#" + elementId), options).render();
            }

            // Using vibrant light blue representing the 100% chart shown in the image
            createDonut('sdmDonut1', '#2ca0fc');
            createDonut('sdmDonut2', '#2ca0fc');
            createDonut('sdmDonut3', '#2ca0fc');
            createDonut('sdmDonut4', '#2ca0fc');
        });
    </script>
</body>
</html>
