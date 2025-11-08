<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY-BLOGS-RIIDEV</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<style>
    *{
    font-family: 'poppins', sans-serif;
    margin: 0;
    padding: 0;
    
}

body{
    padding: 20px !important;
}

.nav-link{
    font-size: 18px !important;
}

:root{
    --main-color: rgb(147, 0, 0);
    --color-dark: #1D2231;
    --text-grey: #8390A2;
}
.navbar-brand{
    font-size: x-large !important;
}
.active{
    color: var(--main-color)!important;
}
.nav-link{
    margin-left: 40px !important;
    font-weight: bold !important;
}
.btn-login{
    border: 3px solid var(--main-color);
    font-weight: bold !important;
    font-size: large !important;
    color: #1D2231 !important;
    padding: 10px 30px 10px 30px !important;
    background-color:  white !important;
}
.btn-login:hover{
    background-color: var(--main-color) !important;
    color: #ffffff !important;
    transition: all 0.5s ease;
}
.btn-register{
    border: 3px solid ;
    font-weight: bold !important;
    font-size: large !important;
    color: #ffffff !important;
    padding: 10px 30px 10px 30px !important;
    background-color: var(--color-dark) !important;
}
.category{
    background-color: var(--text-grey) !important;
}
.categ{
background-color: #1D2231 !important;
padding: 5px 15px !important ;
border-radius: 15px !important;
width: fit-content !important;
color: white !important;
}


.card-img-container {
    position: relative;
    overflow: hidden;
}

.card-img-container img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.card-img-container:hover img {
    transform: scale(1.1);
}

.eye-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 2rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.card-img-container:hover .eye-icon {
    opacity: 1;
}


.contact{
    background-color: var(--text-grey);
    padding: 20px ;
}
html {
    scroll-behavior: smooth !important;
}

.navbar-admin{
    background-color: var(--main-color) !important;
}

.detail-mobile{
    display: none !important;

}




@media screen and (max-width: 608px) {
    *{
        font-size: large !important;
    }
    .btn-login{
        margin-top: 10px !important;
    }
    .hero{
        padding-top: 5rem !important;
    }
    .col-categ{
        margin: 0 !important;
    }

    .detail-mobile{
        display: block !important;
    }
}

</style>

<body>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            @include('Website.Components.Navbar')
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">

            {{-- navbar --}}
            <div class="">
                @yield('content-web')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
