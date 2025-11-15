<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-3">
                <select id="analyticsPeriod" class="text-sm rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="7days">Last 7 Days</option>
                    <option value="30days" selected>Last 30 Days</option>
                    <option value="90days">Last 90 Days</option>
                    <option value="1year">Last Year</option>
                </select>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-800 to-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Analytics Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Visitors -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-900 rounded-lg p-3">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Visitors</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white" id="totalVisitors">0</p>
                                <p class="text-xs text-green-600 dark:text-green-400 mt-1">+12.5% from last period</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Unique Visitors -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 dark:bg-green-900 rounded-lg p-3">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Unique Visitors</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white" id="uniqueVisitors">0</p>
                                <p class="text-xs text-green-600 dark:text-green-400 mt-1">+8.3% from last period</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Views -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 dark:bg-purple-900 rounded-lg p-3">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Page Views</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white" id="pageViews">0</p>
                                <p class="text-xs text-green-600 dark:text-green-400 mt-1">+15.2% from last period</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bounce Rate -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-orange-100 dark:bg-orange-900 rounded-lg p-3">
                                <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Bounce Rate</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white" id="bounceRate">0%</p>
                                <p class="text-xs text-red-600 dark:text-red-400 mt-1">+2.1% from last period</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Visitor Trends Chart -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Visitor Trends</h3>
                        <div class="h-64">
                            <canvas id="visitorTrendsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Traffic Sources Chart -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Traffic Sources</h3>
                        <div class="h-64">
                            <canvas id="trafficSourcesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Tables Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Top Pages -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Top Pages</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50/80 dark:bg-gray-700/80">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Page</th>
                                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Views</th>
                                    </tr>
                                </thead>
                                <tbody id="topPagesTable" class="bg-white/60 dark:bg-gray-800/60 divide-y divide-gray-200 dark:divide-gray-700">
                                    <!-- Data will be inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Device Breakdown -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Device Breakdown</h3>
                        <div class="space-y-4" id="deviceBreakdown">
                            <!-- Data will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Geographic Data -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Geographic Distribution</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Country</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Visitors</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Percentage</th>
                                    <th class="px-4 py-3 w-full text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Chart</th>
                                </tr>
                            </thead>
                            <tbody id="geographicTable" class="bg-white/60 dark:bg-gray-800/60 divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Data will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Google Analytics Integration -->
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Google Analytics Integration</h3>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full {{ env('GOOGLE_ANALYTICS_ID') ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                            {{ env('GOOGLE_ANALYTICS_ID') ? 'Connected' : 'Not Configured' }}
                        </span>
                    </div>
                    @if(env('GOOGLE_ANALYTICS_ID'))
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Google Analytics is connected and tracking visitors. Your tracking ID: <strong>{{ env('GOOGLE_ANALYTICS_ID') }}</strong>
                        </p>
                        <a href="https://analytics.google.com" target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                            View Full Analytics Report
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    @else
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            To enable Google Analytics tracking, add your Google Analytics ID to the <code class="px-2 py-1 bg-gray-100 dark:bg-gray-700 rounded">GOOGLE_ANALYTICS_ID</code> environment variable.
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Note: The dashboard above shows mock data. Connect Google Analytics for real-time traffic data.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <script>
        let visitorTrendsChart, trafficSourcesChart;
        
        // Load analytics data
        function loadAnalytics(period = '30days') {
            fetch(`{{ route('admin.analytics.stats') }}?period=${period}`)
                .then(response => response.json())
                .then(data => {
                    // Update overview cards
                    document.getElementById('totalVisitors').textContent = data.stats.total_visitors.toLocaleString();
                    document.getElementById('uniqueVisitors').textContent = data.stats.unique_visitors.toLocaleString();
                    document.getElementById('pageViews').textContent = data.stats.page_views.toLocaleString();
                    document.getElementById('bounceRate').textContent = data.stats.bounce_rate + '%';
                    
                    // Update Visitor Trends Chart
                    updateVisitorTrendsChart(data.visitor_trends);
                    
                    // Update Traffic Sources Chart
                    updateTrafficSourcesChart(data.traffic_sources);
                    
                    // Update Top Pages Table
                    updateTopPagesTable(data.top_pages);
                    
                    // Update Device Breakdown
                    updateDeviceBreakdown(data.device_breakdown);
                    
                    // Update Geographic Data
                    updateGeographicTable(data.geographic_data);
                })
                .catch(error => {
                    console.error('Error loading analytics:', error);
                });
        }
        
        // Initialize Visitor Trends Chart
        function updateVisitorTrendsChart(trends) {
            const ctx = document.getElementById('visitorTrendsChart').getContext('2d');
            
            if (visitorTrendsChart) {
                visitorTrendsChart.destroy();
            }
            
            visitorTrendsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: trends.map(t => t.date),
                    datasets: [
                        {
                            label: 'Visitors',
                            data: trends.map(t => t.visitors),
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.4,
                            fill: true,
                        },
                        {
                            label: 'Page Views',
                            data: trends.map(t => t.pageviews),
                            borderColor: 'rgb(168, 85, 247)',
                            backgroundColor: 'rgba(168, 85, 247, 0.1)',
                            tension: 0.4,
                            fill: true,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                            },
                            grid: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                            },
                            grid: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    }
                }
            });
        }
        
        // Initialize Traffic Sources Chart
        function updateTrafficSourcesChart(sources) {
            const ctx = document.getElementById('trafficSourcesChart').getContext('2d');
            
            if (trafficSourcesChart) {
                trafficSourcesChart.destroy();
            }
            
            trafficSourcesChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: sources.map(s => s.source),
                    datasets: [{
                        data: sources.map(s => s.visitors),
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(251, 146, 60, 0.8)',
                            'rgba(168, 85, 247, 0.8)',
                        ],
                        borderWidth: 2,
                        borderColor: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#1f2937' : '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000',
                                padding: 15
                            }
                        }
                    }
                }
            });
        }
        
        // Update Top Pages Table
        function updateTopPagesTable(pages) {
            const tbody = document.getElementById('topPagesTable');
            tbody.innerHTML = pages.map(page => `
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">${page.title}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-right">${page.views.toLocaleString()}</td>
                </tr>
            `).join('');
        }
        
        // Update Device Breakdown
        function updateDeviceBreakdown(devices) {
            const container = document.getElementById('deviceBreakdown');
            container.innerHTML = devices.map(device => `
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">${device.device}</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">${device.visitors.toLocaleString()} (${device.percentage}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: ${device.percentage}%"></div>
                    </div>
                </div>
            `).join('');
        }
        
        // Update Geographic Table
        function updateGeographicTable(countries) {
            const tbody = document.getElementById('geographicTable');
            tbody.innerHTML = countries.map(country => `
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">${country.country}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-right">${country.visitors.toLocaleString()}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-right">${country.percentage}%</td>
                    <td class="px-4 py-3">
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: ${country.percentage}%"></div>
                        </div>
                    </td>
                </tr>
            `).join('');
        }
        
        // Period selector change
        document.getElementById('analyticsPeriod').addEventListener('change', function() {
            loadAnalytics(this.value);
        });
        
        // Load analytics on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadAnalytics('30days');
        });
    </script>
</x-app-layout>
