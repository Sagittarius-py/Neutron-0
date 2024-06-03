<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Form;
use App\Models\Column;

class UKROKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = Template::create([
            'name' => 'U-KROK - Bada2nie napięcia rażenia krokowego',
        ]);

        $columns = [
            ['name' => 'Miejsce Pomiaru', 'type' => 'text'],
            ['name' => 'Metoda', 'type' => 'text'],
            ['name' => 'Izw [A]', 'type' => 'number'],
            ['name' => 'Ip [A]', 'type' => 'number'],
            ['name' => 'Uz [V]', 'type' => 'number'],
            ['name' => 'Ud [V]', 'type' => 'number'],
        ];
        $existingColumn = Column::find(3);
        if ($existingColumn) {
            $template->columns()->attach($existingColumn->id);
        }
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
