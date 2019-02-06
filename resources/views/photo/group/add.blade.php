<html>
	<head>
		<title>Add Photo</title>
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/profile.css">
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
		            <a class="navbar-brand" href="/photoblog">PhotoBlog</a>
		        </div>
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <ul class="nav navbar-nav navbar-right">
		                <li class="dropdown">
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Name <span class="caret"></span></a>
		                    <ul class="dropdown-menu">
		                        <li><a href="#">Profile</a></li>
		                        <li><a href="#">Logout</a></li>
		                    </ul>
		                </li>
		            </ul>
		        </div>
		        <!-- /.navbar-collapse -->
		    </div>
		    <!-- /.container-fluid -->
		</nav>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<form action="/photoblog/group/save" method="post">{{ csrf_field() }}
						<div class="form-group">
							<label for="">Enter Group Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter Group Name">
							<label for="" class="text-danger">{{ $errors->first("name")}}</label>
						</div>
						<div class="form-group">
							<input type="submit" value="Add" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>