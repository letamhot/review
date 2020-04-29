<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category')->delete();
        \DB::table('category')->insert(array(
            0 =>
            array(
                'title' => 'Trinh thám',
                'description' => '<p>Conan</p>',
                'created_at' => '2020-04-29 10:29:56',
                'updated_at' => '2020-04-29 10:30:10',
            ),
            1 =>
            array(
                'title' => 'Hành động',
                'description' => '<p>Truyện hành động</p>',
                'created_at' => '2020-04-29 08:50:39',
                'updated_at' => '2020-04-29 11:00:00',
            ),
            2 =>
            array(
                'title' => 'Kinh dị',
                'description' => '<p>truyện kinh dị</p>',
                'created_at' => '2020-04-29 11:30:55',
                'updated_at' => '2020-04-29 10:40:55',
            ),
        ));
    }
}
