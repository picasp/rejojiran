@include('includes.header_dash')
@include('admin.sidebar')

<div class="col py-3" id="scrollable">
    <div class="container">
        <div class="row mt-4 bg-light rounded p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bidang</li>
            </ol>
            </nav>
        <div class="row align-items-center mb-2">
            <div class="col-md-10">
            <h3>Daftar Bidang</h3>
            </div>
        <div class="col-md-2 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
        </div>
        </div>
            <table class="table table-striped w-100" id="jurnalTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Bidang</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bidang as $bidang)
		        <tr>
		        	<td>{{ $bidang->id_bidang }}</td>
		            <td>{{ $bidang->nama_bidang }}</td>
                    <td>
                        <div class="row">
                        <div class="col-auto px-0">
                        <!-- <a href="#" class="btn btn-warning btn-edit" data-id="{{ $bidang->id_bidang }}" data-name="{{ $bidang->nama_bidang }}">Edit</a> -->
                        <button type="button" class="btn btn-sm btn-dark bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#editBidangModal" data-id="{{ $bidang->id_bidang }}"></button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Bidang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('bidang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group p-2">
            <label class="form-label">Nama Bidang:</label>
            <input type="text" class="form-control @error('nama_bidang') is-invalid @enderror" name="nama_bidang" value="{{ old('nama_bidang') }}" placeholder="Masukkan Nama Bidang" required>
        </div> 
        @error('nama_bidang')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
        @enderror
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
<!-- <div class="modal fade" id="practice_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Bidang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" name="companydata" id="companydata">
        <div class="form-group p-2">
            <label class="form-label">Nama Bidang:</label>
            <input type="text" class="form-control" name="nama_bidang" id="nama_bidang" value="" placeholder="Masukkan Nama Bidang" required>
        </div> 

      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_bidang" class="id_bidang">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" value="Submit" id="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div> -->

<!-- resources/views/bidang/edit.blade.php -->
<div class="modal fade" id="editBidangModal" tabindex="-1" role="dialog" aria-labelledby="editBidangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBidangModalLabel">Edit Bidang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form id="editBidangForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_bidang">Nama Bidang</label>
                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang">
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