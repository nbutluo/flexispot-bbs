@if (count($errors) > 0)
<div class="alert alert-danger alert-icon alert-icon-border alert-dismissible" role="alert">
  <div class="icon"><span class="mdi mdi-close-circle-o"></span></div>
  <div class="message">
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
      <span class="mdi mdi-close" aria-hidden="true"></span>
    </button>
    <strong>有错误发生!</strong>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif
