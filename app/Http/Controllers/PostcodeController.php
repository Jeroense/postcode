<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\PostcodeApi;
use App\Postcode;
use Carbon\Carbon;

class PostcodeController extends Controller
{
    use PostcodeApi;

    public function index() {
        return view('index');
    }

    public function seedPostcode() {
        // $counter = 1;       // production setting
        $counter = 287;     // development setting
        ini_set('max_execution_time', 600);
        for ($i = 1000; $i < 10000; $i += $counter) {
            $newPostcode = new Postcode();
            $newPostcode->postcode = $i;
            $newPostcode->save();
            usleep(1100000);
        }
        return redirect()->route('home');
    }

    public function findPostcode(Request $request) {
        $lastUpdated = Postcode::orderBy('updated_at', 'asc')->first();
        try {
            $provinceCode = $this->getprovinceCode($lastUpdated->postcode);
            $postcodeToUpdate = Postcode::find($lastUpdated->id);
            $postcodeToUpdate->provinceCode = $provinceCode;
            $postcodeToUpdate->updated_at = Carbon::now();
            $postcodeToUpdate->save();

            $msg = [$lastUpdated->postcode, $provinceCode];
            return response()->json($msg, 201);
        }
        catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
