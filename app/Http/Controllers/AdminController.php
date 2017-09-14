<?php

namespace App\Http\Controllers;
use App\Demand;
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
    public function index(){
      $documents = Document::all();
        $companies = User::all();
       $demands = Demand::all();
      return view('admin.home',compact('documents','companies','demands'));

    }
    public static function getName($company_id){
        $company= User::find($company_id);
        return $company->name;
    }
  /*  public function create(){
        return view('requestForm');
    }
    public function store(Request $request){
        $newDemand =  new Demand();
        $newDemand->company_id = $request->input('company_id');
        $newDemand->admin_id = $request->input('admin_id');
        $newDemand->value = $request->input('value');


        $newDemand->save();
        return redirect('home');
    }*/

    /*public function edit($id){
        $demand = Demand::find($id);
        return view('/requestForm')->with('demand',$demand);
    }

    public function update(Request $request, $id){
        Demand::find($id)->update($request->all());
        return redirect('home');
    }
    public function destroy($id){
        Demand::find($id)->delete();
        return redirect('home');
    }*/
}
