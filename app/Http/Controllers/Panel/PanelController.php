<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\GiftCode;
use App\Models\Operator;
use App\Models\Sms;
use App\Models\Warrantye;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    public function index()
    {

        $config=Config::first();
        $operators=Operator::where('status','active')->get();
        $warrantyes=Warrantye::where('used',0)->get();
        $giftCodes=giftCode::where('used',0)->get();

        $sms=Sms::search()->paginate(15)->appends(\request()->query());
        $groupDaySend = \App\Models\Sms::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total')
        )->where('created_at', '>=', Carbon::now()->subMonths(1))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date', 'asc')
            ->get()->toArray();

        $groupBtUser= \App\Models\Sms::select(
            DB::raw('mobile'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('mobile')
            ->orderBy('total', 'desc')->limit(10)
            ->get();

        $groupOerator= \App\Models\Sms::select(
            DB::raw('operator_id'),
            DB::raw('COUNT(*) as total')
        )->whereNotNull('operator_id')
            ->groupBy('operator_id')
            ->orderBy('total', 'desc')
            ->get();
        foreach ($groupOerator as $smsPie)
        {
            $smsPie->name=$smsPie->operator->name??'';
        }


        return view('panel.index',compact('groupOerator','config','operators','warrantyes','giftCodes','sms','groupDaySend','groupBtUser'));
    }
}
