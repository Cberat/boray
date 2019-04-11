<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        frontend.blade.php

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{route("backend.dashboard")}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Urun</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route("backend.urun.index")}}">Urunler</a></li>
                    <li><a href="{{route("backend.urun.category.index")}}">Kategoriler</a></li>
                    <li><a href="{{route("backend.urun.sehir.index")}}">Sehir</a></li>
                    <li><a href="{{route("backend.urun.agent.index")}}">Agent</a></li>
                </ul>
            </li>
           {{-- <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Sabit Sayfalar</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route("backend.static.show")}}">Sayfalar</a></li>
                    <li><a href="{{route("backend.static.module.show")}}">Moduller</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Genel Ayarlar</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route("backend.settings.show")}}">Ayarlar</a></li>
                    <li><a href="{{route("backend.menus.index")}}">Menüler</a></li>
                </ul>
            </li>--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
