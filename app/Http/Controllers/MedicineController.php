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
        $sub = Medicine::join('categories','categories.id','=','medicines.category_id')
                ->select('categories.name', DB::raw('MAX(medicines.price) as maxprice'))
                ->groupBy('medicines.category_id', 'categories.name');
    
        $result = Medicine::joinSub($sub, 'sub', function($join){
                    $join->on('medicines.price','=','sub.maxprice');
                })->get();
        
        // $sub1 = Medicine::select('medicines.generic_name', DB::raw('MAX(medicines.price) AS maxprice'))
        //         ->join('categories' ,'categories.id','=','medicines.category_id')
        //         ->groupBy('medicines.generic_name', 'categories.name')
        //         ->get();

        // $sub2 =  Medicine::select('medicines.category_id',  DB::raw('MAX(medicines.price) AS maxprice'))
        //         ->join('categories' ,'categories.id','=','medicines.category_id')
        //         ->groupBy('medicines.category_id')
        //         ->get();

        // $result = DB::raw("SELECT b.category_id, a.name, a.generic_name, MAX(a.maxprice) AS maxprice FROM (SELECT medicines.generic_name, categories.name, MAX(medicines.price) AS maxprice FROM medicines INNER JOIN categories on categories.id = medicines.category_id GROUP BY medicines.generic_name, categories.name) AS a INNER JOIN (SELECT medicines.category_id, MAX(medicines.price) AS maxprice FROM medicines INNER JOIN categories on categories.id = medicines.category_id GROUP BY medicines.category_id) as b ON a.maxprice = b.maxprice WHERE a.maxprice = b.maxprice GROUP BY a.generic_name ORDER BY b.category_id");
        // dd($result);
        return view('medicine.termahal', compact('result'));
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
