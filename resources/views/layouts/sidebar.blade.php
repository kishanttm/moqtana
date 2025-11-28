<aside class="sidebar shadow border-0 z-1">
    <div class="sticky-top p-3">
        <a href="index.html" class="brand mb-4 d-none d-lg-block">
            <img src="{{url('/')}}/assets/images/logo-color.svg" alt="Moqtna Brand Logo">
        </a>
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav flex-column gap-1 side-nav w-100">
                        <li><a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ $cmsTranslations['dashboard']->name }}</a></li>
                        <li><a class="nav-link {{ Request::is('admin/service-orders*') ? 'active' : '' }}" href="{{ route('admin.service-orders.index') }}">{{ $cmsTranslations['front_desk']->name }}</a></li>
                        <!--<li><a class="nav-link" href="valuation.html">Valuation</a></li> -->
                        @role('superadmin|tech manager')
                        <li><a class="nav-link {{ Request::is('admin/tests*') ? 'active' : '' }}" href="{{ route('admin.tests.index') }}">{{ $cmsTranslations['tests']->name }}</a></li>
                        <li class="sub-menu {{ (Request::is('admin/clients*') || Request::is('admin/users*')) ? 'active' : '' }}">
                            <p class="mb-0">{{ $cmsTranslations['control_panel']->name }}</p>
                            <ul class="list-unstyled ps-3 pb-2">
                                <li><a class="nav-link ms-1 {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">{{ $cmsTranslations['users']->name }}</a></li>
                                <li><a class="nav-link ms-1 {{ Request::is('admin/clients*') ? 'active' : '' }}" href="{{ route('clients.index') }}">{{ $cmsTranslations['clients']->name }}</a></li>
                            </ul>
                        </li>
                        
                        <!-- <li class="sub-menu">
                            <a class="nav-link" data-bs-toggle="collapse" href="#menu_ControlPanel" role="button" aria-expanded="false" aria-controls="menu_ControlPanel">
                                Control Panel
                            </a>
                            <div class="collapse" id="menu_ControlPanel">
                                <ul class="list-unstyled ps-3 pb-2">
                                    <li><a class="nav-link" href="users.html">Users</a></li>
                                    <li><a class="nav-link" href="clients.html">Clients</a></li>
                                </ul>
                            </div>
                        </li> -->
                        <!-- <li><a class="nav-link" href="archive.html">Archive</a></li> -->
                        <li class="sub-menu {{ (Request::is('admin/contract-cms*') || Request::is('admin/translations-cms*') || Request::is('admin/misc-cms*')) ? 'active' : '' }}">
                            <p class="mb-0">{{ $cmsTranslations['cms']->name }}</p>
                            <ul class="list-unstyled ps-3 pb-2">
                                <li><a class="nav-link ms-1 {{ Request::is('admin/contract-cms*') ? 'active' : '' }}" href="{{ route('admin.contract.cms') }}">{{ $cmsTranslations['contract_cms']->name }}</a></li>
                                <li><a class="nav-link ms-1 {{ Request::is('admin/translations-cms*') ? 'active' : '' }}" href="{{ route('admin.translations-cms.index') }}">{{ $cmsTranslations['translation_cms']->name }}</a></li>
                                <li><a class="nav-link ms-1 {{ Request::is('admin/misc-cms*') ? 'active' : '' }}" href="{{ route('admin.misc-cms.index') }}">{{ $cmsTranslations['misc_cms']->name }}</a></li>
                            </ul>
                        </li>
                        <!-- <li class="sub-menu">
                            <a class="nav-link" data-bs-toggle="collapse" href="#menu_CMS" role="button" aria-expanded="false" aria-controls="menu_CMS">
                                CMS
                            </a>
                            <div class="collapse" id="menu_CMS">
                                <ul class="list-unstyled ps-3 pb-2">
                                    <li><a class="nav-link" href="contract-cms.html">Contract CMS</a></li>
                                    <li><a class="nav-link" href="translation-cms.html">Translation CMS</a></li>
                                    <li><a class="nav-link" href="misc-cms.html">Misc. CMS</a></li>
                                </ul>
                            </div>
                        </li> -->
                        @endrole
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</aside>
