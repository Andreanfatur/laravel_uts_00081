 <style>
      .bg-custom {
        background-color: #FFD700; /* Warna kuning ke orange */
      }
      .nav-link {
        color: white !important; /* Warna menu putih */
        border-radius: 50%; /* Border radius */
        padding: 10px 15px; /* Padding untuk bentuk bulat */
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-custom">
      <div class="container-fluid" style="width: 100%;">
        <a class="navbar-brand" href="#">Pendaftaran Mahasiswa Baru</a>
      </div>
      @if ($session)
      <a href="/logout" style="margin-right: 80px">
        <div class="btn btn-danger" style="width: 100px;">Log Out</div>
      </a>
      @endif
    </nav>