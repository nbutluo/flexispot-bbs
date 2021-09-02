<div class="title-box" onclick="resetModal()">
  <div>
    <img src="/assets/share_btn.png" alt="">
    <span class="reply-topic-title" style="color: #1774dc;">AAAAAAAAAAAAA</span>
  </div>
  <div>
    <img src="/assets/-.png" alt="" style="margin-bottom:7px;" onclick="foldModal(event)">
    <img src="/assets/x.png" alt="" onclick="hideModal()">
  </div>
</div>
<form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8" name="replies-store" onsubmit="return confirm('确认提交吗？')">
  @csrf
  <input type="hidden" name="topic_id" value="{{ $topic->id }}">
  <div class="content"><textarea name="content" id="editor"></textarea></div>
  <div class="btn-box"><span class="btn" onclick="document.forms['replies-store'].submit()">Post Reply</span></div>
</form>

@section('scripts')
<script>
  $(function() {
    $('.reply-topic').click(function() {
      $('.reply-topic-title').text("{{ $topic->title }}")
    });
  })
</script>

<script>
  $(document).ready(function() {
    Simditor.locale = 'en-US';
    var editor = new Simditor({
      textarea: $('#editor'),
      upload: {
        url: "{{ route('topics.upload_image') }}",
        params: {
          _token: '{{ csrf_token() }}'
        },
        fileKey: 'upload_file',
        connectionCount: 3,
        leaveConfirm: '文件上传中，关闭此页面将取消上传。'
      },
      pasteImage: true,
    });
  });
</script>
<script src="{{ asset('js/detail.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>
@endsection
