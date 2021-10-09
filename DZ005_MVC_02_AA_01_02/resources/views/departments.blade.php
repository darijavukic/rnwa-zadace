@extends('layouts.master')

@section('title', 'Odjeli')

@section('content')
    <h1 class="w-100 mt-5">Odjeli</h1>
    <div class="departments-wrap w-100 py-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime odjela</th>
                    <th scope="col">Fakultet</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{ $department->id }}</th>
                    <td>{{ $department->name }}</td>
                    <td>{{ $faculties->where('id', $department->faculty_id)->pluck('name')->first() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary mt-4 px-5" id="addDepartmentTrigger" data-toggle="modal" data-target="#addDepartmentModal">Dodaj</button>

        <div class="modal fade" id="addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="addDepartmentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDepartmentModalLabel">Dodaj profesora</h5>
                        <button type="button" class="close closeDepartment" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control w-100 mb-3" id="departmentName" placeholder="Ime odjela">
                        <select class="form-select w-100 mb-3" aria-label="Faculty" id="departmentFaculty">
                            <option selected disabled>Fakultet</option>
                            @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeDepartment" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createDepartment">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#addDepartmentTrigger').on('click', () => {
                $('#addDepartmentModal').modal('toggle')
            })

            $('.closeDepartment').on('click', () => {
                $('#addDepartmentModal').modal('toggle')
            })

            $('#createDepartment').on('click', () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                $.ajax({
                    url: "{{ url('/api/department') }}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        name: $('#departmentName').val(),
                        faculty_id: $('#departmentFaculty').val(),
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