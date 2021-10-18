@extends('layouts.master')

@section('title', 'Predmet' . $course->name)

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-col">

        <h1 class="mt-5 fs-3">Uredi predmet {{$course->name}}</h1>
        <form class="w-3/4 mt-4" action="">
            <div class="mb-3">
                <label for="courseName" class="form-label">Puni naziv</label>
                <input type="text" class="form-control" id="courseName" aria-describedby="courseNameLabel" value="{{$course->name}}">
                <div id="courseNameLabel" class="form-text">Puni naziv predmeta</div>
            </div>
            <div class="mb-3">
                <select class="form-select w-100" aria-label="Fakultet" id="courseDepartment" >
                    <option selected disabled>Odjel</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{($course->department_id == $department->id ? 'selected' : '')}}>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select w-100" aria-label="Fakultet" id="courseProfessor" >
                    <option selected disabled>Profesor</option>
                    @foreach ($professors as $professor)
                        <option value="{{ $professor->id }}" {{($course->professor_id == $professor->id ? 'selected' : '')}}>{{ $professor->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary" id="editCurrentCourse">Submit</button>
        </form>
    </div>


@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#editCurrentCourse').on('click', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/api/course') }}",
                    method: 'put',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: {{$course->id}},
                        name: $('#courseName').val(),
                        professor_id: $('#courseProfessor').val(),
                        department_id: $('#courseDepartment').val()
                    },
                    success: function(res) {
                        console.log(res)

                        window.location = '/courses';
                    }
                });
            });
        });
    </script>
@stop
