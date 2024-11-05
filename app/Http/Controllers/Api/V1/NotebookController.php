<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
	// список контактов с пагинацией
    public function index()
    {
        $contacts = Contact::paginate(10);
        return response()->json($contacts);
    }

	// создать новый контакт
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:contacts,email',
            'company' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|string'
        ]);

        $contact = Contact::create($validated);
        return response()->json($contact, 201);
    }

	// получить контакт по ID
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

	// обновить контакт по ID
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|unique:contacts,email,' . $id,
            'company' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|string'
        ]);

        $contact->update($validated);
        return response()->json($contact);
    }

	// удалить контакт по ID
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['message' => 'Контакт успешно удален']);
    }
}
