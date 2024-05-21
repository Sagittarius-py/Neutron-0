<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Form;
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
        $template = Template::create([
            'name' => 'OGL - Oględziny Obiektu Elektrycznego',
        ]);

        $form = Form::create([
            'item_id' => 1,
            'template_id' => $template->id,
        ]);

        $column[] = Column::create([
            'name' => 'Przedmiot Oględzin',
            'type' => 'text'
        ]);

        $column[] = Column::create([
            'name' => 'Ocena',
            'type' => 'grade'
        ]);


        $template->columns()->saveMany($column);
    }
}
