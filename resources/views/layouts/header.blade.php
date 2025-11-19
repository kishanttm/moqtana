<!-- Topbar -->
<header class="topbar d-flex gap-4 align-items-center py-3 mb-lg-4 sticky-top">
    <div class="align-items-center d-flex d-lg-none gap-3">
        <!-- Toggler -->
        <button class="navbar-toggler p-2 rounded" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav" aria-controls="offcanvasNav" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--bs-white)" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
        </button>
        <div class="brand">
            @if(auth()->user()->getUserImageUrlAttribute())
                <img class="avatar" src="{{ auth()->user()->getUserImageUrlAttribute() ?? '' }}" alt="User Icon">
            @else
                <img width="80" src="{{url('/')}}/assets/images/logo-color.svg" alt="Moqtna Brand Logo">
            @endif
        </div>
    </div>
    <div class="align-items-center d-none d-sm-flex flex-grow-1 gap-2 main-search position-relative">
        <input class="form-control search-input" id="searchInput" type="search" placeholder="Search...">
        <div class="position-absolute search-result top-100 w-100 z-3 active">
            <div class="card rounded shadow">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item search-service">
                            <div class="row g-3">
                                <div class="col-xl-5 col-lg-6">
                                    <ul class="list-unstyled">
                                        <li><strong>#SO1234</strong> - Service Order</li>
                                        <li><strong>Client Name:</strong> - Zainab Ansari</li>
                                        <li><strong>Date:</strong> 20 Aug 2025</li>
                                    </ul>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <p class="mb-1">Action</p>
                                    <div class="d-flex flex-wrap gap-1">
                                        <button class="btn btn-sm btn-secondary align-items-center d-inline-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                                <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-secondary align-items-center d-inline-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V9C19 8.46957 18.7893 7.96086 18.4142 7.58579C18.0391 7.21071 17.5304 7 17 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15H5"/>
                                                <path d="M15 7V3C15 2.46957 14.7893 1.96086 14.4142 1.58579C14.0391 1.21071 13.5304 1 13 1H7C6.46957 1 5.96086 1.21071 5.58579 1.58579C5.21071 1.96086 5 2.46957 5 3V7"/>
                                                <path d="M5 13C5 12.4696 5.21071 11.9609 5.58579 11.5858C5.96086 11.2107 6.46957 11 7 11H13C13.5304 11 14.0391 11.2107 14.4142 11.5858C14.7893 11.9609 15 12.4696 15 13V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H7C6.46957 19 5.96086 18.7893 5.58579 18.4142C5.21071 18.0391 5 17.5304 5 17V13Z"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-accent text-white">Download</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item search-test">
                            <div class="row g-3">
                                <div class="col-xl-5 col-lg-6">
                                    <ul class="list-unstyled">
                                        <li><strong>#SO1234</strong> - Service Order</li>
                                        <li><strong>Client Name:</strong> - Zainab Ansari</li>
                                        <li><strong>Date:</strong> 20 Aug 2025</li>
                                    </ul>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <p class="mb-1">Action</p>
                                    <div class="d-flex flex-wrap gap-1">
                                        <button class="btn btn-sm btn-secondary align-items-center d-inline-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                                <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-secondary align-items-center d-inline-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V9C19 8.46957 18.7893 7.96086 18.4142 7.58579C18.0391 7.21071 17.5304 7 17 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15H5"/>
                                                <path d="M15 7V3C15 2.46957 14.7893 1.96086 14.4142 1.58579C14.0391 1.21071 13.5304 1 13 1H7C6.46957 1 5.96086 1.21071 5.58579 1.58579C5.21071 1.96086 5 2.46957 5 3V7"/>
                                                <path d="M5 13C5 12.4696 5.21071 11.9609 5.58579 11.5858C5.96086 11.2107 6.46957 11 7 11H13C13.5304 11 14.0391 11.2107 14.4142 11.5858C14.7893 11.9609 15 12.4696 15 13V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H7C6.46957 19 5.96086 18.7893 5.58579 18.4142C5.21071 18.0391 5 17.5304 5 17V13Z"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-accent text-white">Download</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item search-valuation">
                            <div class="row g-3">
                                <div class="col-xl-5 col-lg-6">
                                    <ul class="list-unstyled">
                                        <li><strong>#SO1234</strong> - Service Order</li>
                                        <li><strong>Client Name:</strong> - Zainab Ansari</li>
                                        <li><strong>Date:</strong> 20 Aug 2025</li>
                                    </ul>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <p class="mb-1">Action</p>
                                    <div class="d-flex flex-wrap gap-1">
                                        <button class="btn btn-sm btn-secondary align-items-center d-inline-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                                <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-secondary align-items-center d-inline-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V9C19 8.46957 18.7893 7.96086 18.4142 7.58579C18.0391 7.21071 17.5304 7 17 7H3C2.46957 7 1.96086 7.21071 1.58579 7.58579C1.21071 7.96086 1 8.46957 1 9V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15H5"/>
                                                <path d="M15 7V3C15 2.46957 14.7893 1.96086 14.4142 1.58579C14.0391 1.21071 13.5304 1 13 1H7C6.46957 1 5.96086 1.21071 5.58579 1.58579C5.21071 1.96086 5 2.46957 5 3V7"/>
                                                <path d="M5 13C5 12.4696 5.21071 11.9609 5.58579 11.5858C5.96086 11.2107 6.46957 11 7 11H13C13.5304 11 14.0391 11.2107 14.4142 11.5858C14.7893 11.9609 15 12.4696 15 13V17C15 17.5304 14.7893 18.0391 14.4142 18.4142C14.0391 18.7893 13.5304 19 13 19H7C6.46957 19 5.96086 18.7893 5.58579 18.4142C5.21071 18.0391 5 17.5304 5 17V13Z"/>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-accent text-white">Download</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item search-gjp">
                            <div class="row g-3">
                                <div class="col-xl-5 col-lg-6">
                                    <ul class="list-unstyled">
                                        <li><strong>#SO1234</strong> - Service Order</li>
                                        <li><strong>Client Name:</strong> - Zainab Ansari</li>
                                        <li><strong>Date:</strong> 20 Aug 2025</li>
                                    </ul>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <p class="mb-1">Action</p>
                                    <div class="d-flex flex-wrap gap-1">
                                        <button class="btn btn-sm btn-secondary">View Service Order</button>
                                        <button class="btn btn-sm btn-secondary">View Test Report</button>
                                        <button class="btn btn-sm btn-secondary">View Vauation Report</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-auto d-flex align-items-center gap-xl-4 gap-3">
        <a href="#" title="Notification">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.5 6.25C12.5 5.58696 12.7634 4.95107 13.2322 4.48223C13.7011 4.01339 14.337 3.75 15 3.75C15.663 3.75 16.2989 4.01339 16.7678 4.48223C17.2366 4.95107 17.5 5.58696 17.5 6.25C18.9355 6.92878 20.1593 7.98541 21.0401 9.30662C21.9209 10.6278 22.4255 12.1638 22.5 13.75V17.5C22.5941 18.2771 22.8693 19.0213 23.3035 19.6727C23.7377 20.324 24.3188 20.8643 25 21.25H5C5.68117 20.8643 6.26226 20.324 6.69648 19.6727C7.13071 19.0213 7.40593 18.2771 7.5 17.5V13.75C7.57445 12.1638 8.07913 10.6278 8.95994 9.30662C9.84075 7.98541 11.0645 6.92878 12.5 6.25Z" stroke="#19303F" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.25 21.25V22.5C11.25 23.4946 11.6451 24.4484 12.3483 25.1517C13.0516 25.8549 14.0054 26.25 15 26.25C15.9946 26.25 16.9484 25.8549 17.6517 25.1517C18.3549 24.4484 18.75 23.4946 18.75 22.5V21.25" stroke="#19303F" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <div class="dropdown user-avatar">
            <button class="btn p-0 d-flex gap-2 border-0 align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle border-3 border-white border shadow" src="https://i.pravatar.cc/36?img=3" alt="avatar" width="50" height="50">
                <span class="d-md-flex d-none flex-column text-start">
                    <span class="name lh-sm">{{ auth()->user()->name }}</span>
                    <span class="roll text-secondary fs-14 mb-0">{{ ucfirst(auth()->user()->roles()->first()->name) }}</span>
                </span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end rounded-3 shadow">
                <!-- <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li> -->
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf   
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">{{ $cmsTranslations['logout']->name }}</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>