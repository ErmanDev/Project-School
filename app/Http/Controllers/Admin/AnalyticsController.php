<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Get analytics statistics.
     */
    public function getStats(Request $request)
    {
        $period = $request->get('period', '30days'); // 7days, 30days, 90days, 1year
        
        // Mock data for visitor statistics
        $stats = [
            'total_visitors' => 12450,
            'unique_visitors' => 8920,
            'page_views' => 35680,
            'bounce_rate' => 32.5,
            'avg_session_duration' => '4m 32s',
            'new_visitors' => 7850,
            'returning_visitors' => 4600,
        ];

        // Mock data for page views by page
        $topPages = [
            ['page' => '/', 'views' => 8520, 'title' => 'Homepage'],
            ['page' => '/news-and-events', 'views' => 6240, 'title' => 'News & Events'],
            ['page' => '/academic-programs', 'views' => 4820, 'title' => 'Academic Programs'],
            ['page' => '/admissions', 'views' => 3950, 'title' => 'Admissions'],
            ['page' => '/about', 'views' => 3150, 'title' => 'About'],
            ['page' => '/student-services', 'views' => 2890, 'title' => 'Student Services'],
        ];

        // Mock data for traffic sources
        $trafficSources = [
            ['source' => 'Organic Search', 'visitors' => 6540, 'percentage' => 52.5],
            ['source' => 'Direct', 'visitors' => 3420, 'percentage' => 27.5],
            ['source' => 'Social Media', 'visitors' => 1560, 'percentage' => 12.5],
            ['source' => 'Referral', 'visitors' => 930, 'percentage' => 7.5],
        ];

        // Mock data for device breakdown
        $deviceBreakdown = [
            ['device' => 'Desktop', 'visitors' => 6840, 'percentage' => 54.9],
            ['device' => 'Mobile', 'visitors' => 4320, 'percentage' => 34.7],
            ['device' => 'Tablet', 'visitors' => 1290, 'percentage' => 10.4],
        ];

        // Mock data for visitor trends (last 30 days)
        $visitorTrends = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $visitorTrends[] = [
                'date' => $date->format('M d'),
                'visitors' => rand(280, 450),
                'pageviews' => rand(850, 1250),
            ];
        }

        // Mock data for geographic data
        $geographicData = [
            ['country' => 'Philippines', 'visitors' => 8560, 'percentage' => 68.8],
            ['country' => 'United States', 'visitors' => 1240, 'percentage' => 10.0],
            ['country' => 'United Kingdom', 'visitors' => 890, 'percentage' => 7.2],
            ['country' => 'Canada', 'visitors' => 560, 'percentage' => 4.5],
            ['country' => 'Australia', 'visitors' => 420, 'percentage' => 3.4],
            ['country' => 'Others', 'visitors' => 780, 'percentage' => 6.1],
        ];

        return response()->json([
            'stats' => $stats,
            'top_pages' => $topPages,
            'traffic_sources' => $trafficSources,
            'device_breakdown' => $deviceBreakdown,
            'visitor_trends' => $visitorTrends,
            'geographic_data' => $geographicData,
            'period' => $period,
        ]);
    }
}
