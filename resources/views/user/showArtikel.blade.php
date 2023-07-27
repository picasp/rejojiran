@include('includes.header')

<div class="container" id="scrollable-2">
    <div class="row mt-4">
        <!-- Konten Utama -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body mx-3 py-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/user">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::title($article->article_title) }}</li>
                        </ol>
                    </nav>
                    <h4>{{ Str::title($article->article_title) }}</h4>
                    <div>
                        <span class="card-subtitle mb-2 text-muted">{{Str::title ($article->author->first()->first_name)}} {{Str::title ($article->author->first()->middle_name)}} {{Str::title ($article->author->first()->last_name)}}</span>
                        <span>-</span>
                        @foreach ($article->jurusan()->get() as $jurusan)
                        <span class="card-subtitle mb-2 text-muted">{{$jurusan->nama_jurusan}}</span>
                        @endforeach
                    </div>
                    <br><br>
                    <label class="fw-bold">Abstrak</label>
                    <p>
                    {!! $article->abstract !!}
                    </p>
                    <label class="fw-bold">Preview</label>
                    <br>
                    <iframe src="{{ Storage::url('docs/' . $article->file) }}"></iframe>
                </div>
            </div>
        </div>

        <!-- Sidepanel -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body mx-3 py-5">
                    <!-- Isi dari sidepanel bisa ditambahkan di sini -->
                    <h5>PDF</h5>
                    <a class="btn btn-success d-grid" href="{{ Storage::url('docs/' . $article->file) }}" target="_blank">Buka</a>
                </div>
            </div>
        </div>
    </div>
</div>


@include('includes.footer')