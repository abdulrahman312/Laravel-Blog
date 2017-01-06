<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class PagesController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPost($posts);

    }

    public function getAbout() {
        $first = 'Abdul Rahman';
        $last = 'Khan';

        $fullname = $first .  " " . $last;
        $email = 'abdulrahman312@yahoo.com';
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withData($data);

    }

    public function getContact() {
        return view('pages.contact');
    }
}
