<html>
	<head>
		<title>All Photo</title>
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/profile.css?< php echo time();?>">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>

	</head>
	<body>
		
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">PhotoBlog</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="/photoblog/add">Add Photo</a></li>
						<li><a href="/photoblog/group/add">Add Group</a></li>
						<li><a href="#">Mark</a></li>

						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Action<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Delete</a></li>
								<li><a href="#">Move</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Add to Group</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Small Size</a></li>
								<li><a href="#">Medium size</a></li>
								<li><a href="#">Large size</a></li>
							   <li><a href="#">Extra large </a></li>
							</ul>
						</li>

					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Name <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Profile</a></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
						<li>
							<div class="inputgrpcontainer">
								  <input type="text" name="search" value="Type..." class="inputform">
								 <div class="srchicon">
								 <i class="fa fa-search icon" aria-hidden="true">		</i>
							</div>
					   </li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
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