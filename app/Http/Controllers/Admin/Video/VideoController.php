<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        $video = Video::all();
        return view('Admin.video.index', compact('video'));
    }

    public function create(){
        return view('Admin.video.create');
    }

    public function update(Request $request){


        return view('Admin.video.update');
    }
}
