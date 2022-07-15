@extends('design.app')

@section('title','Survey')

@section('content')

<div class="container mt-5">

<td><a class="btn btn-secondary" href="{{url('create')}}">create poll</a></td>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Preview</th>
      <th scope="col">Status</th>
     
    </tr>
  </thead>
  <tbody>

  @foreach($surveys as $survey)

@php 
$now = Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'), 'America/Sao_Paulo');
$start = Carbon\Carbon::createFromFormat('Y-m-d', $survey->survey_start, 'America/Sao_Paulo');
$end = Carbon\Carbon::createFromFormat('Y-m-d', $survey->survey_end, 'America/Sao_Paulo');
@endphp


    <tr>
      <th scope="row">{{$survey->id}}</th>
      <td>{{$survey->title}}</td>
      <td>{{$survey->survey_start}}</td>
      <td>{{$survey->survey_end}}</td>
      <td><a class="btn btn-primary" href="{{url('ask' , [ 'id' => $survey->id ])}}">see poll</a></td>

      @if($now->greaterThanOrEqualTo($start) && $now->lessThanOrEqualTo($end))
      <td>Poll is active </td>




@elseif($now->lessThan($start))
<td>Attention this poll has not started</td>
      <td></td>


@elseif($now->greaterThan($end))
<td>    Attention this poll is over</td>
      <td></td>
@endif

</tr>


@endforeach
  </tbody>
</table>
</div>
@endsection()