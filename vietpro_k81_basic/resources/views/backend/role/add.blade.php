
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
								<form class="col-md-8" method="post" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control"  placeholder="Enter Name" name="name">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="name">Display Name</label>
                                        <input type="text" class="form-control"  placeholder="Enter Display Name" name="display_name">
                                    </div>
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Danh sách quyền</th>
                                            <th scope="col">List</th>
                                            <th scope="col">Add</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Del</th>
                                            <th scope="col">Import</th>
                                            <th scope="col">Export</th>
                                            <th scope="col">Order Product</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Product</td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-list"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-add"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-edit"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-del"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-import"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-export"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="prd-order"></td>
                                          </tr>
                                          <tr>
                                            <td>User</td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-list"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-add"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-edit"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="user-del"></td>
                                          </tr>
                                          <tr>
                                            <td>Category</td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-list"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-add"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-edit"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="ctg-del"></td>
                                            </tr>
                                           <tr>
                                            <td>Role</td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-list"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-add"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-edit"></td>
                                            <td><input type="checkbox" class="form-check-input" name="permission[]" value="role-del"></td>
                                            </tr>
                                        </tbody>
                                      </table>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
