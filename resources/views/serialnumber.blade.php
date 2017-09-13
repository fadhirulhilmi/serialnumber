<!DOCTYPE html>
<html>
<head>
	<title>Serial Number</title>
</head>
<body>
	<h1>Serial Number</h1>
	<hr>

	<div class="form-group">
		<form method="POST" action="{{ Route('calculateSerialNumber') }}">
		{{ csrf_field() }}
			<label>From</label>
			<input class="form-control" name="serial_from" id="serial_from" value="{{ $fix_number.$serial_from }}">

			<label>To</label>
			<input class="form-control" name="serial_to" id="serial_to" value="{{ $fix_number.$serial_to }}">

			<button type="submit" id="btnsubmit" name="btnsubmit">Submit</button>
		</form>
	</div><br><br>

	<div class="form-group">
		@for($i=$serial_from; $i<=$serial_to; $i++)
			{{ $fix_number.str_pad($i, strlen($serial_to), '0', STR_PAD_LEFT) }}<br>
		@endfor
	</div>

</body>
</html>