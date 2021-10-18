@extends('layouts.master')

@section('title', 'Predmeti')

@section('content')
    <h1 class="w-100 mt-5">Predmeti</h1>
    <div class="courses-wrap w-100 py-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Profesor</th>
                    <th scope="col">Odjel</th>
                    <th scope="col">Akcija</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $professors->where('id', $course->professor_id)->pluck('name')->first() }}</td>
                    <td>{{ $departments->where('id', $course->department_id)->pluck('name')->first() }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="window.location = '/courses/{{$course->id}}'">Uredi</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCourse({{$course->id}})">Obriši</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary mt-4 px-5" id="addCourseTrigger" data-toggle="modal"
            data-target="#addCourseModal">Dodaj</button>

        <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCourseModalLabel">Dodaj predmet</h5>
                        <button type="button" class="close closeCourse" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control w-100 mb-3" id="courseName" placeholder="Puno ime">
                        <select class="form-select w-100 mb-3" aria-label="Profesor" id="courseProfessor">
                            <option selected disabled>Profesor</option>
                            @foreach ($professors as $professor)
                            <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                            @endforeach
                        </select>
                        <select class="form-select w-100" aria-label="Odjel" id="courseDepartment">
                            <option selected disabled>Odjel</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeCourse" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createCourse">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        function deleteCourse(course) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            $.ajax({
                url: "{{ url('/api/course') }}",
                method: 'delete',
                data: {
                    _token: '{{csrf_token()}}',
                    id: course
                },
                success: function(res) {
                    console.log(res)

                    window.location.reload()
                }
            });
        }
        $(document).ready(function() {
            $('#addCourseTrigger').on('click', () => {
                $('#addCourseModal').modal('toggle')
            })

            $('.closeCourse').on('click', () => {
                $('#addCourseModal').modal('toggle')
            })

            $('#createCourse').on('click', () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                $.ajax({
                    url: "{{ url('/api/course') }}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        name: $('#courseName').val(),
                        professor_id: $('#courseProfessor').val(),
                        department_id: $('#courseDepartment').val()
                    },
                    success: function(res) {
                        console.log(res)

                        $('#addCourseModal').modal('toggle')
                        window.location.reload()
                    }
                })
            })
        })
    </script>
@stop
