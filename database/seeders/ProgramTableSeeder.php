<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desc_1 = ' Are you passionate about making a career in Supply chain?';
        $desc_2 = 'This program is an initiative by Mr Zarar and assisted by Mr Srikanth.';
        $desc_l = 'India is the 5th largest preferred retail destination globally. The highest in the world in terms of per capita retail store availability. India’s retail sector is experiencing exponential growth, with retail development expanding not just in cities and metros, but also into Tier-II and Tier-III towns.<br>
It has emerged as one of the most dynamic and fast-paced industries due to the entry of several new players. Total consumption expenditure is expected to reach nearly US$ 3,600 billion by 2020 from US$ 1,824 billion in 2017.<br>
Retail is expanding steadily in the country. Customers have the ever-increasing choice of products at the lowest rates. Supply chain is probably creating the biggest revolution in the retail industry, and this trend will continue in the years to come.<br>
The long-term outlook for the industry is positive, supported by rising incomes, favorable
demographics, entry of foreign players, and increasing urbanization.<br>
In this industrial immersion experience, you’ll gain insights into the he inner workings of retail,gain insight into Planning, Procurement, Inventory management, Inbound & Outbound logistics along with warehouse management with a chance to establish an exchange with the employees, to network, know its work dynamic’s and culture as well..<br>

Interested? Participate in our Engineering Virtual Program to learn more!';

        $video_desc = "We believe that exposure between early career candidates (you) and companies looking for fresh talent and skill set is the primary purpose of this program. This is achieved by engaging yet fun industrial immersion curated by our industry gurus, that familiarise the candidate with a bird’s eye view of the company/industry. For an In-depth familiarity, an industry speak is organized by us to give candidates (you) an opportunity to interact with highly experienced and seasoned domain veterans or current experts, which they normally wouldn't have a chance to.
