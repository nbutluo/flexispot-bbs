<div class="post_title">
  <span class="title_text">
    {{ $topic->title }}
    <span class="share_btn" onclick="openAlert()"></span>
    <span class="share_txt">share</span>
  </span>
  <div class="copy_box">
    <span class="title">post #1</span>
    <span class="link">{{ Request::url() }}</span>
    <span class="icons">
      <a class="addthis_button_twitter" href="#"> <img src="/assets/bird.png"></a>
      <a class="addthis_button_facebook" href="#"><img src="/assets/face.png"> </a>
      <a class="linkedin_share" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.flexispot.fr/ESPACE-BIEN%20-%C3%8ATRE/Spine-Health/how-a-sedentary-lifestyle-affects-your-health/&amp;title=How%20a%20Sedentary%20Lifestyle%20Affects%20Your%20Health&amp;source=&amp;summary=%3Cp%3E%3Cspan%3EFrom%20an%20evolutionary%20(and%20survival)%20standpoint,%20the%20invention%20of%20technology%20took%20us%20very%20quickly%20from%20an%20active%20%E2%80%9Cmoving%E2%80%9D%20species%20to%20a%20population%20that%20sits%20an%20average%20of%2013%20hours%20per%20day.%20%C2%A0Add%20sleeping%20hours%20to%20that%20and%20it%20leaves%20very%20few%20hours,%20or%20even%20minutes,%20to%20be%20active.%20Inactivity%20is%20making%20us%20chronically%20sick%20and%20putting%20a%20huge%20burden%20on%20our%20health%20care%20system.%20It%E2%80%99s%20unfortunately%20a%20very%20sad%20reality%20of%20the%20world%20today.%3C/span%3E%3C/p%3E"><img src="/assets/ins@2x.png"></a>
      <img src="/assets/x.png" onclick="closeAlert()" alt="">
    </span>
  </div>
</div>
<p class="tags">
  <a href="{{ route('categories.show',$topic->category) }}">
    <span class="tag">{{ $topic->category->name }}</span>
  </a>
  <span class="tag" style="background-color: #F65442;">Topic</span>
</p>
