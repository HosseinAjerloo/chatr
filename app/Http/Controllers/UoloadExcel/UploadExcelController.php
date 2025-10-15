<?php

namespace App\Http\Controllers\UoloadExcel;

use App\Http\Controllers\Controller;
use App\Imports\ChargeCodeExcel;
use App\Imports\CopenExcel;
use App\Imports\WarrantyeExcel;
use App\Models\ChargeCode;
use App\Models\Operator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UploadExcelController extends Controller
{

    public function index()
    {
        $operators=Operator::where('status','active')->get();
        return view('panel.uploadExcel.index',compact('operators'));
    }
    public function chargeCode(Request $request)
    {
        $request->validate([
            'charge_code' => 'required|mimes:xlsx,xls|max:5000',
            'operator_id'=>'required|exists:operators,id'
        ]);
        $operator=$request->input('operator_id');
        Excel::queueImport(new ChargeCodeExcel($operator), $request->file('charge_code'));
        return redirect()->back()->with(['success'=>'آپلود کارت شارژ با موفقیت آپلود شد']);

    }
    public function warrantye(Request $request)
    {

        $request->validate([
            'warrantye' => 'required|mimes:xlsx,xls|max:5000',
        ]);
        Excel::queueImport(new WarrantyeExcel, $request->file('warrantye'));
        return redirect()->back()->with(['success'=>'فایل کارت گارانتی  با موفقیت آپلود شد']);

    }

    public function copen(Request $request)
    {
        $request->validate([
            'copen' => 'required|mimes:xlsx,xls|max:5000',
        ]);
        Excel::queueImport(new CopenExcel, $request->file('copen'));
        return redirect()->back()->with(['success'=>'فایل کارت کوپن شارژ  با موفقیت آپلود شد']);

    }
}
