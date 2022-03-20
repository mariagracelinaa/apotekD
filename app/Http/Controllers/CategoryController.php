<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result = DB::table("categories")->get();
        $result = Category::all();
       
        return view('categories.index', compact('result')); 
        
        //Tugas Week 5
        //$result = DB::table('medicines')->distinct()->count('category_id');
        // $result = DB::table('categories')
        //         ->select('name')
        //         ->whereNotIn('id', function($a){
        //             $a->distinct()->select('category_id')->from('medicines');
        //         })
        //         ->get();

        // $result = DB::table('categories')
        //         ->select('categories.id', 'categories.name', DB::raw('IFNULL(AVG(medicines.price), 0)'))
        //         ->leftJoin('medicines','categories.id','=','medicines.category_id')
        //         ->groupBy('categories.id', 'categories.name')
        //         ->orderBy('categories.id')
        //         ->get();

        // $max = DB::table('medicines')->max('price');
        // $result = DB::table('medicines')
        //         ->select('categories.name','medicines.generic_name')
        //         ->join('categories','categories.id','=', 'medicines.category_id')
        //         ->where('medicines.price','=',$max)
        //         ->get();

        // $result=DB::table("medicines")
        //     ->distinct()
        //     ->count('category_id');

        // $result=Category::select('name')->whereNotIn('id',function($query){
        //     $query->distinct()->select('category_id')->from('medicines');
        // })
	    // ->get();

        // $result = DB::table('medicines')
        //         ->select('generic_name')
        //         ->groupBy ('generic_name')
        //         ->havingRaw("count('form') = ?", [1])
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function showlist($id_category){
        //ambil data kategori berdasarkan id kategori
        $data = Category::find($id_category);

        //nama kategory
        $namecategory = $data->name;

        $result = $data->medicines;

        if($result)
            $getTotalData = $result->count();
        else  
            $getTotalData = 0;  

        return view('report.list_medicines_by_category', compact('id_category','namecategory','result','getTotalData'));
    }

    
}
