<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Product,Category};
class HomeController extends Controller
{
    function getAbout(){
        return view('fontend.home.about');
    }
    function getContact(){
        return view('fontend.home.contact');
    }
    function getIndex(){
        $data['prd_ft'] = Product::where('featured',1)->take(4)->get();
        $data['prd_new'] = Product::orderBy('id','desc')->take(8)->get();
        return view('fontend.index',$data);
    }

    function getPrdCate($slug)
    {
      
        $data['prds'] = Category::where('slug',$slug)->first()->prd()->paginate(6);
        $data['category'] = Category::all();
        return view('/fontend.product.shop',$data);
    }
    function getFinter(Request $r)
    {
        $data['prds']=product::whereBetween('price',[$r->start,$r->end])->paginate(6);
        $data['category']=Category::all();
        return view('/fontend.product.shop',$data);
    }

    function getReference(){
        $init = curl_init();
        curl_setopt($init,CURLOPT_URL,'https://service.homedy.com/LocalMarketReports/GetDetail?NumberOfMonth=-6&CityId=1');
        curl_setopt($init,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($init);
        curl_close($init);
        $json = json_decode($result,true);
        
        $CategoryId = [];
        
        foreach($json['data'] as $key=>$value){
            $CategoryId[] = $value['CategoryId'];
        }
        $CategoryId = array_unique($CategoryId);

        $ctg_view['ctg_view'] =  $CategoryId;
        $date = [];
        foreach($json['data'] as $key=>$value){
            $date[] = $value['MonthYear'];
        }
        $date = array_unique($date);

        $date_view['d_view'] = $date;
        $date_new = [];
        foreach($date as $key=>$value){
            $date_new[] = $value;
        }
        $dn_view['dn_view'] = $date_new;
        $result = [];
        foreach($json['data'] as $key=>$value){
           foreach($CategoryId as  $k=>$val){
               if ($value['CategoryId'] == $CategoryId[$k]) {
                    $result[$CategoryId[$k]][] = $value;
               } 
           }
          
        } 
        $result_view['view_result'] = $result;
        
        return view('/fontend.home.reference',$dn_view,$result_view,$ctg_view,$date);
    }
    public function postReference(Request $r)
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $curl =  curl_init();
        curl_setopt($curl,CURLOPT_URL,'http://5d98112b61c84c00147d6d37.mockapi.io/api/products/');
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'name='.$name.'&status='.$status.'&price='.$price.''); 
        $result = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($result,true);

        echo '<pre>';
        print_r($json);
        echo '</pre>';
    }
    public function getSearch(Request $r)
    {

       echo $r->search;
    }
}
