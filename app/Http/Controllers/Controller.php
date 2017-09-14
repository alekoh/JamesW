<?php

namespace App\Http\Controllers;

use App\Demand;
use App\Document;
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

        return view('company.home', ['documents_approved' => $documents_approved, 'documents_declined' => $documents_declined, 'documents_review' => $documents_review, 'demands' => $demands]);
    }

    public function createDocument(){
        return view('company.documents.create');
    }

    public function storeDocument(Request $request){

        $company_id = $this->get('id');

        $request->validate([
            'document_name' => 'required',
            'document_value' => 'required',
            'document_description' => 'min:15'
        ]);

        $newDocument = new Document();
        $newDocument->company_id = $company_id;
        $newDocument->name = $request->input('document_name');
        $newDocument->value = $request->input('document_value');

        $newDocument->save();
    }
}
