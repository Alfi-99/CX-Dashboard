<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPP Dashboard</title>
    <link rel="preconnect" href="https://fonts.fonts.googleapis.com/disable">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.fonts.googleapis.com/disable/css2?family=Poppins:wght@400;500;600;700;800&family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        .page-bg {
            background-color: #f7f7f7;
            background-image: url('{{ asset('assets/landing/Landing Page.svg') }}');
            background-size: cover;
            background-position: center;
        }
        .header-box {
            background: linear-gradient(135deg, rgba(227,30,36,0.95), rgba(77,10,12,0.95));
            border-radius: 6px;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        .bapp-table th, .bapp-table td { font-size: 11px; padding: 6px 8px; }
        .bapp-table th { color: #6b7280; font-weight: 500; text-transform: uppercase; border-bottom: 1px solid #e5e7eb; }
        .bapp-table tbody tr { border-bottom: 1px solid #f3f4f6; }
        .bapp-table tbody tr:last-child { border-bottom: none; }
        
        .title-tab {
            background: #9c171e; /* Maroonish red */
            color: white;
            font-weight: 700;
            padding: 4px 12px;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
            display: inline-block;
            font-size: 14px;
        }
        .card-donuts .title-tab {
            background: #E31E24;
            border-radius: 20px;
            padding: 6px 20px;
            position: absolute;
            top: -15px;
            left: 20px;
            font-size: 12px;
        }
        /* ApexChart fixes */
        .apexcharts-legend-text { color: #4B5563 !important; font-family: 'Poppins', sans-serif !important; font-size: 10px !important; }
        .apexcharts-tooltip { color: #000; }
    </style>
</head>
<body class="font-mont page-bg min-h-screen text-gray-800">

    <!-- Header Overlay & Nav -->
    <header class="flex justify-between items-start pt-6 px-6 relative z-10 w-full mb-8">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <div class="bg-power-red text-white font-rosca text-2xl w-14 h-14 flex justify-center items-center shadow-md rounded-tl-xl rounded-tr-xl rounded-bl-xl rounded-br">R</div>
        </div>
        
        <!-- 5 Stats Boxes -->
        <div class="flex flex-wrap gap-4 items-stretch flex-1 px-4 lg:px-8 justify-center">
            <!-- Box 1 Revenue -->
            <div class="header-box px-6 py-2 flex flex-col justify-center items-center relative min-w-[200px]">
                <div class="absolute inset-0 opacity-20" style="background: radial-gradient(circle, transparent 20%, #000 120%); border-radius:inherit"></div>
                <div class="text-2xl font-bold font-rosca drop-shadow relative z-10">Rp704.77bn</div>
                <div class="text-[11px] font-medium tracking-wide mt-1 relative z-10">Revenue 2025</div>
            </div>
            <!-- Box 2 BAPP Done -->
            <div class="header-box px-6 py-2 flex flex-col justify-center items-center relative min-w-[150px]">
                <div class="absolute top-1 right-2 text-[10px] font-bold">80%</div>
                <div class="text-2xl font-bold font-rosca drop-shadow relative z-10">Rp562.29bn</div>
                <div class="text-[11px] font-medium tracking-wide mt-1 relative z-10">BAPP Done</div>
            </div>
            <!-- Box 3 BAPP Process -->
            <div class="header-box px-6 py-2 flex flex-col justify-center items-center relative min-w-[150px]">
                <div class="absolute top-1 right-2 text-[10px] font-bold">15%</div>
                <div class="text-2xl font-bold font-rosca drop-shadow relative z-10">Rp102.48bn</div>
                <div class="text-[11px] font-medium tracking-wide mt-1 relative z-10">BAPP Process</div>
            </div>
            <!-- Box 4 BAPP Not Process -->
            <div class="header-box px-6 py-2 flex flex-col justify-center items-center relative min-w-[150px]">
                <div class="absolute top-1 right-2 text-[10px] font-bold">6%</div>
                <div class="text-2xl font-bold font-rosca drop-shadow relative z-10">Rp40bn</div>
                <div class="text-[11px] font-medium tracking-wide mt-1 relative z-10">BAPP Not Process</div>
            </div>
            <!-- Box 5 BAPP Done & Paid -->
            <div class="header-box px-6 py-2 flex flex-col justify-center items-center relative min-w-[150px]">
                <div class="absolute top-1 right-2 text-[10px] font-bold">51%</div>
                <div class="text-2xl font-bold font-rosca drop-shadow relative z-10">Rp430.39bn</div>
                <div class="text-[11px] font-medium tracking-wide mt-1 relative z-10">BAPP Done & Paid</div>
            </div>
        </div>

        <!-- Home/Back -->
        <div class="flex gap-2">
            <a href="/" class="w-8 h-8 rounded-full bg-[#1e293b] text-white flex justify-center items-center hover:scale-105 transition-transform shadow">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M3 11l9-8 9 8" /><path d="M6 9v11a1 1 0 001 1h10a1 1 0 001-1V9" /><path d="M10 21v-4a2 2 0 014 0v4" /></svg>
            </a>
            <a href="/" class="w-8 h-8 rounded-full bg-transparent border-2 border-[#1e293b] text-[#1e293b] flex justify-center items-center hover:scale-105 transition-transform">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
        </div>
    </header>

    <main class="px-6 flex flex-col gap-6">

        <!-- Top Section: Chart & Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_1fr] gap-8 bg-white/70 backdrop-blur rounded-[20px] p-6 shadow-sm">
            
            <!-- Left: Stacked Bar Chart -->
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-[#781734] text-white text-xs font-bold px-2 py-0.5 rounded">BAPP/BAST</span>
                </div>
                <div id="bappBarChart" class="w-full h-[280px]"></div>
            </div>

            <!-- Right: Tables -->
            <div class="flex flex-col gap-4 lg:border-l lg:border-gray-200 lg:pl-6">
                <!-- Table 1 -->
                <div>
                    <div class="title-tab">TOP BAPP Process</div>
                    <div class="bg-white border rounded-b-md shadow-sm overflow-hidden h-[120px] overflow-y-auto">
                        <table class="w-full text-left bapp-table">
                            <thead>
                                <tr><th>KATEGORI AGING</th><th>DEPT</th><th>Layanan</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>A. <=3 Bulan</td><td>DEPT. DIGITAL CHANNEL & B2B SOLUTION</td><td>CES B2B -</td></tr>
                                <tr><td>A. <=3 Bulan</td><td>DEPT. DIGITAL CHANNEL & B2B SOLUTION</td><td>CES B2B -</td></tr>
                                <tr><td>A. <=3 Bulan</td><td>DEPT. DIGITAL CHANNEL & B2B SOLUTION</td><td>CES B2B -</td></tr>
                                <tr><td>A. <=3 Bulan</td><td>DEPT. DIGITAL CHANNEL & B2B SOLUTION</td><td>CES B2B -</td></tr>
                            </tbody>
                        </table>
                        <div class="px-2 py-1 bg-gray-100 font-bold text-[11px]">Total</div>
                    </div>
                </div>

                <!-- Table 2 -->
                <div class="mt-2">
                    <div class="title-tab">TOP BAPP Not Process</div>
                    <div class="bg-white border rounded-b-md shadow-sm overflow-hidden h-[120px] overflow-y-auto">
                        <table class="w-full text-left bapp-table">
                            <thead>
                                <tr><th>KATEGORI AGING</th><th>DEPT</th><th>Layanan</th><th class="text-right">Nominal</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>A. <=3 Bulan</td><td>DEPT. IBC OPERATION</td><td>INB OU ND</td><td class="text-right">Rp28,768,538,160</td></tr>
                                <tr><td>A. <=3 Bulan</td><td>DEPT. IBC OPERATION</td><td>INB OU ND</td><td class="text-right">Rp10,500,000,000</td></tr>
                            </tbody>
                        </table>
                        <div class="px-2 py-1 bg-gray-100 font-bold text-[11px] flex justify-between">
                            <span>Total</span>
                            <span>Rp704,773,132,291</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section: 4 Donuts -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-4 pb-12">
            <!-- Card 1 -->
            <div class="bg-white/80 backdrop-blur rounded-[16px] p-6 pt-10 shadow-sm relative card-donuts">
                <div class="title-tab">Digital Channel B2B</div>
                <div id="donutB2B" class="h-[180px]"></div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white/80 backdrop-blur rounded-[16px] p-6 pt-10 shadow-sm relative card-donuts">
                <div class="title-tab">IBC Operation</div>
                <div id="donutIBC" class="h-[180px]"></div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white/80 backdrop-blur rounded-[16px] p-6 pt-10 shadow-sm relative card-donuts">
                <div class="title-tab">OBC Collection</div>
                <div id="donutOBC" class="h-[180px]"></div>
            </div>
            <!-- Card 4 -->
            <div class="bg-white/80 backdrop-blur rounded-[16px] p-6 pt-10 shadow-sm relative card-donuts">
                <div class="title-tab">Grapari Walk In</div>
                <div id="donutGWI" class="h-[180px]"></div>
            </div>
        </div>
    </main>

    <!-- ApexCharts Initialization -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Stacked Bar Chart
            var barOptions = {
                series: [{
                    name: 'BAPP Done',
                    data: [60, 55, 53, 54, 48, 49, 62, 57, 51, 38, 5, 4]
                }, {
                    name: 'BAPP Not Process',
                    data: [1, 0, 0, 0, 1, 1, 0, 2, 2, 8, 8, 5]
                }, {
                    name: 'BAPP Process',
                    data: [0, 0, 0, 0, 0, 0, 0, 1, 1, 12, 45, 49]
                }],
                chart: {
                    type: 'bar',
                    height: 280,
                    stacked: true,
                    toolbar: { show: false },
                    fontFamily: 'Mont, sans-serif'
                },
                colors: ['#2ca0fc', '#e37d34', '#172b9a'], // Light blue, Orange, Navy
                plotOptions: {
                    bar: { horizontal: false, borderRadius: 2, columnWidth: '75%' },
                },
                xaxis: {
                    categories: ['1 January Qtr 1', '1 February', '1 March', '1 April', '1 May Qtr 2', '1 June', '1 July', '1 August Qtr 3', '1 September', '1 October', '1 November Qtr 4', '1 December'],
                    labels: { style: { fontSize: '9px', colors: '#6b7280' } }
                },
                yaxis: {
                    labels: {
                        formatter: function (val) { return "Rp" + val + "bn" },
                        style: { fontSize: '10px', colors: '#6b7280' }
                    }
                },
                legend: { position: 'top', horizontalAlign: 'left', markers: { radius: 12 }, fontSize: '11px' },
                fill: { opacity: 1 },
                dataLabels: { enabled: false },
                grid: { borderColor: '#f3f4f6', strokeDashArray: 4, position: 'back', yaxis: { lines: { show: true } }, xaxis: { lines: { show: true } } }
            };

            var barChart = new ApexCharts(document.querySelector("#bappBarChart"), barOptions);
            barChart.render();

            // Setup Donut Options Factory
            function createDonut(elementId, seriesData) {
                var options = {
                    series: seriesData,
                    chart: { type: 'donut', height: 180, fontFamily: 'Mont, sans-serif' },
                    labels: ['BAPP Done', 'BAPP Not Process', 'BAPP Process'],
                    colors: ['#2ca0fc', '#e37d34', '#172b9a'],
                    plotOptions: {
                        pie: { donut: { size: '0%', /* Make it a solid pie chart visually but labeled conventionally as donut to allow center text if needed in future, wait, design shows pie charts! */ } },
                    },
                    dataLabels: { enabled: false },
                    legend: { show: false }, // Hiding legend to match design (legend is implicit or shared)
                    stroke: { show: false } // No white border
                };
                // Make it a pie chart according to the image
                options.chart.type = 'pie'; 

                var chart = new ApexCharts(document.querySelector("#" + elementId), options);
                chart.render();
            }

            // Render 4 Pies
            createDonut("donutB2B", [79, 14, 7]);
            createDonut("donutIBC", [79, 10, 11]);
            createDonut("donutOBC", [79, 15, 6]);
            createDonut("donutGWI", [79, 8, 13]);
        });
    </script>
</body>
</html>
