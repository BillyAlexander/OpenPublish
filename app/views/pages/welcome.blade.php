<h1>Bienvenido {{Auth::user()->get()->UserName}}</h1>

<a href="{{URL::route('makelogout')}}">salir</a>

{{MenuGen::render('top')}}