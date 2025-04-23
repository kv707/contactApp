@extends('layouts.app')

@section('title', 'All Contacts')

@section('content')
<a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Add Contact</a>

<form action="{{ route('contacts.import.xml') }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="mb-2">
        <input type="file" name="xml_file" accept=".xml" required>
        <button type="submit" class="btn btn-success">Import from XML</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this contact?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection