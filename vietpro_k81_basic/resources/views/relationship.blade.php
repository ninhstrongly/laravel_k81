@php
    //=======1 vs 1================================
    // use App\Model\Users;
    // $user = Users::find(1)->info()->first();
    // dd($user->name);

    //=======1 vs 1N===============================
    // use App\Model\Info;
    // $info = Info::find(1)->users()->first();
    // dd($info->full); 

    //=======1 vs N===============================
    // use App\Model\Category;
    // $cate = Category::find(6);
    // $prd = $cate->prd()->get()->pluck('name')->toarray();
    // dd($prd);

    //========N vs N==============================
    
    

    

   
@endphp