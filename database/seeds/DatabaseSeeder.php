<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = ['csc401', 'csc422', 'csc413', 'csc405', 'csc421', 'csc431'];
        DB::table('cits-students')->insert([
            'surname' => 'Areola',
            'firstName' => 'Tunde',
            'otherName' => 'Ayomide',
            'phoneNo' => '08122889090',
            'email' => 'realtunny@gmail.com',
            'matricNo' => '140805003',
            'dept'=> 'Computer Sciences',
            'faculty' => 'Sciences',
            'level' => '400',
            'courses' => implode(',', $courses),
            'password' => bcrypt('password'),
        ]);
    }
}
