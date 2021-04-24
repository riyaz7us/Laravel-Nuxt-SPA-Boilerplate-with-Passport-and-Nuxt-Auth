<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoStream;

class ZoomController extends Controller
{
    public function generate_signature($meeting_number)
    {

        $api_key = "lSTa_G9XQyW4zEVjj7Nd9Q";
        $api_secret = "qT25Zzhh35FGH6EGng61fDHgdep1ujvR78Yy";
        $role = 0;
        //Set the timezone to UTC
        date_default_timezone_set("UTC");

        $time = time() * 1000 - 30000; //time in milliseconds (or close enough)

        $data = base64_encode($api_key . $meeting_number . $time . $role);

        $hash = hash_hmac('sha256', $data, $api_secret, true);

        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);

        //return signature, url safe base64 encoded
        $finalSignature = rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
        return response()->json($finalSignature, 200);
    }

    public function streamVideo()
    {
        $video_path = base_path() . '/public/storage/coi_ad_vid30_sep1w.mp4';
        $stream = new \App\VideoStream($video_path);
        $stream->start();
    }

    public function uploadVideo(Request $request)
    {

        $path = $request->file('video')->store($request->path, ['disk' => 'public']);
        //$path = putFileAs($request->file('file'), new File('storelogos'));
        return response()->json(['video' => $path], 201);
    }
}
