@if (count($errors) > 0)
<div data-show="true" class="ant-alert alert-error ant-alert-with-description" role="alert">
  <span role="img" aria-label="close-circle" class="anticon anticon-close-circle ant-alert-icon"><svg viewBox="64 64 896 896" focusable="false" data-icon="close-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true">
      <path d="M685.4 354.8c0-4.4-3.6-8-8-8l-66 .3L512 465.6l-99.3-118.4-66.1-.3c-4.4 0-8 3.5-8 8 0 1.9.7 3.7 1.9 5.2l130.1 155L340.5 670a8.32 8.32 0 00-1.9 5.2c0 4.4 3.6 8 8 8l66.1-.3L512 564.4l99.3 118.4 66 .3c4.4 0 8-3.5 8-8 0-1.9-.7-3.7-1.9-5.2L553.5 515l130.1-155c1.2-1.4 1.8-3.3 1.8-5.2z">
      </path>
      <path d="M512 65C264.6 65 64 265.6 64 513s200.6 448 448 448 448-200.6 448-448S759.4 65 512 65zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z">
      </path>
    </svg></span>
  <div class="ant-alert-content">
    <div class="ant-alert-message">Error</div>
    <div class="ant-alert-description">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </div>
  </div>
</div>
@endif
