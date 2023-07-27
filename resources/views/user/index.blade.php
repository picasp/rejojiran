@include('includes.header')
<div class="col" id="scrollable-2">
    <div class="container">
        <div class="row mt-4 rounded p-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
            </nav>
            <div class="mb-3">
                <div class="d-flex">
                    @guest
                    <div class="me-2"> <a href="{{ route('article.create') }}" class="btn btn-md btn-success ">Upload</a> </div>
                    @endguest
                    
                    <form action="{{ route('user.index') }}" method="GET" id="filterForm" class="d-flex">
                        @csrf
                    <div class="me-2">
                    <select class="form-select" aria-label="kategori artikel" name="filterBidang" id="filterBidang" style="width: 110px;">
                        <option selected="selected" value="0">Bidang</option>
                        @foreach($bidang as $row)
                                <option value="{{ $row->id_bidang }}">{{ $row->nama_bidang }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="me-2">
                    <select class="form-select" aria-label="kategori artikel" name="filterJurusan" id="filterJurusan" style="width: 110px;">
                        <option selected="selected" value="0">Jurusan</option>
                    </select>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                    </form>
                
                <form action="{{ route('user.index') }}" class="subnav-search d-flex flex-nowrap ms-auto" method="get" role="search" name="search-form" id="search-form">
                <input class="form-control search rounded-start rounded-0 border-end-0" name ="keyword" type="search" placeholder="Cari Judul" aria-label="Search" id="keyword">
                <button class="btn rounded-end rounded-0 border-start-0" type="submit" id="search-btn">Cari</button>
                </div>
            </div>
            <div class="dataArtikel">
            @forelse ($user as $article)
            <div class="card mb-2" id="list-item">
                <div class="card-body">
                    <a href="{{ route('user.show', $article->id) }}" class="stretched-link"><h4 class="card-title">{{ Str::title($article->article_title) }}</h5></a>
                    <div>
                        @foreach ($article->author()->get() as $author)
                        <span class="card-subtitle mb-2 text-muted">{{ Str::title ($author->first_name) }} {{ Str::title ($author->middle_name) }} {{ Str::title ($author->last_name) }}</span>
                        @endforeach
                        <span>-</span>

                        @foreach ($article->jurusan()->get() as $jurusan)
                        <span class="card-subtitle mb-2 text-muted">{{$jurusan->nama_jurusan}}</span>
                        @endforeach

                        <!-- nama bidang -->
                        <span hidden></span>
                    </div>
                    <p class="card-text">{!! Str::limit($article->abstract, 320) !!}</p>
                </div>
            </div>
            @empty
                <div class="alert alert-danger">
                    TIdak ada artikel yang ditemukan.
                </div>
            @endforelse
            </div>
        </div>
        <nav class="pagination pagination-sm">
    {{ $user->links() }}
</nav>
    </div>
</div>
@include('includes.footer')