<?php


namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{


    public function create(Request $request)
    {
        // Log a message for debugging purposes

        // Create a form with the raw input data from the request
        $form = Form::create($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('form', $form);
    }

    public function getFormData(Request $request)
    {
        $formId = $request->form_id;

        $form = Form::find($formId);

        return redirect()->back()->with('form', $form);
    }

    public function reload(Request $request)
    {
        return redirect()->back()->with('form', null)->with('item', $request->item_id);
    }
}
