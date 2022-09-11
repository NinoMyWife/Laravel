<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CreateFeeLists;
use App\Models\LinesFeeOutPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExtraFeesController extends Controller
{
    use CreateFeeLists;

    public function display(){
        $this->createFeeLists();
        $month = DB::table('lines_fee_out_packages')->select(DB::raw("DATE_FORMAT(date, '%M') as month_fees"))
        ->where('lines_fee_out_packages.user_id', auth()->user()->id)
        ->groupBy('month_fees')
        ->get();
        $linesfeeoutpackages =  auth()->user()->linesfeeoutpackages;
        if (!request("selectedmonth")){
            $linesfeeoutpackages = collect();
        }
        else {
            $linesfeeoutpackages =  auth()->user()->linesfeeoutpackages()->whereMonth('date', request("selectedmonth"))->get();
        }
        return view('extrafees', compact('linesfeeoutpackages', 'month'));
    }

    public function store(Request $request){
        $request->validate([
            'date' => 'before:tomorrow',
            'amount' => 'numeric'
        ]);
        $path =  $request->file('path')->store('attachements');
        auth()->user()->linesfeeoutpackages()->create([
            'label' => $request->label,
            'amount' => $request->amount,
            'date' => $request->date,
            'path' => $path
        ]);
    return redirect()->back();
    }

    public function download(LinesFeeOutPackage $linesfeeoutpackage){
        return Storage::download($linesfeeoutpackage->path);
    }
}
