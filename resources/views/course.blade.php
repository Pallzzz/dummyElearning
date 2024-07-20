<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $major->name }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <span class="logo">E-LEARNING</span>
        </div>
    </nav>
    <main class="container">
        <div class="bread-crumb">
            <p style="color: #00e764;">
                <a href="/">Home</a> >
                <a href="#" style="color: #19A89D">{{ $major->name }}</a>
            </p>
        </div>
        @if($course->isEmpty())
            <p>No courses found for the selected major.</p>
        @else
            <h1>Courses</h1>
            @foreach($course as $courseList)
                {{-- <div class="boxcontain">{{ $course->name }}</div> --}}
                <a class="boxcontain" style="text-decoration: none" href="/{{ $major->slug }}/{{ $courseList->slug }}">
                    <p>{{ $courseList->name }}</p>
                    {{-- <img src="assets/icons/next-arrow.svg" alt="next-arrow"> --}}
                </a>
            @endforeach
        @endif
    </main>
</body>
</html>