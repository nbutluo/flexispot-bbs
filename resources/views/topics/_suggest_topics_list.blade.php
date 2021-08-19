<p class="section_title">Suggested Topics</p>
<div class="topics-box">
    <p class="blue_topic topic">
        <span class="title">Topic</span>
        <span class="num">Replies</span>
        <span class="num view_num">Views</span>
        <span class="num">Activity</span>
    </p>

    @foreach ($suggests as $topic)
    <p class="topic">
        <span class="title"><a href="{{ route('topics.show',$topic) }}" target="_blank">{{ $topic->title }}</a></span>
        <span class="num">{{ $topic->reply_count }}</span>
        <span class="num view_num">{{ $topic->view_count }}</span>
        <span class="num">{{ $topic->created_at->formatLocalized('%B %d') }}</span>
    </p>
    @endforeach

</div>
<p class="more-topic">
    <span>Want to read more? Browse other topics in or </span>
    <span class="more-link" target="_blank" onclick="location.href=`{{ route('root') }}`">views latest topics</span>
</p>
