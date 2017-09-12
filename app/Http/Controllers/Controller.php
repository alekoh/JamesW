<?php

namespace App\Http\Controllers;

use App\Demand;
use App\Document;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $documents = Document::all()->orderBy('date', 'desc');
        $demands = Demand::all()->where('status', 'active')->orderBy('date', 'asc');

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

        return view('company.home');
    }
}
