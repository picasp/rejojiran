<?php
  
namespace App\Http\Controllers;
  
use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
  
class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        //get posts
        // $articles = Article::latest()->with('author')->paginate(5);

        $articles = Article::where([
            ['article_title', '!=', Null],
            [function ($query) use ($request){
                if (($term = $request->term)) {
                    $query->orWhere('article_title', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->orderBy('id', "desc")
        ->paginate(10);
        
        //render view with posts
        return view('article.index', compact('articles'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        
        return view('article.create');
    }

    public function store(Request $request): RedirectResponse
    {
            //ver 1
        //validate form
        $this->validate($request, [
            'article_title'     => 'required|min:10',
            'abstract'   => 'required|min:10',
            'file'     => 'required|mimes:pdf|max:10000',
        ]);

        $file = $request->file('file');
        $file->storeAs('public/docs', $file->hashName());

        //create post
        $article = Article::create([
            'article_title'     => $request->article_title,
            'abstract'   => $request->abstract,
            'file' => $file->hashName()
        ]);

        Author::create([
            'article_id' => $article->id,
            'first_name'   => $request->first_name,
            'middle_name'     => $request->middle_name,
            'last_name'   => $request->last_name
        ]);

                // dd($newTask);

        // $article = new Article();
        // $article->article_title = $request->input("article_title");
        // $article->abstract = $request->input("abstract");
        // $article->file = $request->input("hashName()");
        // $article->save();

        // $author = new Author();
        // $author->article_id = $article->id;
        // $author->first_name = $request->input("first_name");
        // $author->middle_name = $request->input("middle_name");
        // $author->last_name = $request->input("last_name");
        // $author->save();

                // ver 3
        // $data = $request -> all();

        // Validator::make($data, [
        //     'article_title' => 'required|min:10',
        //     'abstract' => 'required|min:10',
        //     'file' => 'required|mimes:pdf|max:10000',
        // ])->validate();
        
        // $article = Article::make($request -> all());
        // $article -> save();

        // $newauthor = Author::make($request -> all());
        // $article = Article::findOrFail($request -> get('article_id'));
        // $newauthor -> employee() -> associate($article);
        // $newauthor -> save();
        
        // if (array_key_exists('author', $data)) {
        //     $author = Author::findOrFail($data['author']);
        // } else {
        //     $author = [];
        // }
        // $article -> author() -> attach($author); 

        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(string $id): View
    {
        //get post by ID
        $article = Article::findOrFail($id);

        //render view with post
        return view('article.show', compact('article'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $article = Article::findOrFail($id);
        $author = Author::all();

        //render view with post
        return view('article.edit', compact('article'));
    }
    
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'article_title'     => 'required|min:10',
            'abstract'   => 'required|min:10',
            'first_name'   => 'required',
            'middle_name'   => 'required',
            'last_name'   => 'required'
        ]);
        // //get post by ID
        // $article = Article::findOrFail($id);

        // $article->update([
        //     'article_title'     => $request->article_title,
        //     'abstract'   => $request->abstract
        // ]);
        // $author = new Author();
        // $author->update([
        //     'first_name'     => $request->first_name,
        //     'middle_name'   => $request->middle_name,
        //     'last_name'   => $request->last_name
        // ]);

        $article = Article::find($id);

        $article->article_title = $request->input('article_title');
        $article->abstract = $request->input('abstract');
        
        $article->save();

        $article->author()->update([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name')
        ]);
        //redirect to index
        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $article = Article::findOrFail($id);

        //delete post
        $article->delete();

        //redirect to index
        return redirect()->route('article.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}