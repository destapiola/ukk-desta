<?php

namespace App\Controllers;
use App\Models\M_desta;
use CodeIgniter\Database\Config;

class Home extends BaseController
{
    public function diskon()   
    {
        echo view('header');
        echo view('menu'); 
        echo view('diskon'); 
    }




}
