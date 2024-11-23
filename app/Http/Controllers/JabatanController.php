<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JabatanController extends Controller
{
    public function index()
    {
        return view('jabatan', ['showInfobox' => false]); // pastikan Anda memiliki file view dashboard.blade.php
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Jabatan::query();
            \Log::info($data->get()); // Menambahkan log untuk melihat data
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '
                    <button class="edit-btn text-blue-600" data-id="' . $row->id . '">Edit</button>
                    <button class="delete-btn text-red-600" data-id="' . $row->id . '">Delete</button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|unique:jabatan,nama_jabatan',
            'deskripsi' => 'nullable|string',
        ]);

        Jabatan::create($request->all());
        return response()->json(['success' => 'Jabatan berhasil ditambahkan.']);
    }

    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());
        return response()->json(['success' => 'Jabatan berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        Jabatan::destroy($id);
        return response()->json(['success' => 'Jabatan berhasil dihapus.']);
    }
}