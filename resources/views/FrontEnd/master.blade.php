<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- fontawesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <title>UVOLOX</title>
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.navbar.NavBar')
    <div>
        @yield('content')
    </div>

<div class="contact-container">
    <div class="whatsapp-button-container">
        <a href="https://wa.me/201063265173" id="whatsapp-btn" target="_blank">
            <img src="{{ asset('images/whatsapp_icon.png') }}" alt="WhatsApp" class="whatsapp-icon">
        </a>
    </div>
</div>

<!-- CSS for button styling and animation -->
<style>
    .whatsapp-button-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    .whatsapp-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out;
    }

    .whatsapp-icon:hover {
        transform: scale(1.2);
    }
</style>

<!-- JavaScript for slight animation -->
<script>
    const whatsappBtn = document.getElementById('whatsapp-btn');

    whatsappBtn.addEventListener('mouseover', function() {
        whatsappBtn.style.transform = 'rotate(360deg)';
    });

    whatsappBtn.addEventListener('mouseleave', function() {
        whatsappBtn.style.transform = 'rotate(0deg)';
    });
</script>
    @include('layouts.footer.Footer')
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
