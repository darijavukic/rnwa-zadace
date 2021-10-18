@extends('layouts.master')

@section('title', 'Studenti')

@section('content')
    <h1 class="w-100 mt-5">Studenti</h1>
    <div class="students-wrap w-100 py-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Fakultet</th>
                    <th scope="col">Akcija</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $faculties->where('id', $student->faculty_id)->pluck('name')->first() }}</td>
                    <td>
                        <button type="button" class="btn btn-warning editStudentTrigger" onclick="window.location = '/students/{{$student->id}}'">Uredi</button>
                        <button type="button" class="btn btn-danger" onclick="deleteStudent({{$student->id}})">Obriši</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary mt-4 px-5" id="addStudentTrigger" data-toggle="modal" data-target="#addStudentModal">Dodaj</button>

        <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Dodaj studenta</h5>
                        <button type="button" class="close closeStudent" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control w-100 mb-3" id="studentName" placeholder="Puno ime">
                        <select class="form-select w-100" aria-label="Fakultet" id="studentFaculty">
                                <option selected disabled>Fakultet</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeStudent" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createStudent">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        function deleteStudent(student) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

            $.ajax({
                url: "{{ url('/api/student') }}",
                method: 'delete',
                data: {
                    _token: '{{csrf_token()}}',
                    id: student
                },
                success: function(res) {
                    console.log(res)

                    window.location.reload()
                }
            });
        }
        $(document).ready(function() {
            $('#addStudentTrigger').on('click', () => {
                $('#addStudentModal').modal('toggle')
            });

            $('.closeStudent').on('click', () => {
                $('#addStudentModal').modal('toggle')
            })

            $('#createStudent').on('click', () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                $.ajax({
                    url: "{{ url('/api/student') }}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        name: $('#studentName').val(),
                        faculty_id: $('#studentFaculty').val()
                    },
                    success: function(res) {
                        console.log(res)

                        $('#addStudentModal').modal('toggle')
                        window.location.reload()
                    }
                })
            })
        })
    </script>
@stop
