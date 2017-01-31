@extends('layouts\Master')
@section('content')
@php 
$options = DB::table('decisions')->get();
$rando = (rand(1,count(DB::table('decisions')->get())));
@endphp
@if(count(DB::table('decisions')->get()) == 0)
<p>Please add options to the decision matrix first...</p>
@else
    @foreach($options as $option)
    @if($option->choiceID == $rando)
        <b><tr><td>{{$option->choiceID}} - {{$option->choices}}</td></tr></b></br>
    @else 
    	<tr><td>{{$option->choiceID}} - {{$option->choices}}</td></tr></br>
	@endif    
    @endforeach
    <p>You must do option {{$rando}}!</p>
    @endif
@endsection