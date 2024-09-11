<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;


class UvoloxController extends Controller
{
    public function dashboard(){
        $category = Category::all();
        $subcategory = SubCategory::all();
        $user = User::count();
        $hero_menu = Hero::all();
        return view('FrontEnd.HERO.hero', compact('hero_menu','user','category','subcategory'));
    }

}
