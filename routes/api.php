<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('gift-code', function (Request $request) {
    if ($request->hasHeader('token') and $request->header('token')==env('TOKEN'))
    {
        $validation = Validator::make($request->all(), [
            'mobile' => 'required|min:10|max:10',
            'code' => 'required',
        ]);

        $validation->setAttributeNames([
            'mobile' => 'شماره تلفن',
            'code' => 'کد هدیه',
        ]);

        if ($validation->fails()) {
            return $validation->messages();
        }
        $item = $request->all();
        $prefix= getOperator($item['mobile']);
        $request->merge(['messageText' => $request->code??'', 'number' => env('NUMBER'),'operator_id'=>$prefix?->operator_id]);
        $item = $request->all();
        $sms = \App\Models\Sms::create($item);
        $warranty = \App\Models\Warrantye::where('code', $item['code'])->first();
        $giftCode = \App\Models\GiftCode::where('code', $item['code'])->first();
        if (!$warranty and !$giftCode) {
            $message = 'کد ارسال شده نیاز به برسی بیشتر دارد.گروه بازرگانی چتر';
            sendSMS($message, $item['mobile'], $sms);
            return response()->json(['message'=>$message]);
        }
        if ($warranty) {
            if ($warranty->used == 0) {
                $warranty->update(['phone_used' => $item['mobile'], 'used' => 1]);
                $message = "همراه عزیز گروه بازرگانی چتر کدگارانتی شما فعال شد.";
                sendSMS($message, $item['mobile'], $sms);
                return response()->json(['message'=>$message]);

            } else {
                $message = "همراه عزیز گروه بازرگانی چتر ، کدگارانتی شما قبلا فعال شده است.";
                sendSMS($message, $item['mobile'], $sms);
                return response()->json(['message'=>$message]);
            }
        }
        if ($giftCode) {
            if ($giftCode->used == 0) {
                if ($prefix) {
                    $charge = \App\Models\ChargeCode::where('used', 0)->where('operator_id', $prefix->operator_id)->first();
                    if ($charge) {
                        $message = " کد شارژ شما " . PHP_EOL . $charge->copen . PHP_EOL . "میباشد باتشکر گروه بازرگانی چتر";
                        sendSMS($message, $item['mobile'], $sms);
                        $charge->update(['used' => 1, 'phone_used' => $item['mobile']]);
                        $giftCode->update(['used' => 1, 'phone_used' => $item['mobile']]);
                        return response()->json(['message'=>$message]);

                    }
                }
            } else {
                $message = " کد شارژ شما تکراری میباشد  " . PHP_EOL . "باتشکر گروه بازرگانی چتر";
                sendSMS($message, $item['mobile'], $sms);
                return response()->json(['message'=>$message]);
            }
        }
    }
    return  response('not found',404);
});
