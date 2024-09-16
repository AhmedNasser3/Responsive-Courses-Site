<?php

namespace App\Http\Controllers\Admin\Hero;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubSubCategory;
use Illuminate\Foundation\Auth\User;

class HeroController extends Controller
{
    public function dashboard(){
        $user = User::get();
        $countUsers = User::count();
        $hero = Hero::all();
        $courses = SubSubCategory::all();
        return view('Admin.dash.dash', compact('hero', 'user','countUsers', 'courses'));
    }
    public function index(){
        $hero_index = Hero::all();
        return view ('Admin.Hero.hero_index', compact('hero_index'));
    }
    public function create (){
        return view('Admin.Hero.hero_create');
    }
    public function store(Request $request){
        $hero_data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $hero_index = Hero::create($hero_data);
        return redirect(route('hero.index'));
    }

    public function edit(Hero $hero){
        return view('Admin.Hero.hero_edit',compact('hero'));
    }

    public function Update(Request $request,Hero $hero){
        $hero_data = $request->all();
        $hero->Update($hero_data);
        return redirect()->route('hero.index')->with('success', 'Product created successfully');
    }

    public function delete(Hero $hero){
        $hero->delete();
        return redirect(route('hero.index'));
    }
}
