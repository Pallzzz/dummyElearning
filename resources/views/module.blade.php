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
        <form class="module" action="{{ route('module.download') }}" method="POST" target="_blank">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
        
            <div class="selections">
                <div class="year_select">
                    <h3>Year</h3>
                    <select id="year" name="year" required onchange="generateExamTypes()" class="form-select" id="basic-usage">
                        <option value="" selected hidden>Choose Year</option>
                    </select>
                </div>
                <div class="exam_type_select">
                    <h3>Exam Type</h3>
                    <select id="exam_type" name="exam_type" required onchange="generateModuleType()" disabled class="form-select" id="basic-usage">
                        <option value="" selected hidden>Choose Exam Type</option>
                    </select>
                </div>
                <div class="module_type_select">
                    <h3>Module Type</h3>
                    <select id="module_type" name="module_type" required disabled onchange="enableDownload()" class="form-select" id="basic-usage">
                        <option value="" selected hidden>Choose Module Type</option>
                    </select>
                </div>
            </div>
        
            <button class="btn btn-outline-primary" id="submitButton" disabled type="submit" style="margin-top: 20px">Download Module</button>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function generateYear() {
            $.ajax({
                url: "{{ route('module.fetchYears') }}",
                method: 'POST',
                data: {
                    course_id: "{{ $course->id }}",
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    let yearSelect = $("#year");
                    yearSelect.empty();
                    yearSelect.append('<option value="" selected hidden>Choose Year</option>');
                    response.forEach(function(year) {
                        yearSelect.append(`<option value='${year}'>${year}</option>`);
                    });
                }
            });
        }
    
        function generateExamTypes() {
            $.ajax({
                url: "{{ route('module.fetchExamTypes') }}",
                method: 'POST',
                data: {
                    course_id: "{{ $course->id }}",
                    year: $('#year').val(),
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    let examTypeSelect = $("#exam_type");
                    examTypeSelect.empty();
                    examTypeSelect.append('<option value="" selected hidden>Choose Exam Type</option>');
                    $("#module_type").empty().append('<option value="" selected hidden>Choose</option>').attr('disabled', true);
                    response.forEach(function(exam_type) {
                        examTypeSelect.append(`<option value='${exam_type}'>${exam_type}</option>`);
                    });
                    examTypeSelect.removeAttr('disabled');
                    $("#submitButton").attr('disabled', true);
                }
            });
        }
    
        function generateModuleType() {
            $.ajax({
                url: "{{ route('module.fetchModuleTypes') }}",
                method: 'POST',
                data: {
                    course_id: "{{ $course->id }}",
                    year: $('#year').val(),
                    exam_type: $('#exam_type').val(),
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    let moduleTypeSelect = $("#module_type");
                    moduleTypeSelect.empty();
                    moduleTypeSelect.append('<option value="" selected hidden>Choose Modul Type</option>');
                    response.forEach(function(module_type) {
                        moduleTypeSelect.append(`<option value='${module_type}'>${module_type}</option>`);
                    });
                    moduleTypeSelect.removeAttr('disabled');
                }
            });
        }
    
        function enableDownload() {
            $("#submitButton").removeAttr('disabled');
        }
    
        $(function() {
            generateYear();
        });
    </script>
</body>
</html>