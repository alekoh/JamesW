<?php

namespace App\Http\Controllers;

use DB;
use App\Demand;
use App\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        return view('admin.documents.listDocuments',['documents'=>$documents]);
    }
    public function listCompanies(){
        $companies = User::all();
        return view('admin.companies.listCompanies',['companies'=>$companies]);
    }
    public function listDemands(){
        $demands = Demand::all();
        return view('admin.requests.listRequests',['demands'=>$demands]);
    }
    public function getPending(){
        $pendingDocuments = \DB::table('documents')->where('status','=',0)->get();

        return view('admin.documents.pendingDocuments',['pendingDocuments'=>$pendingDocuments]);
    }
    public function getDenied(){

        $deniedDocuments = \DB::table('documents')->where('status','=',-1)->get();
        return view('admin.documents.deniedDocuments',['deniedDocuments'=>$deniedDocuments]);
    }
    public function getAccepted(){
        $acceptedDocuments = \DB::table('documents')->where('status','=',1)->get();

        return view('admin.documents.acceptedDocuments',['acceptedDocuments'=>$acceptedDocuments]);
    }

    /*get the Name from the company as a foreign key*/
    public static function getName($company_id){
        $company= User::find($company_id);
        return $company->name;
    }

    /*Demands CRUD operations*/
    public function create(){
        $companies = User::all();
        return view('admin.requests.requestForm')->with('companies',$companies);
    }

    public function store(Request $request){
        $newDemand =  new Demand();
        $newDemand->company_id = $request->input('company_id');
        $newDemand->admin_id = $request->input('admin_id');
        $newDemand->value = $request->input('value');


        $newDemand->save();
        return redirect('admin/requests/listRequests');
    }
    public function edit($id){
        $demand = Demand::find($id);
        return view('requestForm')->with('demand',$demand);
    }

    public function update(Request $request, $id){
        Demand::find($id)->update($request->all());
        return redirect('home');
    }
    public function destroy($id){
        Demand::find($id)->delete();

        return redirect('admin/requests/listRequests');
    }


    /*Company CRUD operations*/

    public function createCompany(){
        return view('admin.companies.addCompany');
    }
    public function storeCompany(Request $request){
        $newCompany = new User();

        $newCompanyEmail = $request->input('company_email');

        $newCompany->name = $request->input('company_name');
        $newCompany->email = $request->input('company_email');
        $newCompany->password = $request->input('company_password');

        User::create([
            'name' => $request->input('company_name'),
            'email' => $request->input('company_email'),
            'password' => bcrypt($request->input('company_password')),
        ]);

        Mail::send('email', ['email' => $newCompanyEmail], function ($m) use ($newCompanyEmail) {
            $m->from('alek.oh@hotmail.com', 'Contentifly');

            $m->to($newCompanyEmail)->subject('Reminder for new profile!');
        });

        return redirect('admin/companies/listCompanies');
    }
    /*public function editCompany($id){
        $company = User::find($id);
        return view('/addCompany')->with('company',$company);
    }

    public function update(Request $request, $id){
        User::find($id)->update($request->all());
        return redirect('home');
    }
    public function destroy($id){
        User::find($id)->delete();
        return redirect('home');
    }*/

    /*count the pending documents*/
    public static function getSumPending() {

        $countPending = \DB::table('documents')->where('status','=',0)->count('id');

        return $countPending;
    }
    /*count the denied documents*/
    public static function getSumDenied(){
        $countDenied = \DB::table('documents')->where('status','=',-1)->count('id');

        return $countDenied;
    }
    /*count the accepted documents*/
    public static function getSumAccepted(){

        $countAccepted = \DB::table('documents')->where('status','=',1)->count('id');

        return $countAccepted;
    }
    /*find the current logged in admin*/
    public static function getNameAdmin(){

        dd(auth()->user());

       return Auth::user()->name;

    }
}
