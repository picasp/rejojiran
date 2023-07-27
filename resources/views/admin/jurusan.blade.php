@include('includes.header_dash')
@include('admin.sidebar')

<div class="col py-3" id="scrollable">
    <div class="container">
        <div class="row mt-4 bg-light rounded p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Jurusan</li>
            </ol>
            </nav>
        <div class="row align-items-center mb-2">
            <div class="col-md-10">
            <h3>Daftar Jurusan</h3>
            </div>
        <div class="col-md-2 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
        </div>
        </div>
            <table class="table table-striped w-100" id="jurnalTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Jurusan</th>
                    <th>Bidang</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($jurusan as $row)
		        <tr>
		        	<td>{{ $row->id_jurusan }}</td>
                <td>{{ $row->nama_jurusan }}</td>
                <td>{{ $row->bidang->nama_bidang }}</td>
                    <td>
                        <div class="row">
                        <div class="col-auto px-0">
                        <button type="button" class="btn btn-sm btn-dark bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#editJurusanModal" data-id="{{ $row->id_jurusan }}"></button>
                        </div>
                        </div>
                    </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Jurusan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group p-2">
            <label class="form-label">Nama Jurusan:</label>
            <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" name="nama_jurusan" value="{{ old('nama_jurusan') }}" placeholder="Masukkan Nama Jurusan" required>
        </div> 
        @error('nama_jurusan')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
        @enderror

        <div class="form-group p-2">
            <label class="form-label">Bidang:</label>
            <select class="form-select" aria-label="kategori artikel" name="id_bidang">
            <!-- <option value="">-Pilih-</option> -->
            @foreach($bidang as $row)
                <option value="{{ $row->id_bidang }}">{{ $row->nama_bidang }}</option>
            @endforeach
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editJurusanModal" tabindex="-1" role="dialog" aria-labelledby="editBidangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBidangModalLabel">Edit Jurusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form id="editJurusanForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_jurusan">Nama Jurusan: </label>
                        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan">
                    </div>
                    <div class="form-group">
                      <label for="id_bidang">Bidang: </label>
                      <select class="form-select" id="id_bidang" name="id_bidang">
                          @foreach($bidang as $row)
                              <option value="{{ $row->id_bidang }}">
                                {{ $row->nama_bidang }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@include('includes.footer')