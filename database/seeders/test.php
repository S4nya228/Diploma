<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class test extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('helps')->insert([
           'title'=>'Як користуватися вебсайтом пропозиції та інноваці в регіоні з можливістю голосування?',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur orci est, scelerisque eget mauris eu, lobortis vehicula lectus. Quisque pharetra lorem a libero lacinia fringilla. Nullam commodo massa ut mauris vestibulum sagittis. Sed ut accumsan turpis. Ut suscipit porta enim vehicula maximus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi ex odio, imperdiet eu ultricies non, porta sed mauris. Duis non erat tristique, pharetra est in, condimentum diam. Nullam dignissim turpis sit amet tincidunt aliquet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin imperdiet ultrices diam eget mollis. Vestibulum volutpat purus non mauris faucibus, nec sagittis sem finibus. Pellentesque sed dui nisl.'
        ]);
        DB::table('roles')->insert([
            'name' => 'Користувач',
        ]);
        DB::table('roles')->insert([
            'name' => 'Адміністратор',
        ]);
        DB::table('regions')->insert([
            [
                'title' => 'Берегівський'
            ],
            [
                'title' => 'Мукачівський'
            ],
            [
                'title' => 'Рахівський'
            ],
            [
                'title' => 'Тячівський'
            ],
            [
                'title' => 'Ужгородський'
            ],
            [
                'title' => 'Хустський'
            ],
        ]);
        DB::table('statuses')->insert([
            [
                'name' => 'Триває збір голосів'
            ],
            [
                'name' => 'Знаходится на розгляді'
            ],
            [
                'name' => 'З відповіддю'
            ],
        ]);

    }
}
