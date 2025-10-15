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
        $today=\Morilog\Jalali\Jalalian::forge('today')->format('Y/m/d h:i:s');
        $response = \Illuminate\Support\Facades\Http::withHeaders([
            'ACCEPT' => 'application/json',
            'X-API-KEY' => 'LzJMD298QvvX8YSnrEECHEdewoi3qgcpFMbsKGAFwiYBO4TC'
        ])->get('https://api.sms.ir/v1/receive/latest');
        if ($response->status()) {
            $data = $response->json();
            if (isset($data['data']) and count($data['data']) > 0) {
                foreach ($data['data'] as $item) {
                    $item['type']='receive';
                    preg_match_all('/\d+/', $item['messageText'], $matches);
                    if (isset($matches[0]) and isset($matches[0][0]))
                    {

                        $numbers = $matches[0][0];
                        $warranty=\App\Models\Warrantye::where('code',$numbers)->first();
                        $giftCode=\App\Models\GiftCode::where('code',$numbers)->first();

                        if (!$warranty and !$giftCode)
                        {
                            $message='مشترک گرامی کد ارسال شده توسط شما نیاز به برسی بیشتر دارد باتشکر گروه بازرگانی چتر';
                            sendSMS($message,$item['mobile']);
                            continue;
                        }
                            if ($warranty)
                            {
                                if($warranty->used==0)
                                {
                                    $warranty->update(['phone_used'=>$item['mobile'],'used'=>1]);
                                    $message="مشتری گرامی گارانتی شما در تاریخ ".PHP_EOL.$today.PHP_EOL."فعال شد باتشکر گروه بازرگانی چتر";
                                    sendSMS($message,$item['mobile']);
                                }else{
                                    $message="مشتری گرامی گارانتی شما قبلا در تاریخ ".PHP_EOL.\Morilog\Jalali\Jalalian::forge($warranty->created_at).PHP_EOL."فعال شده است باتشکر گروه بازرگانی چتر";
                                    sendSMS($message,$item['mobile']);
                                }
                            }

                            if ($giftCode->used==0)
                            {
                                $prefixUser=substr($item['mobile'],0,3);
                                $prefix=\App\Models\Prefix::where('prefix_num',$prefixUser)->first();

                                if ($prefix)
                                {
                                    $charge=\App\Models\ChargeCode::where('used',0)->where('operator_id',$prefix->operator_id)->first();
                                    $message="مشتری گرامی کد شارژ شما ".PHP_EOL.$charge->copen.PHP_EOL."میباشد باتشکر گروه بازرگانی چتر";
                                    sendSMS($message,$item['mobile']);
                                    $charge->update(['used'=>1,'phone_used'=>$item['mobile']]);
                                    $giftCode->upfate(['used'=>1,'phone_used'=>$item['mobile']]);
                                }
                            }else{
                                $message="مشتری گرامی کد شارژ شما تکراری ".PHP_EOL."باتشکر گروه بازرگانی چتر";
                                sendSMS($message,$item['mobile']);
                            }


                    }
                    $sms=\App\Models\Sms::create($item);
                }
            }

        }

    }
}
