@extends('app')
@section('title', 'Sort Number')
@section('content')
		<div class="col-md">
			<h1 class="container text-center text-white mt-5">Sort numbers</h1>
			<div class="container mt-3 bg-white p-5" style="border-radius: 1rem;height:40vh">
					<label for="array">Enter numbers:</label>
					<input type="text" id="array" onmouseover="info()" onmouseout="infoOut()" class="form-control mb-3"><span id="info">Enter numbers separated with comma</span><br>
					<label for="sort">Sorted:</label>
					<input type="text" id="sort" class="form-control mb-3">
					<div class="container text-center">
						<button class="btn btn-primary" onclick="asc()">Ascending</button>
						<button class="btn btn-primary" onclick="desc()">Descsending</button>
						<button class="btn btn-primary" onclick="rand()">Random</button>
					</div>
			</div>
		</div>
@endsection
	<!---------------------------------------------------------------------------------->
@section('script')
		<script>
			function info() {
				document.getElementById('info').style.display = "inline-block";
			}
			function infoOut(){
				document.getElementById('info').style.display = "none";
			}
			function asc(){
				const str = document.getElementById('array').value;
				const arr = str.split(",");
				document.getElementById('sort').value = arr.sort(function(a, b){return a - b});
			}
			function desc(){
				const str = document.getElementById('array').value;
				const arr = str.split(",");
				document.getElementById('sort').value = arr.sort(function(a, b){return b - a});
			}
			function rand(){
				const str = document.getElementById('array').value;
				const arr = str.split(",");
				document.getElementById('sort').value = arr.sort(function(){return 0.5 - Math.random()});
			}
		</script>
@endsection
	</body>
</html>