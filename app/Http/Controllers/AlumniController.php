<?php

namespace App\Http\Controllers;

class AlumniController extends Controller
{
    /**
     * Get static alumni news data
     */
    private function getStaticData()
    {
        return collect([
            (object) [
                'id' => 1,
                'title' => 'Alumni Reunion 2024',
                'description' => 'Join us for the annual alumni reunion event.',
                'content' => '<p>We invite all alumni to join us for our annual reunion celebration.</p>',
                'category' => 'event',
                'slug' => 'alumni-reunion-2024',
                'featured_image' => null,
                'is_alumni' => true,
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            (object) [
                'id' => 2,
                'title' => 'Alumni Success Story: Tech Entrepreneur',
                'description' => 'Read about our alumni who started a successful tech company.',
                'content' => '<p>One of our graduates has successfully launched a tech startup.</p>',
                'category' => 'news',
                'slug' => 'alumni-success-tech-entrepreneur',
                'featured_image' => null,
                'is_alumni' => true,
                'is_active' => true,
                'published_at' => now()->subDays(10),
            ],
            (object) [
                'id' => 3,
                'title' => 'Alumni Networking Event',
                'description' => 'Connect with fellow alumni at our networking event.',
                'content' => '<p>Join us for an evening of networking and professional development.</p>',
                'category' => 'event',
                'slug' => 'alumni-networking-event',
                'featured_image' => null,
                'is_alumni' => true,
                'is_active' => true,
                'published_at' => now()->subDays(15),
            ],
        ]);
    }

    public function index()
    {
        $alumniCollection = $this->getStaticData();
        
        // Create paginator for alumni items (since view expects pagination)
        $currentPage = request()->get('page', 1);
        $perPage = 9;
        $alumniItems = new \Illuminate\Pagination\LengthAwarePaginator(
            $alumniCollection->forPage($currentPage, $perPage),
            $alumniCollection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        $alumniSiteUrl = config('app.alumni_url', 'https://alumni.example.edu');

        return view('alumni.index', compact('alumniItems', 'alumniSiteUrl'));
    }
}


