<!DOCTYPE html>
<html>
<head>
    <title>Checkout Success</title>
</head>
<body>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<script>
    setTimeout(function() {
        window.location.href = "{{ route('myTickets.index') }}";
    }, 3000);
</script>
</body>
</html>
