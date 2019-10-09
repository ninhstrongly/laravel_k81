<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="/"><img src="images/logo.png" alt="" style="width: 300px;height: 50px;"></a></div>
				</div>
				<div class="col-xs-2" ">
					<div style="margin:0px 0px 0px 130px">
						<input  id="search" name="search" type="text" style="border:1px solid gray;height: 30px;width:200px;margin-top:8px;" placeholder="Search">
					</div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li class="active"><a href="/">Trang chủ</a></li>
						<li class="has-dropdown">
							<a href="/product/shop">Cửa hàng</a>
							<ul class="dropdown">
								<li><a href="/cart">Giỏ hàng</a></li>
								<li><a href="/checkout">Thanh toán</a></li>
							</ul>
						</li>
						<li><a href="/home/about">Giới thiệu</a></li>
						<li><a href="/home/contact">Liên hệ</a></li>
						<li><a href="/home/reference">Khảo sát giá</a></li>
						<li><a href="/cart><i class="icon-shopping-cart"></i> Giỏ hàng[{{ Cart::count() }}] </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
<!-- End header -->
@section('script')
@parent
<script>
	$(document).ready(function(){
		$('#search').keyup(function(){
			$txtSearch = $(this).val();
			if($txtSearch != ''){
				$.ajax({
					url:"{{ route('search') }}",
					type:'get',
					data:{
						search:$txtSearch,
					},
					dataType:'json',
					success:function(data){
						alert(data);
					}
					
				});
			}
		})
	})
	
</script>
@endsection