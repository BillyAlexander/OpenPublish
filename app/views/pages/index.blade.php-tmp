@extends('layouts.LayoutUnAuth')
@section('menu')

{{MenuGen::render('top')}}


@stop

@section('content')
<div id="contentjs"></div>
@stop

@section('jsfunctions')
  <script>
    $(document).on('click', '#login',function (e) {
        e.preventDefault();
        $("#contentjs").load('{{URL::route('login')}}');
    });
  </script>
@stop