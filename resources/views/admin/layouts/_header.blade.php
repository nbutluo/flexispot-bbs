<nav class="navbar navbar-expand fixed-top be-top-header">
  <div class="container-fluid">
    <div class="be-navbar-header"><a class="navbar-brand" href="#" target="_blank"></a>
    </div>
    <div class="be-right-navbar">
      <form action="#" method="post" onsubmit="return confirm('确认退出吗？')">
        @csrf
        @method('DELETE')

        <ul class="nav navbar-nav float-right be-user-nav">
          <li class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="true">
              <img src="/beagle/static/images/avatar.png" alt="Avatar">
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="#">
                <span class="icon mdi mdi-face"></span>
              </a>
              <button class="dropdown-item" type="submit" href="#" style="cursor: pointer;">
                <span class="icon mdi mdi-power"></span>退出
              </button>
            </div>
          </li>
        </ul>
      </form>
      <div class="page-title"><span>后台管理</span></div>
    </div>
  </div>
</nav>
