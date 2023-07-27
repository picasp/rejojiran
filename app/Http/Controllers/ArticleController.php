<?php
  
namespace App\Http\Controllers;
  
use App\Models\Article;
use App\Models\Author;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
  
class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $articles = Article::all();
        // dd($articles);
        return view('admin.artikel', compact('articles'));
    }

    public function create(): View
    {
        $jurusan = Jurusan::all();
        
        return view('admin.addArtikel', compact('jurusan'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'article_title'     => 'required',
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

        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(string $id): View
    {
        //get post by ID
        $article = Article::findOrFail($id);

        //render view with post
        return view('admin.showArtikel', compact('article'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $article = Article::findOrFail($id);
        $author = Author::all();
        $jurusan = Jurusan::all();

        //render view with post
        return view('admin.editArtikel', compact('article'), compact('jurusan'));
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
        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        //get post by ID
        $article = Article::findOrFail($id);

        //delete post
            Storage::disk('public')->delete('docs/'.$article->file);
            $article->delete();

        //redirect to index
        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}