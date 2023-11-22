<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class Form extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kodeBarang = $request-> kodeBarang;
        $namaBarang = $request-> namaBarang;
        $jenisBarang = $request-> jenisBarang;
        $qty = $request->qty;
        $harga = $request-> harga;
        $total= $qty*$harga;
        $diskon = 0;
        $totalterbaru = $total;

        if($total >= 100000 && $total < 200000){
            $diskon = $total * 0.1;
            $totalterbaru = $total - $diskon;
        }else if($total >= 200000 && $total < 500000){
            $diskon = $total * 0.2;
            $totalterbaru = $total - $diskon;
        }else if($total >= 500000){
            $diskon = $total * 0.5;
            $totalterbaru = $total - $diskon;
        }

        echo"             OUTPUT               <br>";
        echo"================================== <br>";
        echo"Product Code :" .$kodeBarang ."<br>";
        echo"Product Name :" .$namaBarang ."<br>";
        echo"Product Type :" .$jenisBarang ."<br>";
        echo"QTY          :" .$qty ."<br>";
        echo"Price        :" .$harga ."<br>";
        echo"================================== <br>";
        echo"Total        :" .$total ."<br>";
        echo"Discount     :" .$diskon ."<br>";
        echo"TOTAL        :" .$totalterbaru ."<br>";


        Barang::create([
            'Kode_Barang' => $request-> kodeBarang,
            'Nama_Barang'=> $request-> namaBarang,
            'Jenis_Barang' => $request-> jenisBarang,
            'QTY' => $request-> qty,
            'Harga' => $request-> harga,
            'Total' => $total,
            'Diskon' => $diskon,
            'Total_Terbaru' => $totalterbaru
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
