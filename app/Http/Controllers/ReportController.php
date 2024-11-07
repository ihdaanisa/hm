<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Method to display all reports
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())->get(); // Fetch all reports
        return view('user.dataLaporan', compact('reports'));
    }

    // Method to display a single report
    public function show($id)
    {
        $report = Report::findOrFail($id); // Fetch the report by ID
        return view('user.reportShow', compact('report')); // Adjust the view name as needed
    }
    public function adminIndex()
    {
        $reports = Report::all(); // Fetch all reports, regardless of user
        return view('admin.reports.index', compact('reports')); // Adjust view path as needed
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string',
        'response' => 'nullable|string',
    ]);

    $report = Report::findOrFail($id);
    $report->update([
        'status' => $request->status,
        'response' => $request->response,
    ]);

    return redirect()->route('reports.index')->with('status', 'Report updated successfully!');
}
    // Method to store a new report
    public function store(Request $request)
    {
        $request->validate([
            'classification' => 'required',
            'title' => 'required',
            'content' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'institution' => 'required',
           'attachment' => 'nullable|file|mimes:jpg,jpeg,png,mp4,avi|max:5120' // Allows images and videos up to 5MB
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        Report::create([
            'user_id' => Auth::id(),
            'classification' => $request->classification,
            'title' => $request->title,
            'content' => $request->content,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'institution' => $request->institution,
            'attachment_path' => $attachmentPath,
        ]);

        return redirect()->route('laporan')->with('status', 'Report submitted successfully!');
    }
}
