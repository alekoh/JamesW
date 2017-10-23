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
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\File;
use PhpParser\Comment\Doc;
use Intervention\Image\Facades\Image;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $user = Auth::user();
        $id = Auth::user()->id;
        $documents = Document::all();
        $demands = Demand::all();


        $documents_approved = [];
        $documents_declined = [];
        $documents_review = [];

        foreach ($documents as $document) {
            if($document->company_id == $id){
                if ($document->status == 1) {
                    array_push($documents_approved, $document);
                } else if ($document->status == -1) {
                    array_push($documents_declined, $document);
                } else if ($document->status == 0) {
                    array_push($documents_review, $document);
                }
            }
        }

        return view('company.home', ['user'=>$user,'documents_approved' => $documents_approved, 'documents_declined' => $documents_declined, 'documents_review' => $documents_review, 'demands' => $demands,'documents'=>$documents]);
    }

    public function getInfo(){

        $user = Auth::user();
//
        return view('company.profile',['user'=>$user]);

    }

    public function uploadPhoto(Request $request){

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            $path = 'uploads/avatars/'.$filename;

            Image::make($avatar->getRealPath())->resize(250,300)->save($path);
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return redirect('company/profile');
    }

    /*public function deletePhoto()
    {
        $user = Auth::user();
        $id = Auth::user()->id;
        $image_path = Auth::user()->image_path;
        /*$ = app_path("uploads/avatars/.{$image->avatar}");*/

        /*if (\File::exists($image_path)) {
            \File::delete($image_path);
            unlink($image_path);

        }else{
            dd('File does not exists.');
        }

        $user->save();
        return redirect('company/profile');*/
    /*}*/

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

        $allDocuments = Document::all();
        $myDocuments = [];

        $id = Auth::user()->id;

        foreach ($allDocuments as $document){
            if($document->company_id == $id ){
                array_push($myDocuments,$document);
            }
        }

        return view('company.documents.submits',['myDocuments'=>$allDocuments]);
    }
    /*list all the requests for the given company*/
    public function listMyRequests(){
        $allRequests = Demand::all();
        $id = Auth::user()->id;
        $myRequests = [];
        foreach ($allRequests as $myRequest){
            if($myRequest->company_id == $id){
                array_push($myRequests,$myRequest);
            }
        }
        return view('company.requests.company-requests',['myRequests'=>$myRequests]);
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

        $id = Auth::user()->id;

        $deniedDocuments = \DB::table('documents')->where('company_id','=',$id)->where('status','=',-1)->get();

        return view('company.documents.deniedDocuments',['deniedDocuments'=>$deniedDocuments]);
    }
    public function getAccepted(){

        $id = Auth::user()->id;

        $acceptedDocuments = \DB::table('documents')->where('company_id','=',$id)->where('status','=',1)->get();

        return view('company.documents.acceptedDocuments',['acceptedDocuments'=>$acceptedDocuments]);
    }

    /*return company name*/
    public static function getNameCompany(){

        return Auth::user()->name;

    }
}
