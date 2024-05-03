<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Temperature;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    //bikin 2 hal
    // 1. Method untuk menampilkan data
    // 1. Method untuk menyimpan data

    function index()
    { //nama function bebas
        $temperatures = Temperature::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'List data temperatures',
            'data' => $temperatures
        ]);
    }

    public function store(Request $request)
    {
        $value = $request->input('value');
        $temperatures = Temperature::create([
            'value' => $value
        ]);
        // $temperatures = new Temperature();
        // $temperatures->value = $value;
        // $temperatures->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Data temperature berhasil disimpan',
            'data' => $temperatures
        ]);
    }
}
