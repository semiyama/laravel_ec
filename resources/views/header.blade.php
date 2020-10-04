@section('header')
  <header>
    <nav>
      <div>
        <a href="/cart"><i class="fas fa-shopping-cart"></i>カート</a>
      </div>
    </nav>

    @if(Request::is('/'))
      <h1>
    @endif
    <a class="topLink" href="/">Laravel サンプルECサイト</a>
    @if(Request::is('/'))
      </h1>
    @endif
  </header>

@show
