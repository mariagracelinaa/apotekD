<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;

//untuk pakai DB
use DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //isinya untuk mengambil data dari tabel medicine di database lalu ditamplkan
        //raw query
        //$result = DB::select(DB::raw("SELECT * FROM medicines"));
        
        //query builder
        //$result = DB::table("medicines")->get();
        
        //eloquent model
        $result = Medicine::all();
        

        //return data dari db ke view yang sdh dibuat
        return view('medicine.index', compact('result'));

        //Tugas Week 5
        // $result = DB::table('medicines')
        //         ->select('generic_name', 'restriction_formula', 'price') 
        //         ->get();

        // $result = DB::table('medicines')
	    //         ->join('categories','medicines.category_id','=', 'categories.id')
	    //         ->select('medicines.generic_name' , 'medicines.form' , 'categories.name')
        //         ->get();


        // $result=Medicine::distinct('category_id')
        //         ->count();

        // $result=Medicine:: join('categories', 'categories.id', '=', 'medicines.category_id')
        //         ->select('generic_name', 'form', 'categories.name')
        //         ->get();

        // $result = Medicine::select('generic_name')
        //         ->groupBy ('generic_name')
        //         ->havingRaw("count('form') = ?", [1])
        //         ->get();


        // $max = Medicine::max('price');
        // $result = Medicine::select('categories.name','medicines.generic_name')
        //         ->join('categories','categories.id','=', 'medicines.category_id')
        //         ->where('medicines.price','=',$max)
        //         ->get();
                
        // dd($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //dd($medicine);
        $data = $medicine;
        return view("medicine.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }

    public function obatMahal(){
        $result = 'halo';
        dd($result);
    }

    public function coba1(){
        //query builder filter
        $result = DB::table('medicines')
            -> where('price','>',20000)
            -> get();

        $result = DB::table('medicines')
            -> where('generic_name','like','%fen')
            -> get();

        //groupny
        $result = DB::table('medicines')
            -> select('generic_name')
            -> groupBy('generic_name')
            -> get();
        
        //Aggregate
        $result = DB::table('medicines')->count();
        $result = DB::table('medicines')->max('price');

        //filter + aggregate
        $result = DB::table('medicines')
            -> where('generic_name','like','%fen')
            -> avg('price');

        //join medicines dengan categories + sort
        $result = DB::table('medicines')
            -> join('categories','medicines.category_id','categories.id')
            -> orderBy('price', 'desc')
            -> get();

        //eloquen
        $result = Medicine::where('price','>',20000)
            -> get();

        //medicies dgn id = 3
        $result = Medicine::find(3);

        //take(10) => ambil data 10 teratas
        dd($result);
    }
}
