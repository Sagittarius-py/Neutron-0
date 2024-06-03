<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Template;
use App\Models\Form;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function addRecord(Request $request)
    {
        $form = Form::find($request->form_id);
        $record = new Record(["form_id" => $request->form_id]);
        $record->save(); // Zapisz rekord do bazy danych
        $templates = Template::all();
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
        return redirect()->back()->with('form', $form)->with('templates', $templates);
    }
}
