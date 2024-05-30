@extends('layouts.main')
@section('container')
    @if (isset($extracurricular))
        <form method="POST" action="{{ URL::to('extracurricular/' . $extracurricular->id) }}" autocomplete="off"
            enctype="multipart/form-data">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('extracurricular') }}" autocomplete="off" enctype="multipart/form-data">
    @endif
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name')is-invalid @enderror"
                    value="{{ isset($extracurricular) ? $extracurricular->name : old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="student_name">Student Name</label>
                <select class="form-control" name="student_name" id="student_name">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}"
                            {{ isset($extracurricular) ? ($extracurricular->student_id === $student->id ? ' selected' : '') : '' }}>
                            {{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="admin_name">Admin Name</label>
                <select class="form-control" name="admin_name" id="admin_name">
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}"
                            {{ isset($extracurricular) ? ($extracurricular->admin_id === $admin->id ? ' selected' : '') : '' }}>
                            {{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description"
                    class="form-control @error('description')is-invalid @enderror"
                    value="{{ isset($extracurricular) ? $extracurricular->description : old('description') }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <div class="student-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ URL::to('extracurricular/') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
        </form>
    @endsection
