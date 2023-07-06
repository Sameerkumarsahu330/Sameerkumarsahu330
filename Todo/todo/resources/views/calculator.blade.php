@extends('app')
@section('title', 'Calculator')
@section('content')
		<div class="col-md">
			<h1 class="container text-center text-white mt-5">Calculator</h1>
			<div class="container mt-3 bg-white p-5" style="border-radius: 1rem;height:40vh">
					<label for="number1">Enter first number:</label>
					<input type="number" id="number1" class="form-control mb-3">
					<label for="number2">Enter second number:</label>
					<input type="number" id="number2" class="form-control mb-3">
					<label for="result">Result:</label>
					<input type="number" id="result" class="form-control mb-3">
					<div class="container text-center">
						<button class="btn btn-primary" onclick="add()">Add</button>
						<button class="btn btn-primary" onclick="sub()">Subtract</button>
						<button class="btn btn-primary" onclick="mul()">Multiply</button>
						<button class="btn btn-primary" onclick="div()">Divide</button>
					</div>
			</div>
		</div>
@endsection
	<!---------------------------------------------------------------------------------->
@section('script')
		<script>
			function add(){
				let number1 = parseInt(document.getElementById('number1').value);
				let number2 = parseInt(document.getElementById('number2').value);
				document.getElementById('result').value = number1 + number2;
			}
			function sub(){
				let number1 = parseInt(document.getElementById('number1').value);
				let number2 = parseInt(document.getElementById('number2').value);
				document.getElementById('result').value = number1 - number2;
			}
			function mul(){
				let number1 = parseInt(document.getElementById('number1').value);
				let number2 = parseInt(document.getElementById('number2').value);
				document.getElementById('result').value = number1 * number2;
			}
			function div(){
				let number1 = parseInt(document.getElementById('number1').value);
				let number2 = parseInt(document.getElementById('number2').value);
				document.getElementById('result').value = number1 / number2;
			}
		</script>
@endsection
	</body>
</html>