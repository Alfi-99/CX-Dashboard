<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.11.0/proj4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/highcharts@11.4.0/highmaps.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@highcharts/map-collection@2.1.0/countries/id/id-all.js"></script>
    <style>
        .page-bg {
            background-color: #f7f7f7;
            background-image: radial-gradient(rgba(0, 0, 0, 0.05) 2px, transparent 2px);
            background-size: 20px 20px;
        }
        .red-gradient {
            background: linear-gradient(90deg, #D62027 0%, #4D0E2B 100%);
            border-radius: 10px;
        }
        .red-border-box {
            border: 2px solid #E31E24;
            background-color: #ffffff;
            border-radius: 12px;
            position: relative;
        }
        .red-border-box::after {
            content: "";
            position: absolute;
            bottom: -5px;
            right: -5px;
            width: 25px;
            height: 25px;
            background: #E31E24;
            clip-path: polygon(100% 0, 0% 100%, 100% 100%);
            border-bottom-right-radius: 8px;
        }
        
        .td-header {
            color: #E31E24;
            font-weight: 700;
            padding: 10px;
            border-bottom: 2px solid #f3f4f6;
            text-align: center;
        }
        
        .td-cell {
            padding: 8px 10px;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
        }

        .map-placeholder {
            /* Placeholder for Indonesia Map */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 50"><ellipse cx="20" cy="25" rx="10" ry="5" fill="%23e5e7eb"/><ellipse cx="40" cy="20" rx="15" ry="8" fill="%23e5e7eb"/><ellipse cx="60" cy="30" rx="12" ry="6" fill="%23e5e7eb"/><ellipse cx="80" cy="15" rx="18" ry="10" fill="%23e5e7eb"/><ellipse cx="90" cy="35" rx="8" ry="4" fill="%23e5e7eb"/></svg>');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .map-pin {
            position: absolute;
            width: 20px;
            height: 20px;
            background: #E31E24;
            border: 3px solid white;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        }
        .map-pin::after {
            content: "";
            width: 6px;
            height: 6px;
            background: white;
            position: absolute;
            border-radius: 50%;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }
        
        /* Custom Mac-style Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.02);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(0,0,0,0.15);
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(0,0,0,0.25);
        }
        
        /* Interactive Buttons Style */
        .filter-btn { cursor: pointer; transition: all 0.2s ease; }
        .filter-btn:hover { border-color: #E31E24; }
        .filter-btn.active {
            background-color: #E31E24;
            color: #ffffff !important;
            border-color: #E31E24;
            transform: scale(1.05);
        }
        .apexcharts-legend-text { font-family: 'Mont', sans-serif !important; font-size: 11px !important; color: #4B5563 !important; }
    </style>
</head>
<body class="font-mont page-bg min-h-screen text-gray-800">

    <!-- Top Header -->
    <header class="flex justify-between items-center p-4">
        <!-- Main Logo -->
        <div class="flex items-center gap-2 mr-4">
            <div class="bg-power-red text-white font-rosca text-2xl w-10 h-10 flex justify-center items-center rounded-tl-lg rounded-tr-lg rounded-bl-lg rounded-br" style="font-family: 'Rosca', sans-serif;">
                R
            </div>
        </div>

        <!-- Filters Grid -->
        <div class="flex gap-3 flex-wrap flex-1 justify-start" id="filter-container">
            <div data-id="digital" class="filter-btn bg-white border rounded-lg px-3 py-1.5 flex items-center shadow-sm text-[10px] font-bold text-power-red whitespace-nowrap active">
                DIGITAL CHANNEL B2B
            </div>
            <div data-id="ibc" class="filter-btn bg-white border rounded-lg px-3 py-1.5 flex items-center shadow-sm text-[10px] font-bold text-blue-900 whitespace-nowrap">
                IBC OPERATION
            </div>
            <div data-id="obc" class="filter-btn bg-white border rounded-lg px-3 py-1.5 flex items-center shadow-sm text-[10px] font-bold text-blue-900 whitespace-nowrap">
                OBC COLLECTION
            </div>
            <div data-id="walkin" class="filter-btn bg-white border rounded-lg px-3 py-1.5 flex items-center shadow-sm text-[10px] font-bold text-blue-900 whitespace-nowrap">
                GRAPARI WALKIN
            </div>
        </div>

        <!-- Date & Exit -->
        <div class="flex items-center gap-4">
            <!-- Actual Date Inputs -->
            <div class="border border-power-red rounded-full px-4 py-1.5 bg-white text-xs font-semibold flex items-center gap-2 shadow-sm text-blue-900 font-mont">
                <input type="date" value="2026-01-01" class="outline-none bg-transparent cursor-pointer text-blue-900" style="color-scheme: light;">
                <span class="text-gray-400 mx-1">-</span>
                <input type="date" value="2026-03-01" class="outline-none bg-transparent cursor-pointer text-blue-900" style="color-scheme: light;">
            </div>
            <div class="flex gap-2">
                <a href="/" class="w-8 h-8 rounded-full bg-blue-900 text-white flex justify-center items-center hover:scale-105 transition-transform shadow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M3 11l9-8 9 8" /><path d="M6 9v11a1 1 0 001 1h10a1 1 0 001-1V9" /><path d="M10 21v-4a2 2 0 014 0v4" /></svg>
                </a>
                <a href="/" class="w-8 h-8 rounded-full border-2 border-blue-900 text-blue-900 flex justify-center items-center hover:scale-105 transition-transform shadow">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                </a>
            </div>
        </div>
    </header>

    <main class="px-4 lg:px-6 pb-10">
        
        <!-- KPIs Row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mt-4">
            <!-- Seat -->
            <div class="flex flex-col">
                <span class="text-power-red font-bold text-[14px] mb-1 font-mont">Total Seat</span>
                <div class="red-gradient w-full py-4 px-6 text-white flex justify-between items-center shadow-md relative overflow-hidden">
                    <span id="kpi-seat" class="text-3xl font-extrabold relative z-10">(Blank)</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-16 h-16 absolute -right-2 opacity-50"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
            </div>
            <!-- Traffik -->
            <div class="flex flex-col">
                <span class="text-power-red font-bold text-[14px] mb-1 font-mont">Total Traffik</span>
                <div class="red-gradient w-full py-4 px-6 text-white flex justify-between items-center shadow-md relative overflow-hidden">
                    <span id="kpi-traffik" class="text-3xl font-extrabold relative z-10">50K</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-16 h-16 absolute -right-2 opacity-50"><path d="M3 3v18h18"/><path d="M7 14l4-4 4 4 6-6"/></svg>
                </div>
            </div>
            <!-- Channel -->
            <div class="flex flex-col">
                <span class="text-power-red font-bold text-[14px] mb-1 font-mont">Total Channel</span>
                <div class="red-gradient w-full py-4 px-6 text-white flex justify-between items-center shadow-md relative overflow-hidden">
                    <span id="kpi-channel" class="text-3xl font-extrabold relative z-10">7</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-16 h-16 absolute -right-2 opacity-50"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                </div>
            </div>
            <!-- SDM -->
            <div class="flex flex-col">
                <span class="text-power-red font-bold text-[14px] mb-1 font-mont">Total SDM</span>
                <div class="red-gradient w-full py-4 px-6 text-white flex justify-between items-center shadow-md relative overflow-hidden">
                    <span id="kpi-sdm" class="text-3xl font-extrabold relative z-10">120</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-16 h-16 absolute -right-2 opacity-50"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
            </div>
        </div>

        <!-- Middle Section -->
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_2.5fr] gap-6 mt-12">
            <!-- Left Chart -->
            <div class="relative mt-4">
                <h3 class="text-power-red font-bold text-lg absolute -top-10 left-0">Distribution Channel</h3>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 h-full flex flex-col items-center justify-center relative">
                    <span class="text-sm font-semibold mb-2 text-gray-700 absolute top-2 left-4">Sum of Traffik by Channel</span>
                    <div id="perfDonutChart" class="w-full min-h-[220px] mt-6"></div>
                </div>
            </div>

            <!-- Right Data Table -->
            <div class="red-border-box p-4 pt-10">
                <div class="absolute -top-[16px] left-4 lg:left-6 flex flex-col shadow-md rounded-md">
                    <div class="bg-[#9c171e] text-white text-xs font-bold px-3 py-1 rounded-t-md text-center">Departmen</div>
                    <select class="border-x border-b border-gray-300 rounded-b-md text-xs px-2 py-1.5 w-40 outline-none bg-white font-medium text-gray-700">
                        <option>All</option>
                    </select>
                </div>

                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full min-w-[700px]">
                    <thead>
                        <tr>
                            <td class="bg-power-red text-white font-bold py-2 px-4 text-center rounded-tl-[10px] border-b-2 border-f3f4f6 text-[13px] uppercase">Channel</td>
                            <td class="bg-power-red text-white font-bold py-2 px-4 text-center border-b-2 border-f3f4f6 text-[13px] uppercase">Seat</td>
                            <td class="bg-power-red text-white font-bold py-2 px-4 text-center border-b-2 border-f3f4f6 text-[13px] uppercase">Traffik</td>
                            <td class="bg-power-red text-white font-bold py-2 px-4 text-center border-b-2 border-f3f4f6 text-[13px] uppercase">SL</td>
                            <td class="bg-power-red text-white font-bold py-2 px-4 text-center border-b-2 border-f3f4f6 text-[13px] uppercase">SCR</td>
                            <td class="bg-power-red text-white font-bold py-2 px-4 text-center rounded-tr-[10px] border-b-2 border-f3f4f6 text-[13px] uppercase">AHT</td>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <!-- Data will be updated by script -->
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bottom Geo Section -->
        <div class="red-border-box mt-10 p-4 lg:p-6 pt-12 relative" style="min-height: 350px;">
            <!-- Red Pill Header -->
            <div class="absolute -top-[20px] left-1/2 -translate-x-1/2 text-white font-bold text-base lg:text-lg px-10 lg:px-20 py-2 rounded-full shadow-lg border-4 border-white whitespace-nowrap z-20" style="background-color: #4D0E2B;">
                Walkin - Grapari
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_2fr_1fr] w-full gap-6">
                <!-- Left Table -->
                <div class="flex flex-col h-full pl-2">
                    <div class="overflow-hidden mb-2">
                        <!-- Custom Capsule Header Table -->
                        <table class="w-full text-left border-separate" style="border-spacing: 0;">
                            <thead>
                                <tr>
                                    <th class="bg-power-red text-white py-1.5 px-3 rounded-l-full text-[13px] font-bold">Lokasi</th>
                                    <th class="bg-power-red text-white py-1.5 px-3 text-[13px] font-bold">Seat</th>
                                    <th class="bg-power-red text-white py-1.5 px-3 rounded-r-full text-[13px] font-bold">Traffik</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- Data Header -->
                    <table class="w-full text-left text-xs mb-1">
                        <thead>
                            <tr class="text-blue-900 border-b-2 border-blue-900">
                                <th class="font-medium pb-1 px-3">Layanan</th>
                                <th class="font-medium pb-1 px-3">Total Seat<br><span class="text-[8px]">▼</span></th>
                                <th class="font-medium pb-1 px-3">Visitor Valid</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- Slick Scroller Body -->
                    <div class="overflow-y-auto custom-scrollbar pr-2" style="max-height: 180px;">
                        <table class="w-full text-xs text-left">
                            <tbody class="text-gray-800 font-semibold" id="table-grapari-full">
                                <!-- Data mapped by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Center Map Component -->
                <div class="flex justify-center items-center w-full relative mt-4 overflow-hidden" style="min-height: 250px;">
                    <div id="indonesia-map" class="w-full h-[200px] sm:h-[280px]"></div>
                </div>

                <!-- Right Tables -->
                <div class="flex flex-col gap-6 pr-2">
                    <!-- Top 5 -->
                    <div>
                        <h4 class="text-power-red font-bold text-[14px] mb-1 text-center font-mont">Top 5 Grapari</h4>
                        <table class="w-full text-xs text-left mb-1">
                            <thead><tr class="text-blue-900 border-b border-blue-900"><th class="font-medium pb-1">Layanan</th><th class="text-right font-medium pb-1">Visitor Valid <span class="text-[8px]">▼</span></th></tr></thead>
                        </table>
                        <div class="overflow-y-auto custom-scrollbar" style="max-height: 70px;">
                            <table class="w-full text-xs text-left"><tbody class="text-gray-800 font-semibold" id="table-top-5"></tbody></table>
                        </div>
                    </div>
                    <!-- Bottom 5 -->
                    <div>
                        <h4 class="text-power-red font-bold text-[14px] mb-1 text-center font-mont">Bottom 5 Grapari</h4>
                        <table class="w-full text-xs text-left mb-1">
                            <thead><tr class="text-blue-900 border-b border-blue-900"><th class="font-medium pb-1">Layanan</th><th class="text-right font-medium pb-1">Visitor Valid <span class="text-[8px]">▼</span></th></tr></thead>
                        </table>
                        <div class="overflow-y-auto custom-scrollbar" style="max-height: 70px;">
                            <table class="w-full text-xs text-left"><tbody class="text-gray-800 font-semibold" id="table-bot-5"></tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data Mockup Source depending on filter clicked
            const mockData = {
                digital: {
                    kpi: { seat: '120', traffik: '50K', channel: '7', sdm: '45' },
                    chart: [2700, 2640, 1000, 8500, 15000],
                    tableRows: [
                        { name: 'Inbound', traffik: '2700', sl: '27.00', scr: '27.00', aht: '8100' },
                        { name: 'Outbound', traffik: '2640', sl: '-', scr: '16.50', aht: '-' },
                        { name: 'Chatbot', traffik: '1000', sl: '-', scr: '-', aht: '-' },
                        { name: 'Ecare', traffik: '8500', sl: '85.00', scr: '-', aht: '26K' },
                        { name: 'WhatsApp', traffik: '15K', sl: '-', scr: '14K', aht: '-' }
                    ]
                },
                ibc: {
                    kpi: { seat: '85', traffik: '25K', channel: '4', sdm: '12' },
                    chart: [5000, 1000, 2000, 5000, 12000],
                    tableRows: [
                        { name: 'Inbound', traffik: '5000', sl: '12.00', scr: '35.00', aht: '6000' },
                        { name: 'Email Support', traffik: '1000', sl: '99', scr: '12', aht: '-' },
                        { name: 'Chatbot', traffik: '2000', sl: '-', scr: '-', aht: '-' }
                    ]
                },
                obc: {
                    kpi: { seat: '90', traffik: '30K', channel: '3', sdm: '20' },
                    chart: [15000, 10000, 5000],
                    tableRows: [
                        { name: 'Outbound', traffik: '15K', sl: '-', scr: '25.00', aht: '9000' },
                        { name: 'Telemarketing', traffik: '10K', sl: '80.00', scr: '15.00', aht: '20K' }
                    ]
                },
                walkin: {
                    kpi: { seat: '350', traffik: '150K', channel: '1', sdm: '300' },
                    chart: [150000],
                    tableRows: [
                        { name: 'Walk-In Customer', traffik: '150K', sl: '95.00', scr: '90.00', aht: '4500' }
                    ]
                }
            };

            // Setup ApexCharts Donut
            var options = {
                series: mockData.digital.chart,
                chart: { type: 'donut', height: 260, fontFamily: 'Mont, sans-serif' },
                labels: ['Inbound', 'Outbound', 'Chatbot', 'Ecare', 'WhatsApp'],
                colors: ['#3b82f6', '#f97316', '#6366f1', '#eab308', '#ec4899'],
                plotOptions: {
                    pie: {
                        donut: { size: '65%', labels: { show: true, name: {show:true}, value: {show:true} } }
                    }
                },
                dataLabels: { enabled: false }, // Avoid clutter
                legend: { position: 'right', verticalAlign: 'middle', fontSize: '11px', markers: {radius: 12} },
                stroke: { show: false }
            };

            var chart = new ApexCharts(document.querySelector("#perfDonutChart"), options);
            chart.render();

            const renderTable = (rows) => {
                const tbody = document.getElementById('table-body');
                tbody.innerHTML = '';
                rows.forEach((row, index) => {
                    const tr = document.createElement('tr');
                    tr.className = index % 2 === 0 ? 'bg-white' : 'bg-gray-50'; // Zebra striping
                    tr.innerHTML = `
                        <td class="td-cell text-left pl-4 font-bold text-power-red">${row.name}</td>
                        <td class="td-cell text-gray-500">(Blank)</td>
                        <td class="td-cell font-bold text-[14px]">${row.traffik}</td>
                        <td class="td-cell">${row.sl}</td>
                        <td class="td-cell">${row.scr}</td>
                        <td class="td-cell">${row.aht}</td>
                    `;
                    tbody.appendChild(tr);
                });
            }

            // Interactive Buttons functionality
            const buttons = document.querySelectorAll('.filter-btn');
            
            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active from all
                    buttons.forEach(b => {
                        b.classList.remove('active');
                        b.classList.add('text-blue-900');
                        b.classList.remove('text-power-red');
                    });
                    
                    // Add active to clicked
                    this.classList.add('active');
                    this.classList.remove('text-blue-900');

                    // Fetch associated mockup data
                    const id = this.getAttribute('data-id');
                    const data = mockData[id];
                    
                    // Update KPIs
                    document.getElementById('kpi-seat').innerText = data.kpi.seat;
                    document.getElementById('kpi-traffik').innerText = data.kpi.traffik;
                    document.getElementById('kpi-channel').innerText = data.kpi.channel;
                    document.getElementById('kpi-sdm').innerText = data.kpi.sdm;

                    // Update Chart
                    // For ApexCharts, also update labels if data length differs
                    const newLabels = data.tableRows.map(r => r.name);
                    chart.updateOptions({
                        labels: newLabels
                    });
                    chart.updateSeries(data.chart);

                    // Update Table
                    renderTable(data.tableRows);
                });
            });

            // Initial render
            renderTable(mockData.digital.tableRows);

            // Grapari Data setup
            const grapariData = [
                { name: 'CSR Plasa', seat: '-', traffik: 485, lat: -4.00, lon: 104.00 }, // Dummy Sumatra
                { name: 'Grapari Atom', seat: '-', traffik: 485, lat: -1.00, lon: 114.00 }, // Kalimantan
                { name: 'Grapari Basura City', seat: '-', traffik: 485, lat: -6.20, lon: 106.81 }, // Jakarta
                { name: 'Grapari BEC', seat: '-', traffik: 485, lat: -6.91, lon: 107.60 }, // Bandung
                { name: 'Grapari Bintaro', seat: '-', traffik: 485, lat: -6.28, lon: 106.72 }, // Tangsel
                { name: 'Grapari Bogor', seat: '-', traffik: 485, lat: -6.59, lon: 106.79 }, // Bogor
                { name: 'Grapari Bukit Darmo', seat: '-', traffik: 485, lat: -7.25, lon: 112.75 }, // Surabaya
                { name: 'Grapari Banten', seat: '-', traffik: 485, lat: -6.12, lon: 106.15 },
                { name: 'Grapari Bali', seat: '-', traffik: 485, lat: -8.40, lon: 115.18 },
                { name: 'Grapari Makassar', seat: '-', traffik: 485, lat: -5.14, lon: 119.43 }
            ];

            // Render Full List
            const tbodyFull = document.getElementById('table-grapari-full');
            const tbodyTop5 = document.getElementById('table-top-5');
            const tbodyBot5 = document.getElementById('table-bot-5');

            grapariData.forEach((item, index) => {
                let bgClass = index % 2 === 0 ? 'bg-white' : 'bg-[#f4f7fc]';
                tbodyFull.innerHTML += `<tr class="${bgClass}"><td class="py-1.5 px-3">${item.name}</td><td class="py-1.5 px-3">${item.seat}</td><td class="py-1.5 px-3">${item.traffik}</td></tr>`;
                
                if(index < 2) {
                    tbodyTop5.innerHTML += `<tr class="${bgClass}"><td class="py-1.5 px-1">${item.name}</td><td class="text-right py-1.5 px-1">${item.traffik}</td></tr>`;
                    tbodyBot5.innerHTML += `<tr class="${bgClass}"><td class="py-1.5 px-1">${item.name}</td><td class="text-right py-1.5 px-1">${item.traffik}</td></tr>`;
                }
            });

            // Setup Highcharts Map
            Highcharts.mapChart('indonesia-map', {
                chart: { map: 'countries/id/id-all', backgroundColor: 'transparent' },
                title: { text: null },
                mapNavigation: { enabled: true, buttonOptions: { verticalAlign: 'bottom' } },
                tooltip: { headerFormat: '', pointFormat: '<div class="text-sm px-1 font-mont"><b>{point.name}</b><br/>Traffik: {point.traffik}</div>', useHTML: true },
                legend: { itemStyle: { fontFamily: 'Mont, sans-serif' } },
                series: [{
                    name: 'Basemap',
                    borderColor: '#ffffff',
                    borderWidth: 1,
                    color: '#1e293b', 
                    nullColor: '#1e293b', // Extremely solid and visible baseline dark slate
                    states: { hover: { color: '#0f172a', nullColor: '#0f172a' } },
                    dataLabels: { enabled: false },
                    showInLegend: false // Hide from legend
                }, {
                    type: 'mappoint',
                    name: 'Lokasi Grapari',
                    color: '#E31E24',
                    marker: {
                        radius: 8,
                        fillColor: 'rgba(227, 30, 36, 0.0)', // Transparent hit box for tooltip
                        lineWidth: 0
                    },
                    dataLabels: {
                        enabled: true,
                        useHTML: true,
                        allowOverlap: true,
                        formatter: function() {
                            return `<div class="relative flex h-5 w-5 justify-center items-center cursor-pointer">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-power-red opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-power-red border-2 border-white shadow-md"></span>
                            </div>`;
                        }
                    },
                    data: grapariData.map(d => ({ name: d.name, lat: d.lat, lon: d.lon, traffik: d.traffik }))
                }],
                credits: { enabled: false }
            });
        });
    </script>
</body>
</html>
