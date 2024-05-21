<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Form;
use App\Models\Column;

class SWZSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = Template::create([
            'name' => 'SWZ - Badanie skuteczności ochrony przeciwporażeniowej przez samoczynne wyłączenie zasilania',
        ]);

        $form = Form::create([
            'item_id' => 8,
            'template_id' => $template->id,
        ]);

        $column[] = Column::create([
            'name' => 'Symbol',
            'type' => 'text'
        ]);

        $column[] = Column::create([
            'name' => 'Nazwa Obwodu',
            'type' => 'text'
        ]);

        $column[] = Column::create([
            'name' => 'Typ Zabezpieczenia',
            'type' => 'text'
        ]);

        $column[] = Column::create([
            'name' => 'In [A]',
            'type' => 'number'
        ]);


        $column[] = Column::create([
            'name' => 'Ia [A]',
            'type' => 'number'
        ]);

        $column[] = Column::create([
            'name' => 'Ta [s]',
            'type' => 'number'
        ]);

        $column[] = Column::create([
            'name' => 'Ta [s]',
            'type' => 'number'
        ]);

        $column[] = Column::create([
            'name' => 'Zsz [Ω]',
            'type' => 'number'
        ]);

        $column[] = Column::create([
            'name' => 'Zs [Ω]',
            'type' => 'number'
        ]);

        $column[] = Column::where('id', 2)->first();
    }
}
