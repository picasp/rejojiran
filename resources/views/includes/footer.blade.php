<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    document.querySelector("input[name='abstract']").value = quill.root.innerHTML;
  });
</script>
<script>
  $(document).ready(function() {
    $('#jurnalTable').DataTable({
        order: [[0, 'asc']]
    });
  });
</script>
<script>
    $(document).ready(function () {
        $('#editBidangModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang membuka modal
            var id = button.data('id'); // Ambil data-id dari atribut data-id pada tombol
            var modal = $(this);

            // Mengambil data bidang melalui AJAX
            $.ajax({
                type: 'GET',
                url: '/bidang/' + id + '/edit',
                success: function (data) {
                    modal.find('.modal-body #nama_bidang').val(data.nama_bidang);
                    // Set action form untuk menyimpan data ke route update
                    modal.find('.modal-content #editBidangForm').attr('action', '/bidang/' + id);
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                }
            });
        });

        // Submit form menggunakan AJAX untuk menyimpan perubahan data bidang
        $('#editBidangForm').on('submit', function (e) {
            e.preventDefault();
            var form = $(this);

            $.ajax({
                type: 'PUT',
                url: form.attr('action'),
                data: form.serialize(),
                success: function (response) {
                    alert(response.success);
                    $('#editBidangModal').modal('hide');
                    // Lakukan reload halaman setelah berhasil mengupdate data
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#editJurusanModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang membuka modal
            var id = button.data('id'); // Ambil data-id dari atribut data-id pada tombol
            var modal = $(this);

            // Mengambil data bidang melalui AJAX
            $.ajax({
                type: 'GET',
                url: '/jurusan/' + id + '/edit',
                success: function (data) {
                    modal.find('.modal-body #nama_jurusan').val(data.nama_jurusan);
                    // Set action form untuk menyimpan data ke route update
                    modal.find('.modal-content #editJurusanForm').attr('action', '/jurusan/' + id);
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                }
            });
        });

        // Submit form menggunakan AJAX untuk menyimpan perubahan data bidang
        $('#editJurusanForm').on('submit', function (e) {
            e.preventDefault();
            var form = $(this);

            $.ajax({
                type: 'PUT',
                url: form.attr('action'),
                data: form.serialize(),
                success: function (response) {
                    alert(response.success);
                    $('#editJurusanModal').modal('hide');
                    // Lakukan reload halaman setelah berhasil mengupdate data
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                }
            });
        });
    });
</script>

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 

    @elseif(session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>

<!-- <script>
  $(document).ready(function() {
    // Select All checkbox
    $('#select-all').on('click', function() {
      if (this.checked) {
        // Check all checkboxes
        $('#jurnalTable tbody input[type="checkbox"]').prop('checked', true);
      } else {
        // Uncheck all checkboxes
        $('#jurnalTable tbody input[type="checkbox"]').prop('checked', false);
      }
    });

    // Individual checkboxes
    $('#jurnalTable tbody input[type="checkbox"]').on('click', function() {
      // If any individual checkbox is unchecked, uncheck the "Select All" checkbox
      if (!this.checked) {
        $('#select-all').prop('checked', false);
      }
    });
  });
</script> -->

<script>
  // Jalankan script setelah halaman selesai dimuat
  $(document).ready(function () {
    // Tangkap elemen form dan tambahkan event listener pada saat submit

    // Fungsi untuk mengambil data jurusan berdasarkan bidang
    function getJurusanByBidang(bidangId) {
      return $.ajax({
        url: `/api/jurusan/${bidangId}`,
        type: 'GET',
        dataType: 'json',
      });
    }

    // Fungsi untuk menampilkan daftar jurusan pada dropdown filter jurusan
    function populateJurusanDropdown(jurusans) {
      const filterJurusan = $('#filterJurusan');
      filterJurusan.empty().append("<option value='0'>Jurusan</option>");
      $.each(jurusans, function (key, value) {
        filterJurusan.append("<option value='" + value.id_jurusan + "'>" + value.nama_jurusan + "</option>");
      });
    }

    // Fungsi untuk menerapkan filter pada data artikel
  function applyFilter() {
    const filterBidang = $('#filterBidang').val();
    const filterJurusan = $('#filterJurusan').val();

    // Lakukan request ke server dengan mengirim data filter
    $.ajax({
      url: `/api/artikel?filterBidang=${filterBidang}&filterJurusan=${filterJurusan}`,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        // Tampilkan data artikel sesuai hasil filter ke div dengan id "dataArtikel"
        const dataArtikel = $('#dataArtikel');
        dataArtikel.empty();
        $.each(data, function (key, value) {
          // Tampilkan data artikel sesuai kebutuhan Anda
          dataArtikel.append("<p>" + value.judul + "</p>");
        });
      },
      error: function (error) {
        console.error("Terjadi kesalahan saat melakukan filter:", error);
      },
    });
  }

// Event listener untuk mengupdate dropdown jurusan saat dropdown bidang berubah
$('#filterBidang').change(function () {
    const bidangId = $(this).val();
    if (bidangId !== "") {
      getJurusanByBidang(bidangId).done(function (jurusans) {
        populateJurusanDropdown(jurusans);
      });
    } else {
      populateJurusanDropdown([]);
    }
  });


  });
</script>
</body>

</html>