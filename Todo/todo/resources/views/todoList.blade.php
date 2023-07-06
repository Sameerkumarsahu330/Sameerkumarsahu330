@extends('app')
@section('title', 'Todo List')
	@section('content')
		<div class="col-md-6">
			<h1 class="container text-center text-white mt-5">Todo List</h1>
			<div style="border-radius:1rem;height:40vh" class="bg-white ">
				<p id="todo" class="p-3 text-center mt-3" style="height:27vh;overflow-y: auto;">No Tasks Available</p>
				<input type="text" id="todoInput" class="form-control" placeholder="Enter Task" style="border:1px solid black"><br>
				<div class="container text-center">
					<button onclick="todo()" class="btn btn-success">Add to list</button>
				</div>
			</div>
		</div>
	@endsection
	<!---------------------------------------------------------------------------------->

	@section('todo')
	<div class="container bg-white">
		<p>Todo</p>
		<ul class="list-group list-group-numbered">
		@foreach ($todo_list as $item)
			<li class="list-group-item">{{$item->task}}</li>
		@endforeach
		</ul>
	</div>
	@endsection

	<!---------------------------------------------------------------------------------->
	@section('script')
		<script>
			let input = "<ul>";
			function todo(){
				input += "<li>" + document.getElementById('todoInput').value + "</li>";
				document.getElementById('todo').innerHTML = input;
			}
			input += "</ul>";
		</script>
	@endsection
	</body>
</html>