@extends('design.app')

@section('title','Survey')

@section('content')
@php 
$now = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'), 'America/Sao_Paulo');
$start = Carbon\Carbon::createFromFormat('Y-m-d', $surveys->survey_start, 'America/Sao_Paulo');
$end = Carbon\Carbon::createFromFormat('Y-m-d', $surveys->survey_end, 'America/Sao_Paulo');
@endphp
        <div class="container">
            <h1>create survey</h1>
            <hr>
            <form action="{{ route('survey-update',['id' => $surveys->id]) }}" method="POST">
                @csrf
                @method('PUT')
                @if($now->greaterThan($end))
                    <div class="alert alert-danger">
                    Attention this poll is over
                    </div>
                @endif

                @if($now->lessThan($start))
                <div class="alert alert-primary">
                Attention this poll has not started
                    </div>
                @endif
               @foreach($asks as $ask)


                <div class="form-group">
               
                <label>{{$surveys->title}}</label>
                <br>
                    {{$surveys->id}}
                    @if($now->greaterThanOrEqualTo($start) && $now->lessThanOrEqualTo($end))
                    <input type="radio" name="id"  id="id" value="{{$ask->id}}" class="form-check-input" required>
                    @endif    
                    <label>{{$ask->questions}}</label>
              
                    <div class="progress position-relative" style="width:30%;">
                    <div class="progress-bar" id="votes" role="progressbar" style="width: {{$ask->votes}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <small style="color:black;" class="justify-content-center d-flex position-absolute w-100">{{$ask->votes}}</small>
                    </div>
              
                </div>
                </div>
                <br>
                @endforeach
                <div class="form-group">
                @if($now->greaterThanOrEqualTo($start) && $now->lessThanOrEqualTo($end))
              
                    <button class="btn btn-primary">vote</button>
     

            @endif

  

            <a class="btn btn-danger" href="{{url('list')}}">see other polls</a>
   
      
            </div>
</form>
</hr>
</div>
<script>
var publico = document.querySelector('h1');
var  ids = document.querySelectorAll('#id');
window.Echo.channel('public-channel')
.listen('publicChannel', (e) => {
        for(let i= 0; i < ids.length; i++){
            if(ids[i].value == e.message){
             
                if(e.message){
                        var calc = ids[i].nextElementSibling.nextElementSibling.getElementsByTagName('small')[0].innerHTML;
                        ids[i].nextElementSibling.nextElementSibling.querySelector('#votes').style.width = `${+calc+1}%`;
                    ids[i].nextElementSibling.nextElementSibling.getElementsByTagName('small')[0].innerHTML = +calc+1;
              
                }
    
            }
        }
     
         
      
          
});



</script>
@endsection()