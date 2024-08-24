@extends('Website.Layouts.index')
@section('content-web')
    <div class="container" style="padding-top: 10rem">

        
        <h1 class="text-center">Tentang Blog</h1>
        <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt reiciendis totam perspiciatis, repudiandae
            <hr>
        <div class="row" style="height: 60vh; display: flex; align-items: center">
            <div class="col-lg-4 col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="col-lg-4 col-md-12 text-center ">
                        <img src="{{ asset('images/business-3d-happy-robot-assistant-waving-hello.png') }}" alt="Robot Assistant"
                            class="img-fluid">
                        <a class="navbar-brand fw-bold text-danger fs-1" href="#">RII<span class="text-dark">DEV</span></a>
                        <p>Website Blogs Post</p>
                    </div>
                </div>
                <!-- Hero Section -->
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam veniam, laboriosam aut dolores alias
                    delectus ut ullam sit, commodi nostrum tempore quod error doloremque facilis, sequi sed! Sapiente vero
                    accusamus, consequuntur quidem suscipit est eius minus, temporibus nesciunt laudantium nisi veritatis
                    iusto,
                    in pariatur facilis! Vero optio perferendis mollitia nostrum molestias voluptate eligendi. Blanditiis
                    ipsa
                    illo dolor provident iure dolorum corporis, vero saepe facilis libero fuga odit sit? Tempora, eum
                    molestias
                    reiciendis atque porro sit officia. Aliquid sequi sunt quam doloribus, nostrum, dolores beatae unde
                    consectetur voluptatibus, corrupti quasi velit in
                    quidem alias itaque? Pariatur, quam eveniet? Eius, at minima!</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo cum veritatis qui maxime ipsa at dolorum! Cumque ullam aperiam itaque! Quisquam ad esse incidunt iusto nulla quaerat labore quo maxime.</p>
            </div>

            <div class="col col-lg-12 col-md-12 col-sm-12">
                @include('Website.Components.Footer')
            </div>
        </div>
    </div>

@endsection
