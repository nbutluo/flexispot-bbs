@include('shared._error')

<div class="reply-modal">
    <div class="title-box" onclick="resetModal()">
        <div><img src="/assets/share_btn.png" alt="">
            <span>AAAAAAAAAAAAA</span>
        </div>
        <div>
            <img src="/assets/-.png" alt="" style="margin-bottom:7px;" onclick="foldModal(event)">
            <img src="/assets/x.png" alt="" onclick="hideModal()">
        </div>
    </div>
    <div class="content">
        this is post content
    </div>
    <div class="btn-box">
        <span class="btn">Post Reply</span>
    </div>
</div>
