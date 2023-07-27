<?php
  
namespace App\Http\Controllers;
  
use App\Models\Article;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
  
class MyArtikel extends Controller
{
    public function index(Request $request): View
    {
        $id_user = auth()->user()->id_user;
        $articles = Article::where('id_user', $id_user)->get();
        return view('user.myartikel', compact('articles'));
    }
}