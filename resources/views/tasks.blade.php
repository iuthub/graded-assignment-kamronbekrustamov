@extends('welcome')

@section('content')
		
		@include('errors')
	    <form action="{{ url('task')}}" method="post">
	    	{{ csrf_field() }}
            <div id="myDIV" class="header">
              <h2>My To-Do-List</h2>
              <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}" placeholder="Title...">
              <button type="submit" class="addBtn">Add</button>
            </div>
        </form>

        @if(count($tasks) > 0)
        <ul id="myUL">
        	@foreach ($tasks as $task)
        		<li>
        			<div class="task">{{ $task->name }}</div>
        			<div class="action"><button><i class="fa fa-edit"></i></button></div>
        			<div class="action">
        				<form action="{{ url('task/'.$task->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit"><i class="fa fa-trash-alt"></i></button>
                        </form>
        			</div>
        		</li>
        	@endforeach
        </ul>
        @endif
@endsection