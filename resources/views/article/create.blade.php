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
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control @error('article_title') is-invalid @enderror" name="article_title" value="{{ old('article_title') }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('article_title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group p-2">
                                <label class="form-label">Abstrak</label>
                                <textarea class="form-control @error('abstract') is-invalid @enderror" name="abstract" rows="5" placeholder="Masukkan Abstrak">{{ old('abstract') }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('abstract')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group p-2" id="main-con">
                                <label class="form-label">Author</label>
                                <div class="row" id="clone-author">
                                <div class="col">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First name" value="{{ old('first_name') }}">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" placeholder="Middle name" value="{{ old('middle_name') }}">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Last name" value="{{ old('last_name') }}">
                                </div>
                                <div class="col">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                </div>
                                </div>
                                @error('first_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('middle_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('last_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="col p-2">
                                <a href="javascript:;" onClick="addMore();"><i class="bi bi-plus-circle-fill"></i></a>
                                <a href="javascript:;" onClick="deleteRow();"><i class="bi bi-dash-circle-fill"></i></a>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">File</label>
                                    <input class="form-control form-control-sm" type="file" name="file" id="">
                                </div>
                                @error('file')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="container p-2 pt-5">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ URL('/article') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection