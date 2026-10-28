<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu';
        $featured = 
           $featured = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar', 'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar', 'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
    
    // data baru
    [
        'code' => 'UI-01', 
        'name' => 'UI Web Dasar', 
        'fee' => 150000, 
        'quota' => 20, 
        'registered' => 5, 
        'start_date' => '2026-10-05'
    ],
];
        

        return view('home', compact('siteName', 'featured'));
    }
}