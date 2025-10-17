<?php

namespace App\Exports;

use App\Models\Sms;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Morilog\Jalali\Jalalian;

class SmsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sms::search()->get();
    }

    public function headings(): array
    {
        return [
            'شناسه',
            'موبایل کاربر',
            'نام اپراتور',
            'متن پیامک دریافتی',
            'متن پیامک ارسالی',
            'اپراتور گروه بازرگانی چتر',
            'تاریخ'
        ];
    }

    /**
     * نگاشت داده‌های هر ردیف
     *
     * @param  \App\Models\Sms  $sms
     * @return array
     */
    public function map($sms): array
    {


        return [
            $sms->id??'-',
            $sms->mobile??'-',
            $sms->operator->name??'-',
            $sms->messageText??'-',
            $sms->message_send??'-',
            $sms->number??'-',
            Jalalian::forge($sms->created_at)->format('Y/m/d')
        ];
    }
}
