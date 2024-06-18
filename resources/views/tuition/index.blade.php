@extends("layouts.main")
@section("container")

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">{{ $title }}</h3>
        </div>
        <div class="col-auto text-end float-end ms-auto download-grp">
            {{-- <a href="{{ URL::to('tuition-download') }}" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a> --}}
            <a href="{{ URL::to('tuition/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="student-thread">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Student</th>
                <th class="text-center">Tuition Date</th>
                <th class="text-center">Status</th>
                {{-- <th class="text-center">Penalty</th> --}}
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tuitions as $index => $tuition)
            <tr class="align-middle">
                <td class="text-center">{{ $index + 1 }}</td>
                <td>
                    {{ $tuition->studentTeacherHomeroomRelationship->student->identity_number }} - {{ $tuition->studentTeacherHomeroomRelationship->student->name }}
                </td>
                {{-- <td>{{ $tuition->classroom_name }} - {{ $tuition->identity_number }}  - {{ $tuition->name }}</td> --}}
                <td>{{ DateFormat($tuition->tuition_date, "DD MMMM Y") }}</td>
                <td class="text-center">
                    @if ($tuition->status == 'Paid')
                        <span class="badge badge-success">Paid</span>
                    @else
                        <span class="badge badge-warning">Unpaid</span>
                    @endif
                </td>
                <td class=" text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        @if ($tuition->status == 'Paid')
                            <a href="{{ URL::to('invoice/' . $tuition->id) }}" title="Invoice" class="btn btn-sm btn-outline-warning me-2">
                                <i class="fas fa-receipt"></i>
                            </a>
                        @endif
                        <a href="{{ route('tuition.edit', $tuition->id) }}" title="Edit" class="btn btn-sm btn-outline-primary me-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ URL::to('tuition/' . $tuition->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Anda yakin mau menghapus tuition {{ $tuition->name }} ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
