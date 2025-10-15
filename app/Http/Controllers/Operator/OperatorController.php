<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Opearator\OperatorRequest;
use App\Http\Requests\Panel\Prefix\PrefixRequest;
use App\Models\Operator;
use App\Models\Prefix;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operators=Operator::where('status','active')->get();
        return view('panel.prefix.index',compact('operators'));
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
    public function store(OperatorRequest $request)
    {
        $inputs=$request->all();
        $operator=Operator::create($inputs);
        return response()->json(['success'=>true,'message'=>'اپراتور جدید ساخته شد','data'=>$operator]);
    }
    public function storePrefix(PrefixRequest $request)
    {
        $inputs=$request->all();
        $prefix=Prefix::create($inputs);
        return response()->json(['success'=>true,'message'=>'پیش شماره جدید جدید ساخته شد','data'=>$prefix]);
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
