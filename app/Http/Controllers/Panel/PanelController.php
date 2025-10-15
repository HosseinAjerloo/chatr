<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\GiftCode;
use App\Models\Operator;
use App\Models\Sms;
use App\Models\Warrantye;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $config=Config::first();
        $operators=Operator::where('status','active')->get();
        $warrantyes=Warrantye::where('used',0)->get();
        $giftCodes=giftCode::where('used',0)->get();
        $sms=Sms::paginate(15);
        return view('panel.index',compact('config','operators','warrantyes','giftCodes','sms'));
    }
}
