<html>
	<head>
		<title>All Photo</title>
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/profile.css?< php echo time();?>">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>

	</head>
	<body>
		
		<div class="mrow">
			<div class="flush-message">
				@if( session()->get("message") )
					<h3 class="text-danger">{{ session()->get("message")}}</h3>
				@endif
			</div>
		</div>
<!-- ================================main===================== -->
		<div class="mmain">
			<div class="mcol-3">
				<div class="mrow">
					<div class="group">
						<ul>
							@foreach( $groups as $group )
								<li>{{ $group->name }}</li>
							@endforeach
							
						</ul>
					</div>
				</div>
			</div>		
			<div class=" mcol-9 ">
				<div class="mrow gallery">
					@foreach( $photos as $photo )
					<div class="galleryimg">
						<img src="{{ config('upload.photo').$photo->name }}" alt="" class="myimg">
					</div>
					@endforeach 
				</div>
			 </div>
		</div>

	</body>
</html>

<style>
	.myimg{
		width: 200px;
	}
	.flush-message {
		display: block;
		float: right;
		border: 1px solid gray;
		background-color: skyblue;
		padding: 16px 12px;
	}
</style>

<script>
	var t = null;
	window.onload = function() {
		
		t = setInterval( hideMessage, 3000);
	}

	function hideMessage() {
		var allm = document.querySelectorAll(".flush-message");
		for( var  i =0; i< allm.length; i++) {
			$(allm[i]).hide();
			clearInterval( t );
		}
	}
</script>