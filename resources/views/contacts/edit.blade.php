@extends('layouts.app')

@section('title', 'Edit Contact')

@section('content')
<form action="{{ route('contacts.update', $contact) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" value="{{ $contact->name }}" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input name="phone" class="form-control" value="{{ $contact->phone }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection