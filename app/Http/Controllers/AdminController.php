<?php

namespace App\Http\Controllers;
use App\Demand;
use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Document;

class AdminController extends BaseController
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $documents = Document::all();
        $companies = User::all();
        $demands = Demand::all();
        return view('admin.home',compact('documents','companies','demands'));

    }
    public function listDocuments(){
        $documents = Document::all();
        return view('admin.listDocuments',['documents'=>$documents]);
    }
    public function listCompanies(){
        $companies = User::all();
        return view('admin.listCompanies',['companies'=>$companies]);
    }
    public function listDemands(){
        $demands = Demand::all();
        return view('admin.listRequests',['demands'=>$demands]);
    }
    public function getPending(){
        $documents = Document::all();
        $pendingDocuments = [];
        foreach ($documents as $pendingDoc){
            if($pendingDoc->status==0){
                array_push($pendingDocuments,$pendingDoc);
            }
        }
        return view('admin.pendingDocuments',['pendingDocuments'=>$pendingDocuments]);
    }
    public function getDenied(){
        $documents = Document::all();
        $deniedDocuments = [];
        foreach ($documents as $deniedDoc){
            if($deniedDoc->status==-1){
                array_push($deniedDocuments,$deniedDoc);
            }
        }
        return view('admin.deniedDocuments',['deniedDocuments'=>$deniedDocuments]);
    }
    public function getAccepted(){
        $documents = Document::all();
        $acceptedDocuments = [];
        foreach ($documents as $document) {
            if($document->status==1){
                array_push($acceptedDocuments,$document);
            }
        }
        return view('admin.acceptedDocuments',['acceptedDocuments'=>$acceptedDocuments]);
    }
    /*get the Name from the company as a foreign key*/
    public static function getName($company_id){
        $company= User::find($company_id);
        return $company->name;
    }

    /*Demands CRUD operations*/
    public function create(){
        $companies = User::all();
        return view('admin.requestForm')->with('companies',$companies);
    }

    public function store(Request $request){
        $newDemand =  new Demand();
        $newDemand->company_id = $request->input('company_id');
        $newDemand->admin_id = $request->input('admin_id');
        $newDemand->value = $request->input('value');


        $newDemand->save();
        return redirect('admin/dashboard');
    }

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
