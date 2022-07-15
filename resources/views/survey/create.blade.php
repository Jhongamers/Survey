@extends('design.app')

@section('title','Survey')

@section('content')
        <div class="container">
            <h1>create survey</h1>
            <hr>
            <form action="{{ route('survey-store') }}" method="POST">
                @csrf
               
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="write your name..." required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Start date</label>
                    <input type="text" name="survey_start"  id="date" class="form-control" placeholder="11/06/2022" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">End date</label>
                    <input type="text" name="survey_end"  id="date" class="form-control" placeholder="12/06/2022" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Answer 1</label>
                    <input type="text" name="answer[]" class="form-control" placeholder="write your first answer..." required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Answer 2</label>
                    <input type="text" name="answer[]" class="form-control" placeholder="write your first answer..." required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Answer 3</label>
                    <input type="text" name="answer[]" class="form-control" placeholder="write your first answer..." required>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primary" onclick="date();" >create</button>
                    <a class="btn btn-danger" href="{{url('list')}}">see other poll</a>
                </div>
              

</form>
</hr>
</div>
<script>
document.querySelector('form').addEventListener('submit', event => {
    event.preventDefault();
    let dateField = document.querySelectorAll('#date');
  dateField[0].value = dateField[0].value.split('/').reverse().join('/');
  dateField[1].value = dateField[1].value.split('/').reverse().join('/');
  document.querySelector('form').submit();
})


</script>

@endsection()