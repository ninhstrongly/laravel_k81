<?php 

namespace Unicorn\Author\Http\Controllers;

use App\Http\Controllers\Controller;
use Unicorn\Author\Models\Role;
class AuthorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $data = Role::first();
        return view('author::index',compact('data'));
    }
}