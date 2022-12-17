<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray, WithHeadings
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Email',
            'Role',
            'last login',
            'Phone Verified',
            'Email Verified'
        ];
    }



    public function array(): array
    {
        return $this->users;
    }
}
