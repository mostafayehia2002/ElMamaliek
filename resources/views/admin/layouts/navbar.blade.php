<div class="page-navbar">
    <div class="page-address">
        <p>
        <h3>@yield('page address')</h3>
        </p>
    </div>

    <div class="notification">
        <div class="dropdown"  style="display: inline-block">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-language"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">انجليزي</a></li>
                <li><a class="dropdown-item active" href="#">عربي</a></li>
            </ul>
        </div>
        <a href="" style=" position: relative;">
            <i class="fa-solid fa-message"></i>
            <div class="numberOfNotify">0</div>
        </a>
        <div class="notification-menu">
        <a href="#" style=" position: relative;">
            <i class="fa-sharp fa-solid fa-bell"></i>
            <div class="numberOfNotify">0</div>
        </a>
          <div class="notification-dropdown">

              <div class="title-notification">
                  <a  href="" class="title-name">الاشعارات</a>

                  <a href="#" class="title-markAll">قراءة الكل</a>
              </div>
              <ul class="notification-content">
                  <li class="unread">
                      <a>
                          <div class="img">
                              <img src="{{asset('admin/admin_image/profile/profile.jpg')}}" alt="Image">
                          </div>
                          <div class="text">
                              <strong>gad993813@gmail.com</strong>
                              <p>
                                   قام بشراء منتج <mark>شحن بوتات</mark> في انتظار الموافقه

                              </p>

                          </div>
                          <div class="date">
                              <strong>01-01-2024</strong>
                          </div>

                      </a>
                  </li>
                  <li >
                      <a>
                          <div class="img">
                              <img src="{{asset('admin/admin_image/profile/profile.jpg')}}" alt="Image">
                          </div>
                          <div class="text">
                              <strong>gad993813@gmail.com</strong>
                              <p>
                                  قام بشراء منتج <mark>شحن بوتات</mark> في انتظار الموافقه

                              </p>
                          </div>
                          <div class="date">
                              <strong>01-01-2024</strong>
                          </div>

                      </a>
                  </li>
              </ul>

          </div>
        </div>

        <span class="setting">
                  <i class="fa-solid fa-bars "></i>
        </span>
    </div>
</div>

<script>

</script>
