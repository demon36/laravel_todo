@extends('layouts.app')

@section('content')
<h1> tasks </h1>

<div class="list-group">
	@foreach ($tasks as $task)
  <a href="#" class="list-group-item clearfix">
    {{ $task->title }} 
    <span class="pull-right">
      <input type="checkbox" name="done" taskId="{{ $task->id }}"  
      @if($task->done)
        checked
      @endif

      />
      <!-- <form action='/editTrip/'><button type="submit" class="btn btn-xs btn-warning">edit</button></form> -->
      <form action='/delete/{{$task->id}}/' method="get"><button type="submit" class="btn btn-xs btn-danger">remove</button></form>
    </span>
  </a>

  @endforeach
</div>
 
<div class="input-group">
  <form action='/tasks' method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="title" />
    <button type="submit" class="btn btn-default">Add task</button>
  </form>
</div>

@stop
<script type="text/javascript" src="{{ URL::asset('js/jquery-3.1.1.js') }}"></script>
<script type="text/javascript">
$(function(){
$('input[name="done"]').change(function(){
    var isChecked;
    if($(this).is(':checked'))
      isChecked = true;
    else
      isChecked = false;

    $.ajax({
      url : '/update',
      type : 'POST',
      data : {
        '_token' : '{{ csrf_token() }}',
        id : this.getAttribute('taskId'),
        isChecked : isChecked
      }
    });

});
});
</script>