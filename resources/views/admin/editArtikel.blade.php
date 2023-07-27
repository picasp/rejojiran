@include('includes.header_dash')
@include('admin.sidebar')
<div class="container col py-3 mb-5" id="scrollable">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/article">Daftar Artikel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Artikel</li>
                    </ol>
                </nav>
                <h3>Edit Artikel</h3>
                <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group p-2">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control @error('article_title') is-invalid @enderror" name="article_title" value="{{ old('article_title', $article->article_title) }}" placeholder="Masukkan Judul">
                    
                        <!-- error message untuk title -->
                        @error('article_title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group p-2">
                        <label class="form-label">Abstrak</label>
                        <input class="@error('abstract') is-invalid @enderror" type="hidden" name="abstract" value="{!! old('abstract', $article->abstract) !!}">
                        <div id="editor" style="min-height: 160px;">{!! old('abstract', $article->abstract) !!}</div>                            
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
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First name" value="{{ old('first_name', $article->author->first()->first_name) }}">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" placeholder="Middle name" value="{{ old('middle_name', $article->author->first()->middle_name) }}">
                        </div>

                        <div class="col">
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Last name" value="{{ old('last_name', $article->author->first()->last_name) }}">
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

                        <div class="form-group pt-2">
                        <label class="form-label">Kategori Jurusan</label>
                        <select class="form-select" aria-label="kategori artikel" name="id_jurusan">
                        @foreach($jurusan as $row)
                            <option value="{{ $row->id_jurusan }}" {{ $row->id_jurusan == $article->id_jurusan ? 'selected' : '' }}>
                                {{ $row->nama_jurusan }}
                            </option>
                        @endforeach
                        </select>
                        </div>

                        <div class="form-group pt-2">
                        <label for="" class="form-label">File</label>
                        <input class="form-control form-control-sm @error('file') is-invalid @enderror" type="file" name="file" id="">
                        </div>
                        @error('file')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="container p-2 pt-5">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="{{ URL('/article') }}" class="btn btn-danger">Batal</a>
                    </div>

                </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')