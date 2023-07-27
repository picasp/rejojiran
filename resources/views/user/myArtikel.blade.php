@include('includes.header')
<div class="col py-3" id="scrollable-2">
    <div class="container">
        <div class="row mt-4 bg-light rounded p-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/user">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Artikel Saya</li>
        </ol>
        </nav>
        <h3>Artikel Saya</h3>
            <table class="table table-striped w-100" id="jurnalTable">
                <thead>
                <tr>
                    <th style="width:40%">Judul</th>
                    <th>Author</th>
                    <th>Uploader</th>
                    <th>Jurusan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($articles as $article)
                    <tr class="table-row">
                    <td><a href="{{ route('user.show', $article->id) }}">{{ Str::title($article->article_title) }}</a></td>
                    @foreach ($article->author()->get() as $author)
                    <td>{{ Str::title ($author->first_name) }} {{ Str::title ($author->middle_name) }} {{ Str::title ($author->last_name) }}</td>
                    @endforeach

                    @foreach ($article->user()->get() as $user)
                    <td>{{$user->name}}</td>
                    @endforeach

                    @foreach ($article->jurusan()->get() as $jurusan)
                    <td>{{$jurusan->nama_jurusan}}</td>
                    @endforeach
                    <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $article->id) }}" method="POST">
                                <a href="{{ route('user.edit', $article->id) }}" class="btn btn-sm btn-primary bi bi-pencil-fill"></a>
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

<!-- Modal HTML -->
<!-- <div id="exampleModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Apa anda yakin?</h4>	
                <a data-bs-dismiss="modal" class="close" type="button"><i class="bi bi-x-lg"></i></a>
			</div>
			<div class="modal-body">
				<p>Apakah Anda benar-benar ingin menghapus artikel ini? Proses ini tidak dapat dibatalkan.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="/user/delete/" method="POST">
                <input type="hidden" name="_method" value="DELETE">
				    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
			</div>
		</div>
	</div>
</div>      -->
@include('includes.footer')