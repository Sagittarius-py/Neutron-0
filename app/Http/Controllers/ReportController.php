<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    public function index()
    {
        // Get the ID of the authenticated user
        $userId = Auth::id();

        // Fetch reports associated with the authenticated user
        $reports = Report::where('user_id', $userId)->get();

        return view('reports.index', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }

    public function create()
    {
        $jsonData = File::get(resource_path('json/example_report.json'));

        $data = json_decode($jsonData, true);

        return view('reports.create', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            // Validation rules for other fields if needed...
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add validation rules for other fields as needed...
        ]);

        // Get the ID of the currently logged-in user
        $userId = Auth::id();

        // Find the last report of the user
        $lastReport = Report::where('user_id', $userId)->latest()->first();

        // Determine the next report number
        $reportNumber = $lastReport ? $lastReport->report_number + 1 : 1;

        // Example JSON data to be stored in the 'report' field
        $reportData = [
            // Sample data; replace this with your actual report data
            'title' => $validatedData['title'],
            'description' => $validatedData['description']
        ];

        // Create a new report instance and populate its attributes
        $report = new Report();
        $report->user_id = $userId;
        $report->report_number = $reportNumber;
        $report->created_at = time();
        $report->updated_at = time();
        $report->report = $reportData; // Assuming 'report' field is JSON type

        // Save the report to the database
        $report->save();

        // Optionally, you can redirect the user to a different page after successful form submission
        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'report' => 'required|array',
        ]);

        $report = Report::findOrFail($id);
        $report->user_id = $request->user_id;
        $report->report = $request->report;
        $report->save();

        return redirect()->route('reports.show', $report->id)->with('success', 'Report updated successfully.');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }
}
