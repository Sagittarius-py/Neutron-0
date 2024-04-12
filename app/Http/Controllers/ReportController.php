<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'report' => 'required|array',
        ]);

        $report = Report::create([
            'user_id' => $request->user_id,
            'report' => $request->report,
        ]);

        return redirect()->route('reports.show', $report->id)->with('success', 'Report created successfully.');
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
