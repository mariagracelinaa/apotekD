<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Supplier::all();
        // dd($result);
        return view('supplier.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Tampilan form untuk menambah data baru
        //Week 9
        return view('supplier.create');

        //cth buat pr week 9
        // $categories = Category::all();
        // return view('supplier.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan data baru ke database
        //menangkap value dari create
        $data = new Supplier();
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->save();
        // dd($data);

        //redirect untuk sekaligus menampilkan pesan
        return redirect()->route('suppliers.index')->with('status','Data baru berhasil disimpan');
        // return redirect()->action('SupplierController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //Menampilkan detail
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //Mengedit data
        //persiapan datanya yang diedit
        // dd($supplier);
        $data = $supplier;
        return view('supplier.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //Menyimpan data setelah edit ke dalam database
        // Week 11 -> Edit supplier

        // Coba
        // dd($request);
        $supplier->name = $request->get('name');
        $supplier->address = $request->get('address');
        $supplier->save();
        return redirect()->route('suppliers.index')->with('status', 'Data supplier berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // Week 12
        $this->authorize('delete-permission', $supplier);
        
        // Week 11 -> Hapus data
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('status','data berhasil dihapus');
    }

    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        return response()->json(array(
            'status'=>'OK',
            'msg'=>view('supplier.getEditForm', compact('data'))->render()
        ), 200);
    }

    public function getEditForm2(Request $request)
    {
        $id=$request->get('id');
        $data=Supplier::find($id);
        return response()->json(array(
            'status'=>'OK',
            'msg'=>view('supplier.getEditForm2',compact('data'))->render()
        ),200);
    }

    public function deleteData(Request $request){
        $id = $request->get('id');
        $supplier = Supplier::find($id);
        $supplier->delete();
        return response()->json(array(
            'status'=>'OK',
            'msg'=>"Berhasil menghapus data"
        ), 200);
    }

    public function saveData(Request $request)
    {
        $id=$request->get('id');
        $supplier=Supplier::find($id);
        $supplier->name=$request->get('name');
        $supplier->address=$request->get('address');
        $supplier->save();
        return response()->json(array(
            'status'=>'OK',
            'msg'=>'berhasil mengubah data'
        ),200);
    }
}
