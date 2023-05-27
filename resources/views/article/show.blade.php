@extends('auth.layouts')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <a  class="btn btn-sm btn-dark my-2" href="{{ URL('/article') }}">&#8592; Artikel</a>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body mx-3 py-5">
                        <h4>{{ Str::upper ($article->article_title) }}</h4>
                        
                        <span><i>{{Str::title ($article->author->first()->first_name)}} {{Str::title ($article->author->first()->middle_name)}} {{Str::title ($article->author->first()->last_name)}}</i></span>
                        <br><br>
                        <label class="fw-bold">Abstraksi</label>
                        <p>
                            {!! $article->abstract !!}
                        </p>
                        <Label class="fw-bold"><i>Full PDF</i></Label>
                        <br>
                        <a href="{{ asset('storage/docs/'.$article->file) }}">Buka</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection