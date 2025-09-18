<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        return Prescription::with(['user', 'doctor', 'appointment'])->get();
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_id' => 'required|exists:appointments,id',
            'medication' => 'required|string',
            'instructions' => 'required|string',
        ]);

        $prescription = Prescription::create($fields);

        return response()->json($prescription, 201);
    }

    public function show($id)
    {
        return Prescription::with(['user', 'doctor', 'appointment'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->update($request->all());
        return response()->json($prescription);
    }

    public function destroy($id)
    {
        Prescription::destroy($id);
        return response()->json(['message' => 'Prescription supprimée']);
    }
}
