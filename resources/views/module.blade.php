<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $course->name }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- select 2 --}}
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <span class="logo">E-LEARNING module</span>
        </div>
    </nav>

    <main class="container-xl ">
        <div class="breadcrumb-item" style="text-decoration: none">
            <a href="/" style="text-decoration: none">Home</a> >
            <a href="/{{ $major->slug }}" style="text-decoration: none">{{ $major->name }}</a> >
            <a href="#" style="text-decoration: none; color: #19A89D">Module {{ $course->name }}</a>
        </div>

        <h1>Download Module for {{ $course->name }}</h1>
        <form action="{{ route('module.index', ['major' => $major->slug, 'course' => $course->slug]) }}" method="GET">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            
            <label for="year">Year:</label>
            <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                <option value="">Select Year</option>
                @foreach($years as $year)
                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
            <br>
    
            <label for="exam_type">Exam Type:</label>
            <select name="exam_type" id="exam_type" class="form-select" onchange="this.form.submit()">
                <option value="">Select Exam Type</option>
                @foreach($exam_types as $examType)
                <option value="{{ $examType }}" {{ request('exam_type') == $examType ? 'selected' : '' }}>{{ $examType }}</option>
                @endforeach
            </select>
            <br>
    
            <label for="module_type">Module Type:</label>
            <select name="module_type" id="module_type" class="form-select">
                <option value="">Select Module Type</option>
                @foreach($module_types as $moduleType)
                <option value="{{ $moduleType }}">{{ $moduleType }}</option>
                @endforeach
            </select>
            <br>

            <button type="submit" formaction="{{ route('module.download') }}">Download Module</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        $( '#basic-usage' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        });
    </script>
</body>
</html>