<?php

namespace App\Http\Controllers;

use App\Models\PersonalAcademicData;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


    public function index()
    {
        $records = PersonalAcademicData::all();
        return view('admin.index', compact('records'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $records = PersonalAcademicData::where('nombres', 'LIKE', "%{$query}%")
            ->orWhere('apellidos', 'LIKE', "%{$query}%")
            ->get();

        return view('admin.index', compact('records'));
    }

    public function show($id)
    {
        $personalData = PersonalAcademicData::findOrFail($id);
        return view('admin.show', compact('personalData'));
    }



}
