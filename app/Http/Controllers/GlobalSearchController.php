<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $keyword = $request->input('keywords');
        // $resultsArray = [];
        // if ($keywords) {
        //     foreach ($this->_includedModels as $model) {
        //         $aKeywords = explode(' ', $keywords);
        //         $fullPath = "App\\".$model;
        //         $query = $fullPath::where('name', 'like', '%'. $keywords .'%');
        //         // $query = $fullPath::where('name', 'like', '%'. $aKeywords[0] .'%');
        //         // unset($aKeywords[0]);
        //         // foreach ($aKeywords as $keyword) {
        //         //     $query->orWhere('name', 'like', '%'. $keyword .'%');
        //         // }
        //         $resultsArray[$model] = $query->get()->toArray();
        //     }
        // }
        $hours = 2;
        $seconds = $hours * 60 * 60;
        $data = Cache::store('redis')->remember('dspace_items', $seconds, function () {
            $json = file_get_contents("https://biblioteca.fisioaleph.com/rest/items");
            return json_decode($json);
        });
        $results = collect($data)->filter( function ($item) use ($keyword) {
            if (property_exists($item, 'name')){
                $name = $item->name;
                $name = strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($name, ENT_QUOTES, 'UTF-8'))), ' '));
                $keyword = strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($keyword, ENT_QUOTES, 'UTF-8'))), ' '));
                return str_contains(($name), ($keyword));
            }
            return false;
        });
        return view('global_search.index')->with('resultsArray', $results);
    }
}