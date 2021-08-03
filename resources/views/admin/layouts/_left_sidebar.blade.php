<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper">
    <!-- <a class="left-sidebar-toggle" href="#">Dashboard</a> -->
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            {{-- <li><ahref="#"><iclass="iconmdimdi-home"></i><span>Dashboard</span></a></li> --}}
            <li class="{{ active_admin_class(if_route('admin.users.index'))}}">
              <a href="{{ route('admin.users.index') }}">
                <i class="icon mdi mdi-account"></i>
                <span>用户管理</span>
              </a>
            </li>
            <li class="{{ active_admin_class(if_route('admin.topics.index'))}}">
              <a href="{{ route('admin.topics.index') }}">
                <i class="icon mdi mdi-comment-outline"></i>
                <span>话题列表</span>
              </a>
            </li>
            <li class="{{ active_admin_class(if_route('admin.replies.index'))}}">
              <a href="{{ route('admin.replies.index') }}">
                <i class="icon mdi mdi-comment-text"></i>
                <span>回复列表</span>
              </a>
            </li>
            <li class="{{ active_admin_class(if_route('admin.categories.index'))}}">
              <a href="{{ route('admin.categories.index') }}">
                <i class="icon mdi mdi-label"></i>
                <span>分类管理</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
