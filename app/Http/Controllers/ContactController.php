<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
{
    $contacts = Contact::all();
    return view('contacts.index', compact('contacts'));
}

public function create()
{
    return view('contacts.create');
}

public function store(Request $request)
{
    Contact::create($request->only('name', 'phone'));
    return redirect()->route('contacts.index');
}

public function show(Contact $contact)
{
    return view('contacts.show', compact('contact'));
}

public function edit(Contact $contact)
{
    return view('contacts.edit', compact('contact'));
}

public function update(Request $request, Contact $contact)
{
    $contact->update($request->only('name', 'phone'));
    return redirect()->route('contacts.index');
}

public function destroy(Contact $contact)
{
    $contact->delete();
    return redirect()->route('contacts.index');
}

public function importXML(Request $request)
{
    $request->validate(['xml_file' => 'required|file']);

    $xmlContent = file_get_contents($request->file('xml_file')->getRealPath());
    $contacts = simplexml_load_string($xmlContent);

    foreach ($contacts->contact as $contact) {
        Contact::create([
            'name' => (string)$contact->name,
            'phone' => (string)$contact->phone
        ]);
    }

    return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully!');
}
}
