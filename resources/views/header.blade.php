@section('header')
  <header>
    <nav>
      @if(Request::is('/'))
        <h1>
      @endif
      <a href="/">Laravel サンプルECサイト</a>
      @if(Request::is('/'))
        </h1>
      @endif
    </nav>
  </header>
@show
