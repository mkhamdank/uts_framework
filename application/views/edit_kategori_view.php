<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kategori</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo site_url('kategori'); ?>">Kategori</a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?php echo site_url('kategori') ?>">Kategori</a></li>
							<li><a href="<?php echo site_url('kategori/create'); ?>">Tambah Kategori</a></li>
						</ul>
						
						
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>Update Kategori</h1>
				<?php echo form_open_multipart('kategori/update/'.$this->uri->segment(3)); ?>
								<legend>Update Data Kategori</legend>
								<?php echo validation_errors(); ?>
								<div class="form-group">
									<label for="">Nama Kategori</label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kategori" value="<?php echo $kategori[0]->nama ?>">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
				<?php echo form_close(); ?>
			</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>