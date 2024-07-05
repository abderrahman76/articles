<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">laravel articles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
          </li>
          @if (auth()->check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sorte') }}">My articles</a>
          </li>
          @endif
          @if (auth()->check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mycategories') }}">My categories</a>
          </li>
          @endif
          
        </ul>
        @if (auth()->check())
       
            <a   href="{{ route('profile.show') }}" class="navbar-brand">{{ auth()->user()->name }}</a>
        
            @else
          
                <a href="{{ url('/register') }}" class="nav-link" style="color: black">register</a>
            
           
                <a href="{{ url('/login') }}" class="nav-link" style="color: black">login</a>
            
        @endif
        
      </div>
    </div>
  </nav>