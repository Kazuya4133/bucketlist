<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 20)->create();

        // foreach (range(1, 3) as $num) {
        //     DB::table('users')->insert([
        //         'name' => "test {$num}",
        //         'email' => "$num@gmail.com",
        //         'password' => 123456,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
            
        // }
    }
}
