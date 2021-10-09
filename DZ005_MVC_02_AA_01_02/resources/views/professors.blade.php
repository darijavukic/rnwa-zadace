@extends('layouts.master')

@section('title', 'Profesori')

@section('content')
    <h1 class="w-100 mt-5">Profesori</h1>
    <div class="professors-wrap w-100 py-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Odjel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($professors as $professor)
                <tr>
                    <th scope="row">{{ $professor->id }}</th>
                    <td>{{ $professor->name }}</td>
                    <td>{{ $departments->where('id', $professor->department_id)->pluck('name')->first() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary mt-4 px-5" id="addProfessorTrigger" data-toggle="modal" data-target="#addProfessorModal">Dodaj</button>

        <div class="modal fade" id="addProfessorModal" tabindex="-1" role="dialog" aria-labelledby="addProfessorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProfessorModalLabel">Dodaj profesora</h5>
                        <button type="button" class="close closeProfessor" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control w-100 mb-3" id="professorName" placeholder="Puno ime">
                        <select class="form-select w-100" aria-label="Fakultet" id="professorDepartment">
                            <option selected disabled>Odjel</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeProfessor" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createProfessor">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#addProfessorTrigger').on('click', () => {
                $('#addProfessorModal').modal('toggle')
            })

            $('.closeProfessor').on('click', () => {
                $('#addProfessorModal').modal('toggle')
            })

            $('#createProfessor').on('click', () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                $.ajax({
                    url: "{{ url('/api/professor') }}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        name: $('#professorName').val(),
                        department_id: $('#professorDepartment').val()
                    },
                    success: function(res) {
                        console.log(res)

                        $('#addProfessorModal').modal('toggle')
                        window.location.reload()
                    }
                })
            })
        })
    </script>
@stop