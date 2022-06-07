<?php

namespace App\Http\Controllers;

use App\Exercise;
use Storage;
use App\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DSpaceMetadataController extends Controller
{
  public function index () {
    
  }

  public function create (Request $request) {
    return view('dspace_metadata.create');
  }
  public function store (Request $request) {
    $collectionId = $request->input('collection_id');
    if (($csvFile = $request->file('csv_file')) && $collectionId) {
      $destinationPath = resource_path('dspace/Zotero-to-DSpace');
      $filename = "tmp_zotero_file.csv";
      $csvFile->move($destinationPath, $filename);
      exec("cd $destinationPath && python3 convert.py -i $filename  -o dspace_items.csv -hdl $collectionId");
      return response()->download(resource_path("dspace/Zotero-to-DSpace/dspace_items.csv"));
    }
  }

}

