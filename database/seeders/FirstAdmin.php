<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create($this->adminData());
    }
    private function adminData(){
        return[
            'name'=>'admin',
            'phone'=>'0123456789',
            'user_type'=>'admin',
            'password'=>Hash::make("123456"),
            'user_password'=>"123456",

           
        ];
    } 
}
