{{-- {{ ($title === "Home") ? 'active':'' }} --}}
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ request()->is('/') ? 'active':'' }} treeview">
      <a href="/">
        <i class="fa fa-home"></i> <span>Home</span>
      </a>
    </li>
    <li class="{{ request()->is('kriteria') ? 'active':'' }} treeview">
        <a href="/kriteria">
          <i class="fa fa-pencil"></i> <span>Data Kriteria</span>
        </a>
    </li>
    <li class="{{ request()->is('alternatif') ? 'active':'' }} treeview">
        <a href="/alternatif">
          <i class="fa fa-users"></i> <span>Data Alternatif</span>
        </a>
    </li>
    <li class="{{ request()->is('pembobotan') ? 'active':'' }} treeview">
        <a href="/pembobotan">
          <i class="fa fa-signal"></i> <span>Pembobotan Kriteria</span>
        </a>
    </li>
    <li class="{{ request()->is('pembobotan/subkriteria') ? 'active':'' }} treeview">
      <a href="/pembobotan/subkriteria">
        <i class="fa fa-signal"></i> <span>Pembobotan Subkriteria</span>
      </a>
    </li>
    <li class="{{ request()->is('penilaian') ? 'active':'' }} treeview">
      <a href="/penilaian">
        <i class="fa fa-check-square-o"></i> <span>Penilaian</span>
      </a>
    </li>
    <li class="{{ Request::is('user*') ? 'active':''}} treeview">
        <a href="/user">
          <i class="fa fa-user"></i> <span>User</span>
        </a>
    </li>
    



    {{-- <li class="treeview">
      <a href="">
        <i class="fa fa-newspaper-o"></i>
        <span>Berita</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/berita"><i class="fa fa-circle-o"></i> Berita</a></li>
        <li><a href="/admin/kategori-berita"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="">
        <i class="fa fa-plane"></i>
        <span>Wisata</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/admin/wisata"><i class="fa fa-circle-o"></i> Wisata</a></li>
        <li><a href="/admin/kategori-wisata"><i class="fa fa-circle-o"></i> Kategori Wisata</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-gear"></i> <span>Pengaturan</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/admin/kecamatan"><i class="fa fa-circle-o"></i> Kecamatan</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i> <span>Tables</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
        <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
      </ul>
    </li>
    <li>
      <a href="pages/calendar.html">
        <i class="fa fa-calendar"></i> <span>Calendar</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-red">3</small>
          <small class="label pull-right bg-blue">17</small>
        </span>
      </a>
    </li>
    <li>
      <a href="pages/mailbox/mailbox.html">
        <i class="fa fa-envelope"></i> <span>Mailbox</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-yellow">12</small>
          <small class="label pull-right bg-green">16</small>
          <small class="label pull-right bg-red">5</small>
        </span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-folder"></i> <span>Examples</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
        <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
        <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
        <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
        <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
        <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
        <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
        <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
        <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-share"></i> <span>Multilevel</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li>
          <a href="#"><i class="fa fa-circle-o"></i> Level One
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level Two
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
      </ul>
    </li>
    <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li> --}}
  </ul>