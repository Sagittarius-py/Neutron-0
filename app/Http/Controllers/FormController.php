<?php


namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{


    public function create(Request $request)
    {
        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'template_id' => 'required|integer|exists:templates,id',
            'item_id' => 'required|integer|exists:items,id',
        ]);

        // Tworzenie nowego rekordu w tabeli forms
        try {
            Form::create($validatedData);
            return redirect()->back()->with('success', 'Device created successfully.');
        } catch (\Exception $e) {
            // Obsługa błędów
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the device.']);
        }
    }
    public function getFormData(Request $request)
    {
        $formId = $request->form_id;
        // Pobieramy formularz wraz z powiązanymi danymi za pomocą Eloquent
        $form = Form::find($formId); // Pobranie formularza po ID
        // Zwracamy dane w formacie JSON
        return view('protocols.protocol_sections.formTable', compact('form'))->render();
    }
}
