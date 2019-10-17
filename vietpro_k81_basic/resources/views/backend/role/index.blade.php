@extends('backend.master.master')
@section('content')
@section('title','Detail Oder')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng / Chi tiết đặt hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đặt hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<a href="{{ route('role.add') }}" class="btn btn-primary">Add</a>
										</div>
									</div>
								</div>
								<table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Display Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($list as $row) 
                    <tr>
                      <th scope="row">{{ $loop->index +1 }}</th>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->display_name }}</td>
                      <td>
                          <a class="btn btn-primary" href="{{ route('role.edit', ['id' => $row->id]) }}" >Edit</a>
                          <a class="btn btn-danger" href="{{ route('role.del',['id'=>$row->id]) }}" >Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
								
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@stop
