@extends('auth.layouts')
@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group p-2">
                                <label class="font-weight-bold">JUDUL</label>
                                <input type="text" class="form-control @error('article_title') is-invalid @enderror" name="article_title" value="{{ old('article_title') }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('article_title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group p-2">
                                <label class="font-weight-bold">ABSTRAK</label>
                                <textarea class="form-control @error('abstract') is-invalid @enderror" name="abstract" rows="5" placeholder="Masukkan Abstrak">{{ old('abstract') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('abstract')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group p-2" id="main-con">
                                <label class="font-weight-bold">AUTHOR</label>
                                <div class="row" id="clone-author">
                                <div class="col">
                                <input type="text" class="form-control" name="first_name" placeholder="First name" aria-label="First name">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control" name="middle_name" placeholder="Middle name" aria-label="First name">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control" name="last_name" placeholder="Last name" aria-label="First name">
                                </div>
                                <div class="col">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </div>
                                </div>
                                <div class="col p-2">
                                <a href="javascript:;" onClick="addMore();"><i class="bi bi-plus-circle-fill"></i></a>
                                <a href="javascript:;" onClick="deleteRow();"><i class="bi bi-dash-circle-fill"></i></a>
                                </div>
                                <div class="form-group p-2">
                                    <input type="file" name="file" id="">
                                </div>
                            </div>
                            <div class="container p-2">
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection