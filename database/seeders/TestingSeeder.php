<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Area;
use App\Models\Division;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Support\Facades\Hash;

class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_tester = Group::where('name', 'Tester')->first();
        $group_tester_id = $group_tester->id;

        //inserting user spv
        $data_user = User::create(
        [
            "username"          => 'tester',
            "employee_number"   => '01010102',
            "first_name"        => 'User',
            "last_name"         => 'tester',
            "email"             => 'test@test.test',
            "phone"             => '01112121212',
            "birth_of_date"     => '2021/07/30',
            "address"           => 'Indonesia',
            "password"          => Hash::make("asdasd"),
            "group_id"          => $group_tester_id
        ]);

        $data_user->save();
    }
}
