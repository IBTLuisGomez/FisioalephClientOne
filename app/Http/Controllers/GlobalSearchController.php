<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalSearchController extends CRUDController
{
    private $_includedModels = [
        'ProtocoloFisioterapia',
        'DiagnosisPlan',
        'TerapeuticPlan',
        'HomePhysiotherapyProgram',
        // 'ProtocoloFisioterapiaLMG'
    ];
    public function index(Request $request) {
        $keywords = $request->input('keywords');
        $resultsArray = [];
        if ($keywords) {
            foreach ($this->_includedModels as $model) {
                $aKeywords = explode(' ', $keywords);
                $fullPath = "App\\".$model;
                $query = $fullPath::where('name', 'like', '%'. $keywords .'%');
                // $query = $fullPath::where('name', 'like', '%'. $aKeywords[0] .'%');
                // unset($aKeywords[0]);
                // foreach ($aKeywords as $keyword) {
                //     $query->orWhere('name', 'like', '%'. $keyword .'%');
                // }
                $resultsArray[$model] = $query->get()->toArray();
            }
        }
        return view('global_search.index')->with('resultsArray', $resultsArray);
    }
}
