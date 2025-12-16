<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

     public function OR()
    {
        return view('OR');
    }
      public function Bulk_Upload()
    {
        return view('Bulk_Upload');
    }
        public function Location_Transfer()
    {
        return view('Location_Transfer');
    }

        public function Asset_Replacement()
    {
        return view('Asset_Replacement');
    }

         public function Asset_Disposal()
    {
        return view('Asset_Disposal');
    }


    public function dashboard()
    {
        return view('dashboard');
    }
}
