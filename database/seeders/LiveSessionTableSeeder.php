<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LiveSession;

class LiveSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desc_s = 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account.';
        $desc_l = 'So what exactly is Industry Speak?<br>
        Welcome to ICBM’s Industry Connect Program. We are excited to have you here with us.<br>
Industry Speak helps students improve their learning experience in a more interactive and
topic-specific way. This method offers a new perspective to shortlisted topics and exposes
students to teachings drawn from industry experts\' real-life experiences. The nature of this
method is such that even a seemingly dull or unclear topic becomes more interesting and a
better one-to-many approach is achieved. Apart from this, it also introduces students to potential careers and jobs they can opt for, once they get out of their respective colleges/universities.<br>
Industry Speak in Supply Chain Management:<br>
Industry Speak is a perfect opportunity to interact with seasoned domain experts which helps
students get an insight into Supply chain management as a whole. The domain expert will
indoctrinate you (students) on various important concepts of SCM like: Inventory management,
Operations management, Vendor management, inbound and outbound logistics along with
influences of SCM on different business firms and economies.<br>
Profile of domain expert:<br>
Mr. Ashok is a seasoned specialist in Supply Chain Management having worked for over 11
years with Ratnadeep and 5 years with More retail before that. He holds a postgraduate degree
in International business from IIM-C. When he is not busy solving supply chain problems for
Ratnadeep, he delves into teaching. Mr. Ashok has interacted with more than 500+ students
teaching them about Supply Chain management and how important it is to keep the economy
afloat';
$agenda = 'Domain Immersion and trends, Their Journey and experience, Opportunities, readiness & hiring practices, Q&A session';

    $anchors = [
      [
        'icon'=> "mdi-numeric-1-circle-outline",
        'link'=> "video",
        'title'=> "Watch Video Instructions",
      ],
      [
        'icon'=> "mdi-numeric-2-circle-outline",
        'link'=> "industries",
        'title'=> "Industries You May Visit",
      ],
      [
        'icon'=> "mdi-numeric-3-circle-outline",
        'link'=> "info",
        'title'=> "Get Background Info and Context",
      ],
      [
        'icon'=> "mdi-numeric-4-circle-outline",
        'link'=> "info",
        'title'=> "Get Details For Your Tasks",
      ],
      [
        'icon'=> "mdi-numeric-5-circle-outline",
        'link'=> "resources",
        'title'=> "View Resources To Help You Learn",
      ],
      [
        'icon'=> "mdi-numeric-6-circle-outline",
        'link'=> "resources",
        'title'=> "Submit Your Work On This Page",
      ],
    ];

        LiveSession::create([
            'program_id'=>1,
            'intro' => $desc_l,
            'agenda' => $agenda,
            'anchors' => json_encode($anchors)
        ]);

        LiveSession::create([
            'program_id' => 2,
            'intro' => $desc_l,
            'agenda' => $agenda,
            'anchors' => json_encode($anchors)
        ]);
        
    }
}
