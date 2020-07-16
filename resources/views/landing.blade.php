<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMAHATMA</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/landing.css">


  </head>
  <body>
    <div id="#app">
    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
    <img class="img-rounded img-circle logo" src="/Img/logo.png">
      <a class="navbar-brand" href="#">SmaHatma</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#profile">Peofile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Guru</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sarpras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-items">
            @if (Route::has('login'))
            <div class=" btn btn-primary tombol">
              @auth
                <a href="{{ url('/home') }}">Dashboard</a>
              @else
                <a href="{{ route('login') }}">Login</a>
                {{-- @if (Route::has('register'))
                  <a href="{{ route('register') }}">Register</a>
                @endif --}}
              @endauth
            </div>
          @endif
          </li>
        </ul>
      </div>
    </div>
    </nav>
{{-- akhir navbar --}}

{{-- jumbotron --}}
<div class="jumbotron jumbotron-fluid" style="background-image: url('../Img/jumbotron.jpg')">
  <div class="container">
    <img src="Img/logo.png" alt="image-circle" class="image-circle">
    <h1 class="display-4">SMA HANG TUAH 5 <br>SIDOARJO</h1>
    <h3 class="disp">Become a Truly Compassionate Person</h3>

  </div>
</div>
{{-- akhir Jumbotron --}}

{{-- container --}}
<div class="container">
  {{-- info panel --}}
  <div class="row justify-content-center">
    <div class="col-10 panel-info">
      <div class="row">
        <div class="col-lg">
          <img src="../Img/FB.png"  alt="" class="float-left">
          <h4>FACEBOOK</h4>
          <p>smahangtuah5</p>

        </div>
        <div class="col-lg">
          <img src="../Img/insta.png" alt="" class="float-left">
          <h4>Instagram</h4>
          <p>Smahatma Sidoarjo</p>
        </div>
        <div class="col-lg">
          <img src="../Img/email.png" alt="" class="float-left">
          <h4>EMAIL</h4>
          {{-- <h4>smahangtuah5_sidoarjo@yahoo.co.id</h4> --}}
          <span>smahangtuah5_sidoarjo@yahoo.co.id<br>
          smahangtuah5sidoarjo@gmail.com</span>

        </div>
      </div>

    </div>
  </div>


  {{-- akhir info panel --}}

  {{-- working Space --}}

  <div class="row working" id="profile">
    <div class="col-lg-6">
      <h4>VISI</h4>
      <p> Mewujudkan peserta didik yang berakhlakul karimah, berkarakter, unggul dalam prestasi, berwawasan bahari dan peduli terhadap lingkungan</p>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <img src="../Img/bg.jpg" alt="visi" class="img-fluid">
      </div>
    </div>

  </div>
{{-- end working Space --}}
</div>

{{-- gtk --}}



{{-- end gtk --}}

{{-- about --}}
<div class="d-flex p-2 bd-highlight head justify-content-center"><H2>ABOUT</H2></div>
<div class="row about d-flex justify-content-around" id="about">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-4">
    <div class="container">
      <div class="">
        <H2>TENTANG SMA HANGTUAH 5</H2>
        <p>SMA Hang Tuah 5 Sidoarjo sebagai salah satu lembaga yang menjunjung tinggi nilai-nilai karakter dalam menyongsong era globalisasi abad 21 yang berkaitan dengan revolusi 4.0</p>
      </div>
      <div class="">
        <H2>ALAMAT</H2>
        <p>SMA HANG TUAH 5 Sidoarjo <br>Jln M. Ridwan No 07 Candi -Sidoarjo <br>No. Telp : 031 8056489 <br> Buka : Senin - Jumat (07.00 - 14.00) Sabtu(07.00-12.00)</p>


      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="d-flex flex-row-reverse justify-content-center">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.448376286195!2d112.7102088!3d-7.4804767!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xabe93be4b462ed3f!2sSMA%20Hang%20Tuah%205%20Sidoarjo!5e0!3m2!1sid!2sid!4v1580608501826!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
  </div>
{{-- end about --}}
</div>







    {{-- yang lama dibawah --}}

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </div>
  </body>
</html>
