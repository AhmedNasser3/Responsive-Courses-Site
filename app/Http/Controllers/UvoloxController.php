<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;


class UvoloxController extends Controller
{
    public function dashboard(){
        $category = Category::all();
        $subcategory = SubCategory::all();
        $user = User::count();
        $hero_menu = Hero::all();
        $courses = SubSubCategory::count();
        return view('FrontEnd.HERO.hero', compact('hero_menu','user','category','subcategory','courses'));
    }

}
