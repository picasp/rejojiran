@extends('auth.layouts')
@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Kumpulan Artikel</h3>       
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div>
                            <div class="d-flex mb-4">
                            <a href="{{ route('article.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                            <form action="{{ route('article.index') }}" class="subnav-search d-flex flex-nowrap ms-auto" method="get" role="search">
                            <input class="form-control search mb-3 rounded-start rounded-0 border-end-0" name ="term" type="search" placeholder="Pencarian" aria-label="Search" id="term">
                            <button class="btn btn-success mb-3 rounded-end rounded-0 border-start-0" type="submit">Cari</button>
                            </form>
                            </div>
                        </div>
                        <table class="table table-bordered tab-index">
                            <thead>
                              <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Abstrak</th>
                                <th scope="col" >Author</th>
                                <th scope="col">Ditambahkan</th>
                                <th scope="col">Diperbarui</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($articles as $article)
                                <tr>
                                    <td width="200px">{{ Str::title($article->article_title) }}</td>
                                    <td width="300px">{!! $article->abstract !!}</td>
                                    @foreach ($article->author()->get() as $author)
                                    <td>{{ Str::upper ($author->first_name) }} {{ Str::upper ($author->middle_name) }} {{ Str::upper ($author->last_name) }}</td>
                                    @endforeach
                                    <td>{{ $article->created_at->toDateString() }}</td>
                                    <td>{{ $article->updated_at->toDateString() }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('article.destroy', $article->id) }}" method="POST">
                                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-dark bi bi-eye-fill"></a>
                                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-primary bi bi-pencil-fill"></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger bi bi-trash-fill"></button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      TIdak ada artikel yang ditemukan.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection    
