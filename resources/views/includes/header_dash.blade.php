<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('style.css')}}">
  <link rel="stylesheet" href="/assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body class="parent_main">
  <nav class="navbar navbar-expand-lg navbar-dark" id="header_log">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="{{ URL('/dashboard') }}">Dashboard</a>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="{{ URL('/user') }}">Tampilan Publik</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
                  >Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                  </form>
              </li>
            </ul>
        </div>
      </div>
  </nav>