<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendSMS implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->onQueue('sms-send');

    }
    public $timeout=0;


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $today=\Morilog\Jalali\Jalalian::forge('now')->format('Y/m/d H:i:s');
        $response = \Illuminate\Support\Facades\Http::timeout(100)->withHeaders([
            'ACCEPT' => 'application/json',
            'X-API-KEY' => 'LzJMD298QvvX8YSnrEECHEdewoi3qgcpFMbsKGAFwiYBO4TC'
        ])->get('https://api.sms.ir/v1/receive/latest');
        if ($response->status()) {
            $data = $response->json();
            if (isset($data['data']) and count($data['data']) > 0) {
                foreach ($data['data'] as $item) {
                    $item=array_map(function ($value){
                        return (string)$value;
                    },$item);

                    preg_match_all('/\d+/', $item['messageText'], $matches);
                    $prefix= getOperator($item['mobile']);
                    if ($prefix)
                    {
                        $item['operator_id']=$prefix->operator_id;
                    }
                    $sms=\App\Models\Sms::create($item);

                    if (isset($matches[0]) and isset($matches[0][0]))
                    {

                        $numbers = $matches[0][0];
                        $warranty=\App\Models\Warrantye::where('code',$numbers)->first();
                        $giftCode=\App\Models\GiftCode::where('code',$numbers)->first();

                        if (!$warranty and !$giftCode)
                        {
                            $message='کد ارسال شده نیاز به برسی بیشتر دارد.گروه بازرگانی چتر';
                            sendSMS($message,$item['mobile'],$sms);
                            continue;
                        }
                            if ($warranty)
                            {
                                if($warranty->used==0)
                                {
                                    $warranty->update(['phone_used'=>$item['mobile'],'used'=>1]);
                                    $message="همراه عزیز گروه بازرگانی چتر کدگارانتی شما فعال شد.";
                                    sendSMS($message,$item['mobile'],$sms);
                                }else{
                                    $message="همراه عزیز گروه بازرگانی چتر ، کدگارانتی شما قبلا فعال شده است.";
                                    sendSMS($message,$item['mobile'],$sms);
                                }
                            }

                            if ($giftCode)
                            {
                                if ($giftCode->used==0)
                                {

                                    if ($prefix)
                                    {
                                        $charge=\App\Models\ChargeCode::where('used',0)->where('operator_id',$prefix->operator_id)->first();
                                        if ($charge){
                                            $message=" کد شارژ شما ".PHP_EOL.$charge->copen.PHP_EOL."میباشد باتشکر گروه بازرگانی چتر";
                                            sendSMS($message,$item['mobile'],$sms);
                                            $charge->update(['used'=>1,'phone_used'=>$item['mobile']]);
                                            $giftCode->update(['used'=>1,'phone_used'=>$item['mobile']]);
                                        }

                                    }
                                }else{
                                    $message=" کد شارژ شما تکراری میباشد  ".PHP_EOL."باتشکر گروه بازرگانی چتر";
                                    sendSMS($message,$item['mobile'],$sms);
                                }
                            }
                    }
                }
            }

        }

    }
}
