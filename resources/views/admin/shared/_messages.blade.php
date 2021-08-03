@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(session()->has($msg))
<div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
  <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
  <div class="icon"><span class="mdi mdi-check"></span></div>
  <div class="message"> {{ session()->get($msg) }}</div>
</div>
@endif
@endforeach
