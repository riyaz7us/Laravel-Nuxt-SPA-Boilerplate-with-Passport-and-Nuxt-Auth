<?php

namespace Database\Seeders;

use App\Models\Icp;
use Illuminate\Database\Seeder;

class icptableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $desc_l =
            "Industry Connect Program of Acumen Connect aims to provide prospect job seekers/students with skills that are non-transferable. These are mostly soft skills that cannot be realised in an interview, predicted via test or presented in a resume. These skills are acquired through a real-life application and development which we present to your students and help them achieve their dream job and growth prospect benefitting you in the long run.<br>
This program was established with an aim to help your students make informed career choices, aid in career discovery, impart job readiness and finally increase their employability factor.<br>
This can be achieved by company visits that familiarise the candidates with bird’s eye view of the visiting company or industry. For an in-depth familiarity, an industry speak with domain veterans or experts is also organized that is super beneficial for your students.";

        $domains = [
            ['name' => "Print Media", 'desc' => "Visit a printing press, interact with media houses and uncover a myriad of other aspects within this segment.", 'image' => "cyber-4062449_1280.jpg"],
            ['name' => "Electronic Media", 'desc' => "Explore the world of electronic media and understand the nuances of Content Creation and Production.", 'image' => "industry-3087393_1920.jpg"],
            ['name' => "Financial Services", 'desc' => "Interact with professionals to explore avenues and be involved in one of the most dynamic industries in the world.", 'image' => "cyber-4062449_1280.jpg"],
            ['name' => "Sales & Marketing", 'desc' => "Witness how textbook concepts are translated into real world applications by interacting with seasoned professionals.", 'image' => "industry-3087393_1920.jpg"],
            ['name' => "E-Commerce", 'desc' => "Uncover the working of eCommerce by understanding concepts like product development, customer acquisition, supply chain, business growth and much more.", 'image' => "industry-3087393_1920.jpg"],
            ['name' => "Hospitality Management", 'desc' => "Learn about different divisions such as Food Production, Culinary Arts, Catering, Client Servicing and many more by spending a day with them at work.", 'image' => "industry-3087393_1920.jpg"],
        ];

        $benefits = [
            [
                'icon' => "mdi-octagram-outline",
                'title' => "One stop solution",
                'desc' => "Acumen Connect’s Industry Connect Program acts as a one stop solution for students' career discovery process, making your life easier. (commute, industries, experience, lunch, additional resources, certifications)",
            ],
            [
                'icon' => "mdi-rhombus-split-outline",
                'title' => "Design your own experience: (customizable)",
                'desc' => "With our seasoned professionals and your expertise, we can curate a tailor made program for your students to compliment their academia needs and your teaching needs.",
            ],
            [
                'icon' => "mdi-office-building-outline",
                'title' => "Targeted industrial immersion",
                'desc' => "Why settle down for good when you can get the best? Acumen Connect has a wide range of industries across various sectors which can be very well mapped with student academia and can be more subject driven.",
            ],
            [
                'icon' => "mdi-file-document-multiple-outline",
                'title' => "Documentation",
                'desc' => "Acumen Connect’s Industry Connect Program believes in making teachers and students' lives easy. The entire experience will be documented and presented to teachers in the form of an industrial report which can further be used by the college.",
            ],
            [
                'icon' => "mdi-sparkles",
                'title' => "A Chance to shine",
                'desc' => "Showcase this experience and take full credit for implementing such a program for your students. This will not only display your decision making skills but also get you appreciation from your students and fellow faculty members.",
            ],
            [
                'icon' => "mdi-camera-outline",
                'title' => "An experience to showcase",
                'desc' => "Along with the Industrial report, Acumen Connect will also share pictures and videos, which can be further used for your college branding/website.",
            ],
            [
                'icon' => "mdi-star-outline",
                'title' => "Become a star teacher",
                'desc' => "Make the most of Industry Connect Program experience by drawing references from Industrial immersion experience and making the student's learning process more visual and fun.",
            ],
        ];

        $testimonials = [
            ['name' => 'Khushbu Parikh', 'college' => 'St.Francis College for Women', 'desc' => 'My ICP experience with Acumen Connect was enricing and immaculate. It was perfect blend of academia and fun.','image'=>'man-photo.jpg'],
            ['name' => 'Khushbu Parikh', 'college' => 'St.Francis College for Women', 'desc' => 'My ICP experience with Acumen Connect was enricing and immaculate. It was perfect blend of academia and fun.', 'image' => 'man-photo.jpg']
        ];

        $collegeLogos = [
            "ethames.png",
            "fol.png",
            "icbm.png",
            "ipe.png",
            "oyo.png",
            "stfrancis.png",
            "stjoseph.png",
            "vjim.png",
            "vvv.png",
        ];

        Icp::create([
            'id' => 1,
            'intro' => $desc_l,
            'domains' => json_encode($domains),
            'benefits' => json_encode($benefits),
            'college_logos' => json_encode($collegeLogos),
            'testimonials' => json_encode($testimonials),
            'cta' => ''
        ]);
    }
}
