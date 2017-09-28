<?php

namespace App\Http\Controllers;

use DB;
use App\Demand;
use App\Document;
use App\Admin;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $documents = Document::all();
        $demands = Demand::all();

        $documents_approved = [];
        $documents_declined = [];
        $documents_review = [];

        foreach ($documents as $document) {
            if ($document->status == 1) {
                array_push($documents_approved, $document);
            } else if ($document->status == -1) {
                array_push($documents_declined, $document);
            } else if ($document->status == 0) {
                array_push($documents_review, $document);
            }
        }

        return view('company.home', ['documents_approved' => $documents_approved, 'documents_declined' => $documents_declined, 'documents_review' => $documents_review, 'demands' => $demands,'documents'=>$documents]);
    }

    public function createDocument(){
        return view('company.documents.create');
    }

    public function storeDocument(Request $request){

        $company_id = Auth::user()->id;

        $file = $request->file('blob_value');
        $content = $file->openFile()->fread($file->getSize());

//        $request->validate([
//            'document_name' => 'required',
//            'document_value' => 'required',
//            'document_description' => 'min:15'
//        ]);

        $newDocument = new Document();
        $newDocument->company_id = $company_id;
        $newDocument->name = $request->input('document_name');
        $newDocument->value = $request->input('document_value');
        $newDocument->blob_value = $content;
        $newDocument->size = $file->getSize();

        $newDocument->save();

        return redirect('company/home');
    }
    /*list all the documents from the given company*/
    public function listMyDocuments(){


        /* $my_id = User::find($id);*/
        $allDocuments = Document::all();

        //todo: Sort the documents according to their status
        $myDocuments = [];
        foreach ($allDocuments as $document){
            if($document->company_id == 1 ){
                array_push($myDocuments,$document);
            }
        }

        return view('company.documents.submits',['myDocuments'=>$allDocuments]);
    }
    /*list all the requests for the given company*/
    public function listMyRequests(){
        $allRequests = Demand::all();
        $myRequests = [];
        foreach ($allRequests as $myRequest){
            if($myRequest->company_id == 1){
                array_push($myRequests,$myRequest);
            }
        }
        return view('company.company-requests',['myRequests'=>$myRequests]);
    }
    /*get the Name from the company as a foreign key*/
    public static function getAdminName($admin_id){
        $admin= Admin::find($admin_id);
        return $admin->name;
    }

    /*document preview*/
    /*public function documentPreview(Request $request,$id){
       $document = Document::find($id);
       $documentName = $request->file('blob_value');
       /*$documentValue = Document::find($id)->get('value');*/

       /* return view('company.documentPreview',['documentName'=>$documentName]);*/
    /*}*/

    public function getPending(){

        $id = Auth::user()->id;

        $pendingDocuments = \DB::table('documents')->where('company_id','=',$id)->where('status','=',0)->get();

        return view('company.documents.pendingDocuments',['pendingDocuments'=>$pendingDocuments]);
    }
    public function getDenied(){

        $deniedDocuments = \DB::table('documents')->where('status','=',-1)->get();

        return view('company.documents.deniedDocuments',['deniedDocuments'=>$deniedDocuments]);
    }
    public function getAccepted(){
        $acceptedDocuments = \DB::table('documents')->where('status','=',1)->get();

        return view('company.documents.acceptedDocuments',['acceptedDocuments'=>$acceptedDocuments]);
    }
}
