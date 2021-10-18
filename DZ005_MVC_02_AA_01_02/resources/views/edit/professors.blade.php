@extends('layouts.master')

@section('title', 'Profesor ' . $professor->name)

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-col">

        <h1 class="mt-5 fs-3">Uredi profesora {{$professor->name}}</h1>
        <form class="w-3/4 mt-4" action="">
            <div class="mb-3">
                <label for="professorName" class="form-label">Puno ime</label>
                <input type="text" class="form-control" id="professorName" aria-describedby="professorNameLabel" value="{{$professor->name}}">
                <div id="professorNameLabel" class="form-text">Ime i prezime profesora</div>
            </div>
            <div class="mb-3">
                <select class="form-select w-100" aria-label="Fakultet" id="professorDepartment" >
                    <option selected disabled>Odjel</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{($professor->department_id == $department->id ? 'selected' : '')}}>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary" id="editCurrentProfessor">Submit</button>
        </form>
    </div>


@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#editCurrentProfessor').on('click', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/api/professor') }}",
                    method: 'put',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: {{$professor->id}},
                        name: $('#professorName').val(),
                        department_id: $('#professorDepartment').val()
                    },
                    success: function(res) {
                        console.log(res)

                        window.location = '/professors';
                    }
                });
            });
        });
    </script>
@stop
