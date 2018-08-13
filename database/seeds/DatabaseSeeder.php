<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
    }

}
class UsersTableSeeder extends Seeder{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ngô Minh Thư',
            'email' => 'minhthu1611@gmail.com',
            'password' => bcrypt('1611'),
            'sex'=>1,
            'phone'=>'01208258943',
            'address'=>'Ô môn trung tâm thành phố Cần Thơ',
            'roles'=>0
        ]);
        DB::table('networks')->insert([
            array('Network'=>'FPT'),
            array('Network'=>'VIETTEL'),
            array('Network'=>'VNPT'),
            array('Network'=>'SCTV')
        ]);
    }
}

