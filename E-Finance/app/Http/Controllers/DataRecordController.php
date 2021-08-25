<?php

namespace App\Http\Controllers;

use App\DataRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataRecordRequest;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DataRecord::with(['sub_category'])->get();

        return view('pages.data-record.index' , [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_categories = SubCategory::all();
        return view('pages.data-record.create',[ 
            'sub_categories' => $sub_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataRecordRequest $request)
    {
        $data = $request->all();

        DataRecord::create($data);

        return redirect()->route('data-record.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DataRecord::findOrFail($id);
        $sub_categories = SubCategory::all();
        return view('pages.data-record.edit', [
            'item' => $item,
            'sub_categories' => $sub_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataRecordRequest $request, $id)
    {
        $data = $request->all();
        
        $item = DataRecord::findOrFail($id);

        $item->update($data);

        return redirect()->route('data-record.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DataRecord::findOrFail($id);
        $item->delete();

        return redirect()->route('data-record.index');
    }
}
