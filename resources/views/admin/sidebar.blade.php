<div class="container-fluid" id="ctn">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" id="sidebar">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="{{ URL('/dashboard') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="{{ URL('/list_user') }}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-person-circle"></i> <span class="ms-1 d-none d-sm-inline">User</span></a>
                    </li>
                    <li>
                        <a href="{{ URL('/article') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Artikel</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Kategori</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">

                            <li class="w-100">
                                <a href="{{ URL('/bidang') }}" class="nav-link px-0"> <span class="d-none d-sm-inline"></span>Bidang</a>
                            </li>
                            <li>
                                <a href="{{ URL('/jurusan') }}" class="nav-link px-0"> <span class="d-none d-sm-inline"></span>Jurusan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>