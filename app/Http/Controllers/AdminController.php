<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Document;

class AdminController extends BaseController
{

    /*public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.home');
    }*/
    public function listDocuments(){
      $documents = Document::all();
        $companies = User::all();
      return view('admin.home',['documents'=>$documents],['companies'=>$companies]);

    }
    public static function getName($company_id){
        $company= User::find($company_id);
        return $company->name;
    }
    public function requestForm(){
        return view('requestForm');
    }

}
