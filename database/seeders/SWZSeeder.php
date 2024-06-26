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

        $columns = [
            ['name' => 'Symbol', 'type' => 'text'],
            ['name' => 'Nazwa Obwodu', 'type' => 'text'],
            ['name' => 'Typ Zabezpieczenia', 'type' => 'text'],
            ['name' => 'In [A]', 'type' => 'number'],
            ['name' => 'Ia [A]', 'type' => 'number'],
            ['name' => 'Ta [s]', 'type' => 'number'],
            ['name' => 'Zsz [Ω]', 'type' => 'number'],
            ['name' => 'Zs [Ω]', 'type' => 'number'],
        ];

        foreach ($columns as $columnData) {
            $column = Column::create($columnData);
            $template->columns()->attach($column->id); // Zakładając, że istnieje tabela pośrednia `column_template` i relacja `columns` w modelu `Template`
        }

        // Przykład dodania istniejącej kolumny o id 2 do template'u
        $existingColumn = Column::find(2);
        if ($existingColumn) {
            $template->columns()->attach($existingColumn->id);
        }
    }
}
