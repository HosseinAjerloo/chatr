<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * دریافت مجموعه‌ای از کاربران
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $users= User::with(['roles', 'brand']);
        return $users->when(request('brand_id'),function ($query,$value){
           $query->where('brand_id',$value);
        })->when(request('city_id'),function ($query,$value){
            $query->where('city_id',$value);
        })->get();

    }

    /**
     * تعریف هدرهای فایل Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'شناسه',
            'نام کاربری',
            'نام',
            'نام خانوادگی',
            'نقش',
            'شهر',
            'برند',
            'شماره تماس',
            'سمت',
            'کدملی',


        ];
    }

    /**
     * نگاشت داده‌های هر ردیف
     *
     * @param  \App\Models\User  $user
     * @return array
     */
    public function map($user): array
    {


        return [
            $user->id??'-',
            $user->username??'-',
            $user->name??'-',
            $user->family??'-',
            $user->roles->pluck('name')->implode(', ')?:'-',
            $user->city->name??'-',
            $user->brand->name ?? '-',
            $user->phone_number??'-',
            $user->side??'-',
            $user->nationality??'-',
        ];
    }
}
