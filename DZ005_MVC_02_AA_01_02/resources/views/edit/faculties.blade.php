@extends('layouts.master')

@section('title', 'Fakultet ' . $faculty->name)

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-col">

        <h1 class="mt-5 fs-3">Uredi fakultet {{$faculty->name}}</h1>
        <form class="w-3/4 mt-4" action="">
            <div class="mb-3">
                <label for="facultyName" class="form-label">Puno ime</label>
                <input type="text" class="form-control" id="facultyName" aria-describedby="facultyNameLabel" value="{{$faculty->name}}">
                <div id="facultyNameLabel" class="form-text">Puni naziv fakulteta</div>
            </div>
            <button type="submit" class="btn btn-primary" id="editCurrentFaculty">Submit</button>
        </form>
    </div>


@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#editCurrentFaculty').on('click', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('/api/faculty') }}",
                    method: 'put',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: {{$faculty->id}},
                        name: $('#facultyName').val(),
                    },
                    success: function(res) {
                        console.log(res)

                        window.location = '/faculties';
                    }
                });
            });
        });
    </script>
@stop
