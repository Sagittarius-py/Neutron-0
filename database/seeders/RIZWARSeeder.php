<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Form;
use App\Models\Column;

class RIZWARSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = Template::create([
            'name' => 'RI-ZWAR - Badanie stanu rezystancji izolacji',
        ]);

        $columns = [
            ['name' => 'Rz [MΩ]', 'type' => 'number'],
            ['name' => 'Rw [MΩ]', 'type' => 'number'],
        ];
        // Przykład dodania istniejącej kolumny o id 2 do template'u

        $existingColumn = Column::find(3);
        if ($existingColumn) {
            $template->columns()->attach($existingColumn->id);
        }
        $existingColumn = Column::find(4);
        if ($existingColumn) {
            $template->columns()->attach($existingColumn->id);
        }
        $existingColumn = Column::find(5);
        if ($existingColumn) {
            $template->columns()->attach($existingColumn->id);
        }
        foreach ($columns as $columnData) {
            $column = Column::create($columnData);
            $template->columns()->attach($column->id); // Zakładając, że istnieje tabela pośrednia `column_template` i relacja `columns` w modelu `Template`
        }
        $existingColumn = Column::find(2);
        if ($existingColumn) {
            $template->columns()->attach($existingColumn->id);
        }
    }
}
