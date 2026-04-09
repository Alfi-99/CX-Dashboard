<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Dashboard</title>
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
        .header-bg {
            background: #9c171e;
            color: white;
            font-weight: 700;
            padding: 4px 16px;
            border-radius: 6px;
            display: inline-block;
            font-size: 14px;
        }
        .stat-card {
            background: linear-gradient(90deg, rgba(227,30,36,0.9), rgba(100,10,35,0.9));
            border-radius: 8px;
            color: white;
            padding: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        .stat-card h3 { font-size: 20px; font-weight: 700; }
        .stat-card .value { font-size: 36px; font-weight: 800; }
        
        .fin-table th, .fin-table td { font-size: 12px; padding: 8px 10px; border-bottom: 1px solid #e5e7eb; }
        .fin-table th { background: transparent; font-weight: 700; color: #111; }
        .fin-table tbody tr td { font-weight: 600; color: #374151; }
        
        .apexcharts-legend-text { color: #4B5563 !important; font-family: 'Poppins', sans-serif !important; font-size: 11px !important; }
        .composition-bar {
            height: 60px;
            width: 100%;
            display: flex;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }
        .legend-dot { width: 10px; height: 10px; border-radius: 50%; display: inline-block; margin-right: 4px; }
    </style>
</head>
<body class="font-mont page-bg min-h-screen text-gray-800">

    <!-- Header Navigation -->
    <header class="flex justify-between items-start pt-6 px-8 relative z-10 w-full mb-4">
        <!-- Filters -->
        <div class="flex flex-wrap gap-4 items-center">
            <div class="flex flex-col shadow-md rounded-md">
                <div class="bg-[#9c171e] text-white font-bold text-center py-1.5 px-4 rounded-t-md text-[13px] tracking-wide">Periode</div>
                <select class="border-x border-b border-gray-300 rounded-b-md text-sm px-3 py-2 w-48 outline-none bg-white font-medium text-gray-700">
                    <option>All</option>
                </select>
            </div>
            <div class="flex flex-col shadow-md rounded-md">
                <div class="bg-[#9c171e] text-white font-bold text-center py-1.5 px-4 rounded-t-md text-[13px] tracking-wide">Departement</div>
                <select class="border-x border-b border-gray-300 rounded-b-md text-sm px-3 py-2 w-64 outline-none bg-white font-medium text-gray-700">
                    <option>Digital Channel & B2B Operation</option>
                </select>
            </div>
        </div>
        
        <!-- Home/Back -->
        <div class="flex gap-2">
            <a href="/" class="w-10 h-10 rounded-full bg-[#1e293b] text-white flex justify-center items-center hover:scale-105 transition-transform shadow">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M3 11l9-8 9 8" /><path d="M6 9v11a1 1 0 001 1h10a1 1 0 001-1V9" /><path d="M10 21v-4a2 2 0 014 0v4" /></svg>
            </a>
            <a href="/" class="w-10 h-10 rounded-full bg-transparent border-2 border-[#1e293b] text-[#1e293b] flex justify-center items-center hover:scale-105 transition-transform">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
        </div>
    </header>

    <main class="px-4 lg:px-8 flex flex-col xl:flex-row gap-6 pb-12">

        <!-- Left Column: Stats & Table -->
        <div class="flex flex-col gap-4 w-full xl:w-1/3 min-w-0 md:min-w-[350px]">
            <!-- Cards -->
            <div class="stat-card">
                <h3>Revenue</h3>
                <div class="value relative z-10 text-white drop-shadow-md">36.55T</div>
            </div>
            <div class="stat-card">
                <h3>Cost</h3>
                <div class="value relative z-10 text-white drop-shadow-md">23.88T</div>
            </div>
            <div class="stat-card" style="background: linear-gradient(90deg, rgba(230,50,60,0.95), rgba(120,20,50,0.95));">
                <h3>GPM</h3>
                <div class="value relative z-10 text-white drop-shadow-md">34.66%</div>
            </div>

            <!-- Table -->
            <div class="bg-white/80 backdrop-blur rounded shadow-sm mt-4 overflow-hidden border border-gray-100">
                <table class="w-full text-left fin-table">
                    <thead>
                        <tr class="border-t-4 border-[#9c171e]">
                            <th>Dept</th>
                            <th>Revenue</th>
                            <th>GPM % <span class="text-[9px]">▼</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="flex items-center gap-1"><span class="border border-gray-300 w-3 h-3 flex items-center justify-center text-[8px]">+</span> Digital Channel & B2B<br>Operation</td>
                            <td>36.55T</td>
                            <td>34.66%</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50 border-t-2 border-gray-200">
                            <td class="font-bold py-3 px-2">Total</td>
                            <td class="font-bold py-3 px-2">36.55T</td>
                            <td class="font-bold py-3 px-2">34.66%</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Right Column: Charts -->
        <div class="flex flex-col gap-6 w-full xl:flex-1">
            
            <!-- Mixed Chart -->
            <div class="bg-white/90 backdrop-blur rounded-xl p-4 shadow-sm border border-gray-100 relative">
                <div class="header-bg absolute -top-3 left-4">Revenue, Cost dan GPM</div>
                <div class="pt-6" id="mixedChart"></div>
            </div>

            <!-- Composition Box -->
            <div class="bg-white/90 backdrop-blur rounded-xl p-6 shadow-sm border border-gray-100 relative mt-2">
                <div class="header-bg absolute -top-3 left-4">komposisi Cost</div>
                
                <!-- Legends -->
                <div class="flex flex-wrap gap-4 text-xs font-semibold text-gray-600 mb-6 mt-2">
                    <div class="flex items-center"><span class="legend-dot bg-blue-400"></span> Jarkom</div>
                    <div class="flex items-center"><span class="legend-dot bg-blue-900"></span> Depresiasi</div>
                    <div class="flex items-center"><span class="legend-dot bg-gray-300"></span> Jasnaker</div>
                    <div class="flex items-center"><span class="legend-dot bg-purple-500"></span> Kerjasa Sama Vendor</div>
                    <div class="flex items-center"><span class="legend-dot bg-pink-500"></span> Mandatory Gedung</div>
                    <div class="flex items-center"><span class="legend-dot bg-indigo-500"></span> Lain-Lain</div>
                    <div class="flex items-center"><span class="legend-dot bg-yellow-400"></span> Marketing</div>
                </div>

                <!-- Custom Bar -->
                <div class="px-8">
                    <div class="composition-bar bg-white">
                        <div class="bg-blue-400 h-full w-[1%] border-r border-white"></div>
                        <div class="bg-blue-900 h-full w-[2%] border-r border-white"></div>
                        <!-- Major chunk 1 -->
                        <div class="bg-[#ed7536] h-full w-[79.53%] flex items-center justify-center border-r-2 border-purple-800 text-white font-bold text-xs" style="background-color: #e96b35;">
                            79.53%
                        </div>
                        <!-- Minor chunks space -->
                        <div class="bg-purple-800 h-full w-[1%]"></div>
                        <!-- Major chunk 2 -->
                        <div class="bg-[#db3eac] h-full w-[15.75%] flex items-center justify-center text-white font-bold text-xs" style="background-color: #d130a2;">
                            15.75%
                        </div>
                        <div class="bg-gray-200 h-full w-[0.72%]"></div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </main>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            var options = {
                series: [{
                    name: 'Revenue Realisasi',
                    type: 'column',
                    data: [1.3, 1.4, 1.45, 1.6, 1.45, 1.5, 1.55, 1.6, 1.55, 1.65, 1.65, 1.55, 1.65, 1.55, 1.6, 1.6, 1.7, 1.7, 1.65]
                }, {
                    name: 'Direct Cost',
                    type: 'column',
                    data: [1.3, 1.0, 1.05, 1.05, 0.45, 1.0, 0.8, 1.1, 1.05, 0.85, 0.85, 1.25, 1.15, 1.1, 1.05, 1.25, 0.95, 0.65, 1.05, 1.2]
                }, {
                    name: 'GPM %',
                    type: 'line',
                    data: [5, 40, 35, 32, 85, 50, 40, 58, 30, 45, 38, 48, 35, 30, 32, 40, 42, 20, 75, 52, 35]
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                    fontFamily: 'Mont, sans-serif',
                    toolbar: { show: false }
                },
                stroke: {
                    width: [0, 0, 3], // Columns have no stroke, line has width 3
                    curve: 'smooth'
                },
                colors: ['#28a745', '#1e3a8a', '#e65c00'], // Green, Navy Blue, Orange
                plotOptions: {
                    bar: {
                        columnWidth: '60%',
                        borderRadius: 2
                    }
                },
                xaxis: {
                    categories: ['Jan 2024', '', '', 'Apr 2024', '', '', 'Jul 2024', '', '', 'Oct 2024', '', '', 'Jan 2025', '', '', 'Apr 2025', '', '', 'Jul 2025', '', '', 'Oct 2025'],
                    labels: { style: { colors: '#6b7280', fontSize: '10px' } }
                },
                yaxis: [
                    {
                        seriesName: 'Revenue Realisasi',
                        labels: {
                            formatter: function (val) { return val.toFixed(1) + "T" },
                            style: { colors: '#6b7280', fontSize: '10px' }
                        }
                    },
                    {
                        seriesName: 'Direct Cost',
                        show: false
                    },
                    {
                        seriesName: 'GPM %',
                        opposite: true,
                        labels: {
                            formatter: function (val) { return val + "%" },
                            style: { colors: '#6b7280', fontSize: '10px' }
                        }
                    }
                ],
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    markers: { radius: 12 },
                    offsetY: -10
                },
                markers: {
                    size: [0, 0, 4], // Only show markers for the line chart
                    colors: ['#e65c00'],
                    strokeColors: '#fff',
                    strokeWidth: 2,
                    hover: { size: 6 }
                },
                grid: {
                    borderColor: '#f3f4f6',
                    strokeDashArray: 4,
                    xaxis: { lines: { show: true } },
                    yaxis: { lines: { show: true } }
                }
            };

            var chart = new ApexCharts(document.querySelector("#mixedChart"), options);
            chart.render();
        });
    </script>
</body>
</html>
