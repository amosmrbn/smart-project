@extends('layouts.main')

@section('container')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">{{ $title }}</h3>
        </div>
        <div class="col-auto text-end float-end ms-auto download-grp">
            <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
            <a href="{{ URL::to('curriculum/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($curriculums as $index => $curriculum)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $curriculum->year }}</td>
                    <td>{{ $curriculum->description }}</td>
                    <td>{{ $curriculum->created_at }}</td>
                    <td>{{ $curriculum->updated_at }}</td>
                    <td class="align-middle text-center">
                        <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ URL::to('curriculum/' . $curriculum->id) }}" class="btn btn-sm btn-outline-info me-2">Lihat</a>
                        <a href="{{ URL::to('curriculum/' . $curriculum->id. '/edit') }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                        <form action="{{ URL::to('curriculum/' . $curriculum->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger me-2" onclick="return confirm('Anda yakin mau menghapus data ini {{ $curriculum->name }}?')">Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
