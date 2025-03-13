<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // إرجاع كل الملاحظات
    public function index()
    {
        return response()->json(Note::all());
    }

    // إضافة ملاحظة جديدة
    public function store(Request $request)
    {
        $note = Note::create($request->all());
        return response()->json($note, 201);
    }

    // تحديث ملاحظة موجودة
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());
        return response()->json($note);
    }

    // حذف ملاحظة
    public function destroy($id)
    {
        Note::findOrFail($id)->delete();
        return response()->json(['message' => 'تم الحذف بنجاح']);
    }
}
