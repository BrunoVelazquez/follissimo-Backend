<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }
}
