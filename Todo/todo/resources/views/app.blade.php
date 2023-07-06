<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>@yield('title')</title>
	<style>
		label{
			font-size:1.5rem;
		}
		#info{
			color:lightgreen;
			font-weight: bold;
			position: relative;
			left: 15rem;
			display: none;
		}
		#info2{
			color:lightgreen;
			font-weight: bold;
			position: relative;
			left: 15rem;
			display: none;
		}
		#todo{
			list-style: binary;
			font-size: 2rem;
			font-family: papyrus;
		}
	</style>
</head>
<body class="bg-primary">
@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" aria-current="page" href="todoList">Todo List</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
				<a class="nav-link active" href="calculator">Calculator</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="numberConverter">Number converter</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="sortNumber">Sort Numbers</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="sortString">Sort strings</a>
				</li>
			</ul>
			</div>
		</div>
	</nav>
@show
    <!---------------------------------------------------------------------------------->
    <div class="row p-5 pt-0">
		@yield('content')
	</div>
	@yield('todo')
	<!---------------------------------------------------------------------------------->
    @yield('script')
	</body>
</html>