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

        public function Loan_Asset()
    {
        return view('Loan_Asset');
    }

        public function Pre_Asset_Recognition()
    {
        return view('Pre_Asset_Recognition');
    }

          public function My_Approval_Queue()
    {
        return view('My_Approval_Queue');
    }

             public function Reports()
    {
        return view('Reports');
    }


    public function dashboard()
    {
        return view('dashboard');
    }
}
