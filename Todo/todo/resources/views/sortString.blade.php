@extends('app')
@section('title', 'Sort String')
	@section('content')
		<div class="col-md">
			<h1 class="container text-center text-white mt-5">Sort string</h1>
			<div class="container mt-3 bg-white p-5" style="border-radius: 1rem;height:40vh">
					<label for="string">Enter String:</label>
					<input type="text" id="string" onmouseover="info2()" onmouseout="infoOut2()" class="form-control mb-3"><span id="info2">Enter strings separated with comma</span><br>
					<label for="sorts">Sorted:</label>
					<input type="text" id="sorts" class="form-control mb-3">
					<div class="container text-center">
						<button class="btn btn-primary" onclick="sasc()">Ascending</button>
						<button class="btn btn-primary" onclick="sdesc()">Descsending</button>
					</div>
			</div>
		</div>
	@endsection
	<!---------------------------------------------------------------------------------->
	@section('script')
		<script>
			function info2(){
				document.getElementById('info2').style.display = "inline-block";
			}function infoOut2(){
				document.getElementById('info2').style.display = "none";
			}
			function sasc(){
				const str = document.getElementById('string').value;
				const arr = str.split(",");
				document.getElementById('sorts').value = arr.sort();
			}
			function sdesc(){
				const str = document.getElementById('string').value;
				const arr = str.split(",");
				document.getElementById('sorts').value = arr.sort().reverse();
			}
		</script>
	@endsection
	</body>
</html>