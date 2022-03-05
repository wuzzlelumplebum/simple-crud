<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\User;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('name','email','no_hp','alamat')->get()->sortBy('name');
    }

    public function headings(): array
    {
        return [
            'Name',
            'E-mail Address',
            'Phone Number',
            'Address'
        ];
    }
}
