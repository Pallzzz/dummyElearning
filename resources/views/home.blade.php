<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning BSLC</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    {{-- select 2 --}}
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
</head>
<body>
    <x-nav></x-nav>
    <main class="container">

      <div class="left">
        <p class="title">Hai Binusian,</p>
        <p class="subtitle">Tingkatkan pengetahuan akademismu dengan <span>E-Learning BSLC!</span></p>

        <div class="boxcontain">
            <p>75+ <span>Modul</span></p>
            <p>10+ <span>Jurusan</span></p>
            <p>100% <span>Gratis</span></p>
        </div>
    </div>

    <section class="search-section">
        <div class="">
          <p>What faculty are you in?</p>
          <form class="search-form" action="{{ route('search.courses') }}" method="GET" >
            @csrf
            <select name="major_id" class="$form-select" id="basic-usage">
              <option value="">Choose Major</option>
              @foreach($majors as $majorItem)
              <option value="{{ $majorItem->id }}">{{ $majorItem->name }}</option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-secondary btn-sm" style="margin-top: 20px">Search</button>
          </form>
        </div>
      </section>
    </main>

    <!-- Scripts select 2-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
      //select 2 bootstrap
      $( '#basic-usage' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
      });
    </script>
  </body>
</html>