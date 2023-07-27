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

<button type="button" class="btn btn-sm btn-dark bi bi-pencil-fill" data-bs-toggle="modal" data-bs-target="#editBidangModal" data-id="{{ $bidang->id_bidang }}"></button>
