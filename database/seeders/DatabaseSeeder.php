<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Remove old placeholder users if present
        User::where('email', '!=', 'emmanuelmwangata26@gmail.com')->delete();

        // Create or update admin user
        User::updateOrCreate(
            ['email' => 'emmanuelmwangata26@gmail.com'],
            [
                'name'     => 'Emmanuel M. Mwangata',
                'password' => Hash::make('Futurist@PGL2026!k9X'),
                'is_admin' => true,
            ]
        );

        // Sample projects (replace with your real work)
        $projects = [
            [
                'name'         => 'Unibridge',
                'slug'         => 'unibridge',
                'description'  => 'A university student platform connecting students with resources, campus services, and institutional information. Built as a final year project at The Copperbelt University.',
                'problem'      => 'University students struggle to access campus information, connect with peers, and navigate institutional resources through a single unified platform.',
                'solution'     => 'Unibridge is a cross-platform mobile application built with Flutter and Dart that centralises student resources, campus services, and peer connectivity into one intuitive app.',
                'category'     => 'mobile',
                'technologies' => ['Flutter', 'Dart', 'Firebase', 'REST APIs', 'Mobile Development'],
                'features'     => [
                    'Cross-platform mobile app (Android & iOS) built with Flutter',
                    'Student resource and campus information hub',
                    'Peer connectivity and communication features',
                    'Institutional service integration',
                    'Clean, modern mobile UI designed for student workflows',
                ],
                'github_url'   => 'https://github.com/Emmanuel17A/unibridge',
                'live_url'     => null,
                'status'       => 'dev',
                'is_featured'  => true,
                'sort_order'   => 1,
            ],
            [
                'name'         => 'Inventory Management System',
                'slug'         => 'inventory-management-system',
                'description'  => 'A full-featured inventory and order management system built for Pixel & Galaxy Lab to track stock, orders, and suppliers in real time.',
                'problem'      => 'Managing stock levels and orders manually in spreadsheets led to errors, stockouts, and time wasted on administrative tasks that could be automated.',
                'solution'     => 'Built a custom Laravel-based inventory system with real-time stock tracking, automated low-stock alerts, supplier management, and order processing workflows.',
                'category'     => 'web',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
                'features'     => [
                    'Real-time stock level tracking and alerts',
                    'Multi-supplier management',
                    'Order processing and fulfilment tracking',
                    'Sales reporting and analytics dashboard',
                    'Role-based access control',
                ],
                'status'       => 'live',
                'is_featured'  => true,
                'sort_order'   => 1,
            ],
            [
                'name'         => 'RESTful API Platform',
                'slug'         => 'restful-api-platform',
                'description'  => 'A production-grade REST API platform with authentication, rate limiting, versioning, and comprehensive documentation.',
                'problem'      => 'Multiple client applications needed to share data and business logic without duplicating code across different codebases.',
                'solution'     => 'Designed and built a versioned REST API using Laravel with Sanctum authentication, rate limiting, structured error handling, and auto-generated API documentation.',
                'category'     => 'api',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Laravel Sanctum', 'Redis'],
                'features'     => [
                    'Token-based authentication with refresh tokens',
                    'Request rate limiting per consumer',
                    'API versioning strategy',
                    'Comprehensive error handling and logging',
                    'Auto-generated OpenAPI documentation',
                ],
                'status'       => 'dev',
                'is_featured'  => true,
                'sort_order'   => 2,
            ],
            [
                'name'         => 'Business Process Automation Tool',
                'slug'         => 'business-process-automation',
                'description'  => 'An automation system that reduced manual administrative work by handling routine tasks, notifications, and reporting automatically.',
                'problem'      => 'Staff spent hours each week on repetitive administrative tasks — generating reports, sending status emails, and updating records manually.',
                'solution'     => 'Built a task automation system using Laravel\'s queue and scheduling system that runs routine jobs automatically, with a monitoring dashboard for oversight.',
                'category'     => 'web',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Laravel Queues', 'Laravel Scheduler'],
                'features'     => [
                    'Scheduled task execution engine',
                    'Email notification automation',
                    'Report generation and distribution',
                    'Job monitoring and failure alerting',
                    'Audit log of all automated actions',
                ],
                'status'       => 'live',
                'is_featured'  => true,
                'sort_order'   => 3,
            ],
            [
                'name'         => 'Church Organisation Application',
                'slug'         => 'church-organisation-application',
                'description'  => 'A church organisation and member management application built for the Seventh-day Adventist church, designed to be adaptable for other Christian denominations.',
                'problem'      => 'Church organisations manage member records, attendance, announcements, and event scheduling through fragmented manual systems.',
                'solution'     => 'A PHP web application that centralises church member management, event scheduling, and internal communications in one platform.',
                'category'     => 'web',
                'technologies' => ['PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript'],
                'features'     => [
                    'Church member registration and management',
                    'Event and service scheduling',
                    'Announcement and communications board',
                    'Adaptable for multiple Christian denominations',
                    'Role-based access for administrators and members',
                ],
                'github_url'   => 'https://github.com/Emmanuel17A/Church_Application',
                'live_url'     => null,
                'status'       => 'dev',
                'is_featured'  => false,
                'sort_order'   => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::firstOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }

        // Seed default site settings
        $defaultSettings = [
            'availability'      => 'available',
            'stat_years'        => '4',
            'stat_projects'     => '20',
            'stat_technologies' => '8',
            'tagline'           => 'I build software that works.',
            'meta_description'  => 'Full-stack software developer building practical, modern web applications. Based in Zambia. Available for freelance projects.',
        ];

        foreach ($defaultSettings as $key => $value) {
            SiteSetting::firstOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
