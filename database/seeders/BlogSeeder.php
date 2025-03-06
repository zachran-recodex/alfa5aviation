<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Getting Started with Laravel',
                'slug' => 'getting-started-with-laravel',
                'image' => 'laravel-intro.png',
                'description' => 'A comprehensive guide for beginners to understand Laravel framework',
                'is_active' => true,
            ],
            [
                'title' => 'Advanced PHP Techniques',
                'slug' => 'advanced-php-techniques',
                'image' => 'php-advanced.png',
                'description' => 'Explore advanced programming techniques in PHP',
                'is_active' => true,
            ],
            [
                'title' => 'Web Development Best Practices',
                'slug' => 'web-development-best-practices',
                'image' => 'web-dev-best.png',
                'description' => 'Learn the most effective strategies for modern web development',
                'is_active' => true,
            ],
            [
                'title' => 'Introduction to Machine Learning',
                'slug' => 'introduction-to-machine-learning',
                'image' => 'ml-intro.png',
                'description' => 'Understanding the basics of machine learning and its applications',
                'is_active' => true,
            ],
            [
                'title' => 'Cybersecurity Fundamentals',
                'slug' => 'cybersecurity-fundamentals',
                'image' => 'cybersec-basics.png',
                'description' => 'Essential knowledge for protecting digital assets',
                'is_active' => true,
            ],
            [
                'title' => 'Design Patterns in Software Engineering',
                'slug' => 'design-patterns-software-engineering',
                'image' => 'design-patterns.png',
                'description' => 'Exploring common design patterns and their practical applications',
                'is_active' => true,
            ],
            [
                'title' => 'Cloud Computing Essentials',
                'slug' => 'cloud-computing-essentials',
                'image' => 'cloud-computing.png',
                'description' => 'Understanding the fundamentals of cloud computing technologies',
                'is_active' => true,
            ],
            [
                'title' => 'Frontend Frameworks Comparison',
                'slug' => 'frontend-frameworks-comparison',
                'image' => 'frontend-frameworks.png',
                'description' => 'Analyzing popular frontend frameworks like React, Vue, and Angular',
                'is_active' => true,
            ],
            [
                'title' => 'Database Optimization Techniques',
                'slug' => 'database-optimization-techniques',
                'image' => 'db-optimization.png',
                'description' => 'Strategies for improving database performance and efficiency',
                'is_active' => true,
            ],
            [
                'title' => 'Agile Methodology Deep Dive',
                'slug' => 'agile-methodology-deep-dive',
                'image' => 'agile-methodology.png',
                'description' => 'Comprehensive guide to Agile software development practices',
                'is_active' => true,
            ],
            [
                'title' => 'DevOps Culture and Practices',
                'slug' => 'devops-culture-and-practices',
                'image' => 'devops-culture.png',
                'description' => 'Exploring the principles and implementation of DevOps',
                'is_active' => true,
            ],
            [
                'title' => 'Microservices Architecture',
                'slug' => 'microservices-architecture',
                'image' => 'microservices.png',
                'description' => 'Understanding the principles of microservices design',
                'is_active' => true,
            ]
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
