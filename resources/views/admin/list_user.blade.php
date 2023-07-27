@include('includes.header_dash')
@include('admin.sidebar')

<div class="col py-3" id="scrollable">
    <div class="container">
        <div class="row mt-4 bg-light rounded p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
            </ol>
            </nav>
        <div class="row align-items-center mb-2">
            <div class="col-md-10">
            <h3>Daftar User</h3>
            </div>
        <div class="col-md-2 text-end">
            <button hidden type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
        </div>
        </div>
            <table class="table table-striped w-100" id="productTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $row)
		        <tr>
		        	<td>{{ $row->id_user }}</td>
		            <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.footer')