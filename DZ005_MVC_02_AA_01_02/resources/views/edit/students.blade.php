@extends('layouts.master')

@section('title', 'Student ' . $student->name)

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-col">

    <h1 class="mt-5 fs-3">Uredi studenta {{$student->name}}</h1>
        <form class="w-3/4 mt-4" action="">
            <div class="mb-3">
                <label for="studentName" class="form-label">Puno ime</label>
                <input type="text" class="form-control" id="studentName" aria-describedby="studentNameLabel" value="{{$student->name}}">
                <div id="studentNameLabel" class="form-text">Ime i prezime studenta</div>
            </div>
            <div class="mb-3">
                <select class="form-select w-100" aria-label="Fakultet" id="editStudentFaculty" >
                    <option selected disabled>Fakultet</option>
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{($student->faculty_id == $faculty->id ? 'selected' : '')}}>{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary" id="editCurrentStudent">Submit</button>
        </form>
    </div>


@stop
@section('scripts')
<script>
    $(document).ready(function() {
        $('#editCurrentStudent').on('click', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('/api/student') }}",
                method: 'put',
                data: {
                    _token: '{{csrf_token()}}',
                    id: {{$student->id}},
                    name: $('#studentName').val(),
                    faculty_id: $('#editStudentFaculty').val()
                },
                success: function(res) {
                    console.log(res)

                    window.location = '/students';
                }
            });
        });
    });
</script>
@stop
