<?php
function sendSMS($message='',$mobile='091864144452')
{

   \App\Models\Sms::create([
        'mobile'=>$mobile,
        'messageText'=>$message,
        'number'=>'10008218',
        'type'=>'send']);

    $message=$message . PHP_EOL.'لغو11';
        $response = \Illuminate\Support\Facades\Http::withHeaders([
        'Accept' => 'text/plain',
        'X-API-KEY' => 'gAVlVd4hrVs5Q2jKBifSc8xXUO4WJNfy1QbVsQYPP1KaRwpv',
        'Content-Type' => 'application/json',

    ])->POST('https://api.sms.ir/v1/send/likeToLike', [
        'lineNumber' => '10008218',
        'Password' => 'gAVlVd4hrVs5Q2jKBifSc8xXUO4WJNfy1QbVsQYPP1KaRwpv',
        'Line' => "10008218",
        'MessageTexts' => [$message],
        'Mobiles' => [$mobile],
    ]);
}
function getOperator($mobile)
{
    $prefixUser=substr($mobile,0,3);
    $prefix=\App\Models\Prefix::where('prefix_num',$prefixUser)->first();
    return $prefix;
}
