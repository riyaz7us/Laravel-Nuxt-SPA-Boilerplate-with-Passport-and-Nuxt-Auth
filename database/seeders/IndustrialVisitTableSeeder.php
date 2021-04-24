<?php

namespace Database\Seeders;

use App\Models\IndustrialVisit;
use Illuminate\Database\Seeder;

class IndustrialVisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desc_s = 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account.';
        $desc_l = 'Industrial visit to Supply chain management:<br />India is the 5th
              largest preferred retail destination globally. The highest in the
              world in terms of per capita retail store availability. India’s
              retail sector is experiencing exponential growth, with
              retaildevelopment expanding not just in cities and metros, but
              also into Tier-II and Tier-III towns.<br />Importance of supply
              chain management visit: <br />Retail is expanding steadily in the
              country. Customers have the ever-increasing choice of products at
              the lowest rates. Supply chain is probably creating the biggest
              revolution in the retail industry, and this trend will continue in
              the years to come.';
        $video_intro = 'Features of supply chain management visit:<br>
You’ll understand the inner workings of retail, gain insight into Planning, Procurement, Inventory management, Inbound & Outbound logistics along with warehouse management with a chance to establish an exchange with the employees, to network, know its work dynamic’s and culture as well.';

        $pre_connect = [
            'name' => ' Pre Industry Connect Preparations',
            'activities' => [
                [
                    'name' => 'Undertake research to discover supply chain management',
                    'desc' => 'You are expected to use the discussions from the industry speak and the reading from the learning kit to prepare for the visit.',
                    'skills' => 'Preparation, Management, SCM',
                    'learning_kit' => ''
                ],
                [
                    'name' => 'Get your pre-visit instructions from our supervisor',
                    'desc' => 'Watch this video to get your set of instructions',
                    'video' => 'NuPolrd9yuo',
                ],
            ]
        ];

        $day_agenda = [
            'name' => ' Day Agenda',
            'activities' => [
                [
                    'name' => 'Assemble at your college- 08:45 AM',
                    'desc' => '',
                    'skills' => 'Safety, 5 Whys, Mind Maps, What, How, Why',
                ],
                [
                    'name' => 'Industry immersion- 10:30 AM',
                    'desc' => '',
                    'skills' => 'Procurement, Inventory Management, Planning, Safety, Quality Management, Ratnadeep, Flipkart'
                ],
                [
                    'name' => 'Interactive session (QnA)- 12:30 PM',
                    'desc' => 'Students will get an opportunity to interact and clarify their doubts',
                    'skills' => 'Skills, Operations, Culture, Hiring'
                ],
                [
                    'name' => 'Lunch- 01:00 PM',
                    'desc' => 'Rest your feet and relax over an executive meal while you reflect on your experience.',
                    'skills' => 'Meals, Learning, Relax, Connect'
                ],
                [
                    'name' => 'Wrap up- 02:00 PM',
                    'desc' => '',
                    'skills' => 'Closing, Vote of Thanks, Pictures'
                ],
            ]
        ];

        IndustrialVisit::create([
            'program_id' => 1,
            'intro' => $desc_l,
            'video_intro' => $video_intro,
            'video_link' => 'NuPolrd9yuo',
            'pre_connect_agenda'=>json_encode($pre_connect),
            'day_agenda' => json_encode($day_agenda)
        ]);

        IndustrialVisit::create([
            'program_id' => 2,
            'intro' => $desc_l,
            'video_intro' => $video_intro,
            'video_link' => 'NuPolrd9yuo',
            'pre_connect_agenda' => json_encode($pre_connect),
            'day_agenda' => json_encode($day_agenda)
        ]);
    }
}
