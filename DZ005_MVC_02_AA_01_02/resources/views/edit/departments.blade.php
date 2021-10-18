@extends('layouts.master')

@section('title', 'Odjel ' . $department->name)

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-col">

        <h1 class="mt-5 fs-3">Uredi odjel {{$department->name}}</h1>
        <form class="w-3/4 mt-4" action="">
            <div class="mb-3">
                <label for="departmentName" class="form-label">Naziv odjela</label>
                <input type="text" class="form-control" id="departmentName" aria-describedby="departmentNameLabel" value="{{$department->name}}">
                <div id="departmentNameLabel" class="form-text">Ime i prezime odjela</div>
            </div>
            <div class="mb-3">
                <select class="form-select w-100" aria-label="Fakultet" id="editDepartmentFaculty" >
                    <option selected disabled>Fakultet</option>
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{($department->faculty_id == $faculty->id ? 'selected' : '')}}>{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary" id="editCurrentDepartment">Submit</button>
        </form>
    </div>


@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#editCurrentDepartment').on('click', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/api/department') }}",
                    method: 'put',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: {{$department->id}},
                        name: $('#departmentName').val(),
                        faculty_id: $('#editDepartmentFaculty').val()
                    },
                    success: function(res) {
                        console.log(res)

                        window.location = '/departments';
                    }
                });
            });
        });
    </script>
@stop
