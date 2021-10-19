<div class="title-box" onclick="resetModal()">
  <div>
    <img src="/assets/share_btn.png" alt="">
    <span class="reply-topic-title" style="color: #1774dc;line-break: anywhere;">AAAAAAAAAAAAA</span>
  </div>
  <div style="width:80px;text-align:right;">
    <img src="/assets/-.png" alt="" style="margin-bottom:7px;" onclick="foldModal(event)">
    <img src="/assets/x.png" alt="" onclick="hideModal()">
  </div>
</div>
<form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8" name="replies-store">
  @csrf
  <input type="hidden" name="topic_id" value="{{ $topic->id }}">
  <div class="content"><textarea name="content" id="editor"></textarea></div>
  <div class="btn-box"><span class="btn" onclick="document.forms['replies-store'].submit()">Post Reply</span></div>
</form>
