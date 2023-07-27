<?php
  
namespace App\Http\Controllers;
  
use App\Models\Article;
use App\Models\Author;
use App\Models\Jurusan;
use App\Models\Bidang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
  
class UserController extends Controller
{
    public function index(Request $request): View
    {
        $jurusan = Jurusan::all();
        $bidang = Bidang::all();

        $userQuery = Article::where('article_title', '!=', null);

        $filterBidang = $request->input('filterBidang', 0);
        $filterJurusan = $request->input('filterJurusan', 0);

        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $userQuery->where('article_title', 'LIKE', '%' . $keyword . '%');
        }

        if ($filterBidang != 0) {

            $userQuery->whereHas('jurusan', function ($query) use ($filterBidang) {
                $query->where('id_bidang', $filterBidang);
            });
        }

        if ($filterBidang != 0 && $filterJurusan != 0) {
            $userQuery->where('id_jurusan', $filterJurusan);
        }

        $user = $userQuery->orderBy('created_at', 'desc')->paginate(5);

        // Render view with articles
        return view('user.index', compact('user', 'jurusan', 'bidang'))
            ->with('i', ($user->currentPage() - 1) * $user->perPage());
    }

    public function show(string $id): View
    {
        //get post by ID
        $article = Article::findOrFail($id);

        //render view with post
        return view('user.showArtikel', compact('article'));
    }

    public function create(): View
    {
        $jurusan = Jurusan::all();
        
        return view('user.uploadArtikel', compact('jurusan'));
    }

    public function store(Request $request): RedirectResponse
    {
            //ver 1
        //validate form
        $this->validate($request, [
            'article_title'     => 'required|min:10',
            'abstract'   => 'required',
            'first_name'   => 'required|max:100',
            'middle_name'   => 'required|max:100',
            'last_name'   => 'required|max:100',
            'file'     => 'required|mimes:pdf|max:10000',
        ]);
        $id_user = auth()->user()->id_user;
        $file = $request->file('file');
        $file->storeAs('public/docs', $file->hashName());

        //create post
        $article = Article::create([
            'article_title'     => $request->article_title,
            'abstract'   => $request->abstract,
            'file' => $file->hashName(),
            'id_user' => $id_user,
            'id_jurusan' => $request->id_jurusan
        ]);

        Author::create([
            'article_id' => $article->id,
            'first_name'   => $request->first_name,
            'middle_name'     => $request->middle_name,
            'last_name'   => $request->last_name
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get post by ID
        $article = Article::findOrFail($id);
        $author = Author::all();
        $jurusan = Jurusan::all();

        //render view with post
        return view('user.editArtikel', compact('article'), compact('jurusan'));
    }
    
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'article_title'     => 'required',
            'abstract'   => 'required',
            'first_name'   => 'required|max:100',
            'middle_name'   => 'required|max:100',
            'last_name'   => 'required|max:100',
            'file'     => 'mimes:pdf|max:10000'
        ]);
        $article = Article::find($id);

        if ($request->hasFile('file')) {
            $fileName = Str::random(5).'_'. round(microtime(true) * 1000) . '.' . $request->file->getClientOriginalExtension();
                            $request->file('file')->storeAs('docs', $fileName, 'public');
            $update['file'] = $fileName;
            Storage::disk('public')->delete('docs/'.$article->file);
            $article->update($update);
            $article->update([
                'article_title'     => $request->article_title,
                'abstract'   => $request->abstract,
                'id_jurusan' => $request->id_jurusan
                ]);

            $article->author()->update([
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name')
                ]);              
            } else {
                $article->update([
                'article_title'     => $request->article_title,
                'abstract'   => $request->abstract,
                'id_jurusan' => $request->id_jurusan
                ]);

                $article->author()->update([
                    'first_name' => $request->input('first_name'),
                    'middle_name' => $request->input('middle_name'),
                    'last_name' => $request->input('last_name')
                ]);
        }

        //redirect to index
        return redirect()->route('myartikel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        //get post by ID
        $article = Article::findOrFail($id);

        //delete post
            Storage::disk('public')->delete('docs/'.$article->file);
            $article->delete();

        //redirect to index
        return redirect()->route('myartikel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function getJurusanByBidang($bidangId)
    {
        $jurusans = Jurusan::where('id_bidang', $bidangId)->get();
        return response()->json($jurusans);
    }

    public function filterArtikel(Request $request)
    {
        $query = Article::query();

        $filterBidang = $request->input('filterBidang');
        if ($filterBidang) {
            // Dapatkan semua id_jurusan yang terkait dengan bidang yang dipilih
            $jurusanIds = Jurusan::where('id_bidang', $filterBidang)->pluck('id_jurusan')->toArray();
            $query->whereIn('id_jurusan', $jurusanIds);
        }
    
        $filterJurusan = $request->input('filterJurusan');
        if ($filterJurusan) {
            $query->where('id_jurusan', $filterJurusan);
        }

        $user = $query->get();

        return response()->json($user);
    }
}