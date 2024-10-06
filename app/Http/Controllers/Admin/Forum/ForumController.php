<?php

namespace App\Http\Controllers\Admin\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function view(){}
    public function index(){
        return view('Admin.forum.index');
    }
    public function create(){}
    public function save(){}
    public function edit(){}
    public function update(){}
    public function delete(){}
}
