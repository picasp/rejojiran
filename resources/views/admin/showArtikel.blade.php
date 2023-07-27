@include('includes.header_dash')
@include('admin.sidebar')
    <div class="container col py-3 mb-5" id="scrollable">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body mx-3 py-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/article">Daftar Artikel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$article->article_title}}</li>
                        </ol>
                    </nav>
                        <h4>{{ Str::upper ($article->article_title) }}</h4>
                        <span><i>{{Str::title ($article->author->first()->first_name)}} {{Str::title ($article->author->first()->middle_name)}} {{Str::title ($article->author->first()->last_name)}}</i></span>
                        <br><br>
                        <label class="fw-bold">Abstrak</label>
                        <p>
                        {!! $article->abstract !!}
                        </p>
                        <label class="fw-bold">Preview</label>
                        <br>
                        <iframe src="{{ Storage::url('docs/' . $article->file) }}"></iframe>
                        <br>
                        <a href="{{ Storage::url('docs/' . $article->file) }}" target="_blank">Buka</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')