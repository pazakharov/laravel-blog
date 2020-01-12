<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'          =>'Автор неизвестен',
                'email'         =>'autor_unknown@e.g',
                'password'      =>bcrypt(str_random(16)),
            ],
            [
                'name'          =>'Автор блогер',
                'email'         =>'autor_111@e.g',
                'password'      =>bcrypt('123123'),
            ]
        ];
        DB::table('users')->insert($data);
    }
}
