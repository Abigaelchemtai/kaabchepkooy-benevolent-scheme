<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Show all documents for download
    public function showDownloads()
    {
        $documents = Document::all();
        return view('downloads', compact('documents'));
    }

    // Handle document upload
    public function uploadForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
            'type' => 'required|string|in:admission,benevolent,kin',
        ]);

        $filePath = $request->file('file')->store('documents');

        Document::create([
            'name' => $validated['name'],
            'file_path' => $filePath,
            'type' => $validated['type'],
        ]);

        return redirect()->back()->with('success', 'Form uploaded successfully!');
    }
}
