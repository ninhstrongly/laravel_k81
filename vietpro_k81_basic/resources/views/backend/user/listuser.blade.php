@extends('backend.master.master')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
									
								@if(session('add_user'))
									<div class="alert bg-success" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{ session('add_user') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								@endif
								@if(session('edit_user'))
									<div class="alert bg-success" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{ session('edit_user') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								@endif
								@if(session('del_user'))
									<div class="alert bg-success" role="alert">
										<svg class="glyph stroked checkmark">
											<use xlink:href="#stroked-checkmark"></use>
										</svg>{{ session('del_user') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								@endif
								<a href="/admin/user/add" class="btn btn-primary">Thêm Thành viên</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Email</th>
											<th>Full</th>
											<th>Address</th>
                                            <th>Phone</th>
											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									@foreach($users as $row)
									<tbody>
                                        <tr>
											<td>{{ $row->id }}</td>
											<td>{{ $row->email }}</td>
											<td>{{ $row->full }}</td>
											<td>{{ $row->address }}</td>
                                            <td>{{ $row->phone }}</td>
											<td width='20%'>
												<a href="/admin/user/edit/{{ $row->id }}" class="btn btn-warning"><i class="fa" aria-hidden="true"></i> Sửa</a>
												<a href="/admin/user/del/{{ $row->id }}" class="btn btn-danger"><i class="fa " aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
								
									</tbody>
									@endforeach
								</table>
								<div align='right'>
									<ul class="pagination">
										{{ $users->links() }}
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->
@stop