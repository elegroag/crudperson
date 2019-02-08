@extends('layouts.crud')

@section('title')
  <div class='container'>
    <a class='btn btn-sm btn-default' href="{{ URL::route('logout') }}">Salir aquí</a>
  </div>
    <h2 class="text-center">DASH Personas</h2>
    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif
@endsection

@section('content')
<div class="container">  
  <div class="row">    
    <ui-view></ui-view>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  var _personas = <?=$_personas ?>;
  var _municipios = <?=$_municipios?>;
  var _users_id = "{{ $_users_id }}";
  var _emails = <?=$_emails; ?>
</script>
	<script src="{{ asset('app/module_app.js') }}"></script> 
@endsection