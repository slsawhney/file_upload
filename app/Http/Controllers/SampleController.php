<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Imports\SampleImport;
use Maatwebsite\Excel\Facades\Excel;

class SampleController extends Controller
{
    /**
     * Display all records from the "samples" table.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $samples = Sample::paginate(10);

        return view('sample', compact('samples'));
    }

    /**
     * Handles upload file, store the file on a location, and import its rows into DB.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        // Save uploaded file.
        $path = $request->file('file')->store('uploads', 'public');

        // Import rows from Excel.
        Excel::import(new SampleImport, $path, 'public');

        return redirect()->route('sample.index');
    }
}

