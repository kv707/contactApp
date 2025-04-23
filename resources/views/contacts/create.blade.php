@extends('layouts.app')

@section('title', 'Add Contact')

@section('content')
<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input name="phone" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection