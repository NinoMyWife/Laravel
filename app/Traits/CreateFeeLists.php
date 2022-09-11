<?php

namespace App\Traits;

trait CreateFeeLists
{
    public function createFeeLists()
    {
        //if (!auth()->user()->feelists()->exists()) {
            $fee_list = auth()->user()->feelists()->create([
                'date' => now(),
                'state_id' => 2
            ]);

            for ($i=1; $i <= 4; $i++) { 
                $fee_list->linesFeePackages()->create([
                    'quantity'=> 0,
                    'fee_package_id' => $i
                ]);
            }
        // } else {
        //     $fee_list = auth()->user()->feelists()->whereMonth('date', '03')->first();
        //     // $fee_list = auth()->user()->feelists()->whereMonth('date', '03')->get(); pour historique des fiches frais.
        //     $linesFeePackages = $fee_list->linesFeePackages; 
        //     // dd($fee_list);
        // }

        return $fee_list->linesFeePackages;
    }
}