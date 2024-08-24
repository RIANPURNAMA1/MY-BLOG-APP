<nav class="navbar navbar-expand-lg bg-body-tertiary p-3 shadow shadow-md position-fixed w-100 top-0 start-0" style="z-index: 99">
  <div class="container">
      <a class="navbar-brand fw-bold text-danger me-5" href="#">RII<span class="text-dark navbar-brand">DEV</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item">
                  <a  href="{{route('tentang')}}" class="nav-link" href="#tentang">Tentang Kami</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('home')}}">Blogs</a>
              </li>
              @if (Auth::check() && Auth::user()->role == 'user')
                  <!-- User-specific content -->
              @else
                  @auth
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                  </li>
                  @endauth
              @endif
          </ul>
          <form class="d-flex" action="{{ route('search') }}" method="GET" role="search">
             @csrf
              <input class="form-control me-2 p-3" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}" >
          </form>
          @auth
          <form action="{{ route('logout')}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-register">Logout</button>
          </form>
          @else
          <div class="btn-auth">
              <button class="btn-login mx-3" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
              <button class="btn-register btn-reg" type="button">Register</button>
          </div>
          @endauth
      </div>
  </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
      $(".btn-reg").click(function(){
          $("#registerModal").modal("show");
          $("#loginModal").modal("hide");
      });
      $("#btn-closes").click(function(){
          window.location.reload();
      });
  });
</script>
