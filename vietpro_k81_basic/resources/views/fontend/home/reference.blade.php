@extends('fontend.master.master')
@section('content')
<!-- main -->
<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3>Tham khảo giá GET API</h3>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            @foreach($dn_view as $k=>$val)
                                <th>{{ $val }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($view_result as $key=>$value)
                        <tr>
                                <td>{{  $key }}</td>
                                @foreach($dn_view as $k=>$val)
                                    @if($val == $value[$k]['MonthYear'])
                                        <td>{{ $value[$k]['AveragePrice'] }}</td>
                                    @endif
                                @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <h3>Post API</h3>
                <form action="" method="post">
                    @csrf
                    <input type="text" name="name"><br>
                    <input type="text" name="price"><br>
                    <input type="text" name="status"><br>
                    <input type="submit" value="SUBMIT"><br>
                </form>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <h3>Biểu đồ</h3>
                
            </div>
            
        </div>
    </div>
</div>
<div id="map" class="colorlib-map"></div>
<!-- end main -->
@stop

