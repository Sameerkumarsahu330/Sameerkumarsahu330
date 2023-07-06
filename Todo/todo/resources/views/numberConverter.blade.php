@extends('app')
@section('title', 'Number Converter')
@section('content')
		<div class="col-md">
			<h1 class="container text-center text-white mt-5">Number converter</h1>
			<div class="container mt-3 bg-white p-5" style="border-radius: 1rem;height:40vh">
					<label for="decimal">Enter decimal number:</label>
					<input type="number" id="decimal" class="form-control mb-3">
					<label for="convert">Converted:</label>
					<input type="number" id="convert" class="form-control mb-3">
					<div class="container text-center">
						<button class="btn btn-primary" onclick="binary()">Binary</button>
						<button class="btn btn-primary" onclick="octal()">Octal</button>
						<button class="btn btn-primary" onclick="hexa()">HexaDecimal</button>
					</div>
			</div>
		</div>
@endsection
	<!---------------------------------------------------------------------------------->
@section('script')
		<script>
			function binary(){
				let decimal = parseInt(document.getElementById('decimal').value);
				document.getElementById('convert').value = decimal.toString(2);
			}
			function octal(){
				let decimal = parseInt(document.getElementById('decimal').value);
				document.getElementById('convert').value = decimal.toString(8);
			}
			function hexa(){
				let decimal = parseInt(document.getElementById('decimal').value);
				document.getElementById('convert').value = decimal.toString(16);
			}
		</script>
@endsection
	</body>
</html>