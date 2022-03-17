<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'John Smith',
            'email'    => 'test@test.test',
            'password'   =>  Hash::make('test12345'),
        ]);
    }
}
