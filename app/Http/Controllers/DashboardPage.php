<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPage extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'horizontal', 'displayCustomizer' => false, 'myTheme' => 'theme-default'];
    return view('dashboard', compact('pageConfigs'));
  }
}
