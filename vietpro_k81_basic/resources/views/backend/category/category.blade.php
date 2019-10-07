@extends('Backend.master.master')
@section('content')
@section('title','Category')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh mục</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-5">
							<form action="" method="post">
								@csrf
								<div class="form-group">
									<label for="">Danh mục cha:</label>
									<select class="form-control" name="parent" id="">
										<option value="0">----ROOT----</option>
										{{ GetCategory($category,0,'',0) }}
									</select>
								</div>
								<div class="form-group">
										<label for="">Tên Danh mục</label>
										<input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới">
										{{ showError($errors,'name') }}
										
									</div>
									<button type="submit" class="btn btn-primary">Thêm danh mục</button>
							</form>
						</div>
						<div class="col-md-7">
							@if(session('false_category'))
								<div class="alert bg-danger" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg> {{ session('false_category') }} <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>	
							@endif()
							@if(session('del_category'))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg> {{ session('del_category') }} <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>	
							@endif()
							
							@if(session('add_category'))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg> {{ session('add_category') }} <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>	
							@endif()
							
							
							<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
							<div class="vertical-menu">
								<div class="item-menu active">Danh mục </div>
								{{ ShowCategory($category,0,'') }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.col-->


	</div>
	<!--/.row-->
</div>
<!--/.main-->
@stop