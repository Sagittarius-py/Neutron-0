<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function addRecord(Request $request)
    {
        $record = new Record(["form_id" => $request->form_id]);
        $record->save(); // Zapisz rekord do bazy danych
        error_log($record->id);

        foreach ($request->all() as $key => $value) {
            // Przetwórz tylko pola zaczynające się od "column"
            if (strpos($key, 'column') === 0) {
                $columnId = str_replace('column', '', $key);
                $record->values()->create([
                    'record_id' => $record->id,
                    'column_id' => $columnId,
                    'value' => $value,
                ]);
            }
        }

        // Zwróć odpowiedź JSON potwierdzającą dodanie rekordu
        return redirect()->back();
    }
}