Using these methods, candidates (you) develop and gain skills which otherwise can’t be mapped on the resume but are essential to set foot in the door.<br>
To know more about the program experience, click on the video. :)";

        $orientation_agenda = [
            'name' => 'Orientation - Welcome',
            'activities' => [
                [
                    'name' => 'Understand the objectives and benefits of ICP',
                    'skills' => '21st Century Skills,Work Readiness,Future Work',
                ],
                [
                    'name' => 'Build awareness on Industry speak',
                    'skills' => 'Networking, Talk, Supply Chain Management, Expert',
                ],
            ]
        ];

        $industry_speak_agenda = [
            'name' => 'Industry Speak',
            'activities' => [
                [
                    'name' => 'Get in-depth domain insights',
                    'skills' => ''
                ],
                [
                    'name' => 'Understand opportunities, trends and hiring practices in the domain',
                    'skills' => ''
                ],
            ]
        ];

        $connect_agenda = [
            'name' => 'Supply Chain Connect',
            'activities' => [
                [
                    'name' => 'Discover and prepare for Industry immersion with the help of the learning kit.',
                    'skills' => 'Networking'
                ],
                [
                    'name' => 'Understand the operations and gain practical exposure in supply chain',
                    'skills' => 'Journey Map, 5 Whys, What, How & Why, MBO Process'
                ],
                [
                    'name' => 'Gain insight and knowledge into BCP’s and hiring practices',
                    'skills' => 'Procurement, Quality Assurance, Operations, Safety'
                ],
                [
                    'name' => 'Network and understand work culture and readiness',
                    'skills' => 'Entry-Level Skills, Job Readiness, Advice, Mentorship'
                ],
            ]
        ];

        $certificate_agenda = [
            'name' => 'Certification',
            'activities' => [
                [
                    'name' => 'Upload pictures & videos to get certified',
                    'skills' => 'Sharing, Pictures, Videos, Student Gallery'
                ],
                [
                    'name' => 'Get career ready for entry level jobs.',
                    'skills' => 'Skills, Industry Experience, Interviews, Easy Hiring'
                ],
            ]
        ];

    $hero_benefits = [
      [
        'icon' => "mdi-star-outline",
        'desc' => "This online training program is free for students",
      ],
      [
        'icon' => "mdi-clock-outline",
        'desc' =>
          "This program is self-paced. It takes 5-6 hours to complete this online training program",
      ],
      [
        'icon' => "mdi-briefcase-variant-outline",
        'desc' => "Get practical skills and experiene from Y combinator",
      ],
      [
        'icon' => "mdi-school-outline",
        'desc' => "Use this experience in your CV in-line with our policy",
      ],
    ];

    $program_benefits = [
        [
          'icon'=> "mdi-account-clock-outline",
          'title'=> "Pre-and-Post Sessions",
          'desc'=> "For an in-depth familiarity of the visiting company/industry, our industry gurus curate a pre and post-session, so that candidates can make the most out of their industrial immersion experience.",
        ],
        [
          'icon'=> "mdi-account-tie-voice-outline",
          'title'=> "Industry Gurus",
          'desc'=> "Acumen Connect’s trained & seasoned professionals immerse you into a fun learning environment, helping you gain the right information and knowledge from the word go by maintaining a ratio of 1 Industry guru : 20 students for effective Industrial immersion",
        ],
        [
          'icon'=> "mdi-notebook-outline",
          'title'=> "Learning Kit",
          'desc'=> "Reading material backed with all the necessary information that you need for the visiting sector/domain which will in turn help you stay ahead of the curve. The kit also provides you with notepads and pens for you to document your industrial immersion experience.",
        ],
        [
          'icon'=> "mdi-comment-question-outline",
          'title'=> "Discover if this career is for you",
          'desc'=> "Nearly 50% of the hours you’re awake are spent at work. Discover if this is the right career path for you.",
        ],
        [
          'icon'=> "mdi-briefcase-account-outline",
          'title'=> "**Make informed career choices**",
          'desc'=> "No more applying for jobs without knowing what the role involves. Build the confidence and practical skills by gaining practical experience with us.",
        ],
        [
          'icon'=> "mdi-head-flash-outline",
          'title'=> "Memorable commute",
          'desc'=> "To-n-fro journey of the student will be completely taken care of by us, to ensure that students have a fun, memorable and a refreshing experience.",
        ],
        [
          'icon'=> "mdi-food",
          'title'=> "Executive lunch",
          'desc'=> "We understand that sometimes interactive & engaging visits can tire down our students. To supplement them with their energies, we provide them with scrumptious executive meals to keep them going throughout the day.",
        ],
        [
          'icon'=> "mdi-certificate-outline",
          'title'=> "Certificate",
          'desc'=> "When you complete our Industry Connect Program, you’ll earn a personalized completion certificate to share with your prospective employers and your professional network.",
        ],
    ];
  

        Program::create([
            'id' => 1,
            'title' => 'Supply Chain Management',
            'school_name' => 'ICBM-SBE',
            'school_logo' => 'icbm.png',
            'cover_image' => 'cyber-4062449_1280.jpg',
            'desc_1' => $desc_1,
            'desc_2' => $desc_2,
            'hero_benefits' => json_encode($hero_benefits),
            'program_benefits' => json_encode($program_benefits),
            'introduction' => $desc_l,
            'intro_video_link' => 'NuPolrd9yuo',
            'intro_video_desc' => $video_desc,
            'orientation' => json_encode($orientation_agenda),
            'live_session' => json_encode($industry_speak_agenda),
            'visit' => json_encode($connect_agenda),
            'certificate' => json_encode($certificate_agenda),
            //'program_agenda' => json_encode([$orientation_agenda,$industry_speak_agenda,$connect_agenda,$certificate_agenda]),
        ]);



        Program::create([
            'id' => 2,
            'title' => 'Software Development',
            'school_name' => 'ICBM-SBE',
            'school_logo' => 'icbm.png',
            'cover_image' => 'cyber-4062449_1280.jpg',
            'desc_1' => $desc_1,
            'desc_2' => $desc_2,
            'hero_benefits' => json_encode($hero_benefits),
            'program_benefits' => json_encode($program_benefits),
            'introduction' => $desc_l,
            'intro_video_link' => 'NuPolrd9yuo',
            'intro_video_desc' => $video_desc,
            'orientation' => json_encode($orientation_agenda),
            'live_session' => json_encode($industry_speak_agenda),
            'visit' => json_encode($connect_agenda),
            'certificate' => json_encode($certificate_agenda),
        ]);

        Program::create([
            'id' => 3,
            'title' => 'Accounting & Taxation',
            'school_logo' => 'icbm.png',
            'school_name' => 'ICBM-SBE',
            'cover_image' => 'cyber-4062449_1280.jpg',
            'desc_1' => $desc_1,
            'desc_2' => $desc_2,
            'hero_benefits' => json_encode($hero_benefits),
            'program_benefits' => json_encode($program_benefits),
            'introduction' => $desc_l,
            'intro_video_link' => 'NuPolrd9yuo',
            'intro_video_desc' => $video_desc,
            'orientation' => json_encode($orientation_agenda),
            'live_session' => json_encode($industry_speak_agenda),
            'visit' => json_encode($connect_agenda),
            'certificate' => json_encode($certificate_agenda),
        ]);
    }
}
