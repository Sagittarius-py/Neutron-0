<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Column;

class FormColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = Template::create([
            'name' => 'OGL - Oględziny Obiektu Elektrycznego',
        ]);

        $column[] = Column::create([
            'name' => 'Przedmiot Oględzin',
            'type' => 'text'
        ]);

        $column[] = Column::create([
            'name' => 'Ocena',
            'type' => 'text'
        ]);


        $form->column()->saveMany($column);
    }
}
