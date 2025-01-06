<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email','pedro.aranha@outlook.com')->first()){
       User::create([
        'name'=>'Pedro',
        'email' => 'pedro.aranha@outlook.com',
        'password' => Hash::make('1234a',['rounds' => 12]),
       ]);
    }
    }
}
