<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CreateFeeLists;
use App\Models\LinesFeePackage;

class FeelistsController extends Controller
{
    use CreateFeeLists;

    public function display(){
        
        $linesFeePackages = $this->createFeeLists();

        return view('feelists', compact('linesFeePackages'));
    }

    public function store(Request $request){
        // dd($request->all());
        foreach ($request->feePackage as $key => $value){
            // dump($key, $value);
            $linefeepackage = LinesFeePackage::find($key);
            $linefeepackage->update(['quantity'=>$value]);
            $linefeepackage->save;
        }
    return redirect()->back();
    }
}
