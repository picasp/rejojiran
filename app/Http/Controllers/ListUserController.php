<?php
  
namespace App\Http\Controllers;
  
use App\Models\Article;
use App\Models\Author;
use App\Models\User;
use App\Models\Bidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
  
class ListUserController extends Controller
{
    public function index(Request $request): View
    {
        $user = User::all();
        return view('admin.list_user', compact('user'));
    }
}