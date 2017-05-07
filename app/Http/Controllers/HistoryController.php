<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Mockery\Exception;

class HistoryController extends Controller
{
    public function index()
    {
        return History::all(['id', 'source', 'result']);
    }

    public function store(Request $request)
    {
        try{
            $history = new History;
            $history->source = $request->get("source");
            $history->result = $request->get("result");
            $history->save();
        }catch(Exception $ex){
            return ['isSuccess' => false];
        }
        return ['isSuccess' => true, 'history' => $history];
    }

    public function destroy(Request $request, $id)
    {
        try{
            History::destroy($id);
        }catch(Exception $ex){
            return ['isSuccess' => false];
        }
        return ['isSuccess' => true];
    }
}
