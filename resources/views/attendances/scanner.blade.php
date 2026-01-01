<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Students</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body class="body_scanner">

<div class="scanner-card">
    <h2>Smart attendance recording system</h2>
    <!-- المكان الذي ستظهر فيه الكاميرا -->
    <div id="reader"></div>
</div>

<div class=" mt-3">
    <a href="{{route('welcome')}}" class="btn btn-primary px-5">Back</a>
    <a href="{{route('scanner')}}" class="btn btn-primary px-5 me-2">Scanner again</a>
</div>

<!-- مكتبة قراءة الـ QR Code -->
<script src="https://unpkg.com/html5-qrcode"></script>
<!-- مكتبة التنبيهات -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const scanRoute = "{{ route('scan') }}";
    const csrfToken = "{{ csrf_token() }}";
</script>

<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
