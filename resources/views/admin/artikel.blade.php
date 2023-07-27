@include('includes.header_dash')
@include('admin.sidebar')

<div class="col py-3" id="scrollable">
    <div class="container">
        <div class="row mt-4 bg-light rounded p-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Artikel</li>
            </ol>
            </nav>
    <div class="row align-items-center mb-2">
        <div class="col-md-10">
        <h3>Daftar Artikel</h3>
        </div>
    <div class="col-md-2 text-end">
        <a class="btn btn-primary" href="{{ route('article.create') }}">Tambah</a>
    </div>
    </div>
            <table class="table table-striped w-100" id="jurnalTable">

                <thead>
                    <tr>
                    <!-- <th><input type="checkbox" id="select-all"></th> -->
                    <th scope="col">Judul</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Author</th>
                    <th scope="col">Uploader</th>
                    <th scope="col">Diperbarui</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                    <tr>
                        <!-- <td><input type="checkbox"></td> -->
                        <td width="400px">{{ Str::title($article->article_title) }}</td>
                        @foreach ($article->jurusan()->get() as $jurusan)
                        <td>{{$jurusan->nama_jurusan}}</td>
                        @endforeach

                        @foreach ($article->author()->get() as $author)
                        <td>{{ Str::title ($author->first_name) }} {{ Str::title ($author->middle_name) }} {{ Str::title ($author->last_name) }}</td>
                        @endforeach

                        @foreach ($article->user()->get() as $user)
                        <td>{{$user->name}}</td>
                        @endforeach
                        
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
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.footer')