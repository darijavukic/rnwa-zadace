@extends('layouts.master')

@section('title', 'Fakulteti')

@section('content')
    <h1 class="w-100 mt-5">Fakulteti</h1>
    <div class="faculties-wrap w-100 py-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime fakulteta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                <tr>
                    <th scope="row">{{ $faculty->id }}</th>
                    <td>{{ $faculty->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary mt-4 px-5" id="addFacultyTrigger" data-toggle="modal" data-target="#addFacultyModal">Dodaj</button>

        <div class="modal fade" id="addFacultyModal" tabindex="-1" role="dialog" aria-labelledby="addFacultyModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFacultyModalLabel">Dodaj profesora</h5>
                        <button type="button" class="close closeFaculty" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control w-100 mb-3" id="facultyName" placeholder="Ime odjela">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeFaculty" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createFaculty">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#addFacultyTrigger').on('click', () => {
                $('#addFacultyModal').modal('toggle')
            })

            $('.closeFaculty').on('click', () => {
                $('#addFacultyModal').modal('toggle')
            })

            $('#createFaculty').on('click', () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                $.ajax({
                    url: "{{ url('/api/faculty') }}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        name: $('#facultyName').val(),
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