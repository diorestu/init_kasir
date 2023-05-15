<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePage extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'horizontal', 'displayCustomizer' => false];
    return view('content.pages.pages-home', compact('pageConfigs'));
  }
}
