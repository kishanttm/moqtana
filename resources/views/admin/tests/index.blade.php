@extends('layouts.app')

@section('title', __('Translation CMS'))

@section('content')
<!-- breadcrumb -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-0">Tests</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html" class="link">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tests</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card rounded-4">
                <div class="card-body">
                    <table class="Data_Table table align-middle mb-0 w-100 table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="py-2">Test Order #</th>
                                <th class="py-2">Client Name</th>
                                <th class="py-2">Service Order #</th>
                                <th class="py-2">Type</th>
                                <th class="py-2">GJP Count</th>
                                <th class="py-2">Date</th>
                                <th class="py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                            <tr>
                                <td>SO00001T</td>
                                <td>Ahmed Khan</td>
                                <td>S00001</td>
                                <td>Ring</td>
                                <td>2</td>
                                <td>13 Aug 2025</td>
                                <td>
                                    <a href="view-test.html" class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                        <svg width="20" height="20" viewBox="0 0 20 12" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 5.99998C8 6.44201 8.21071 6.86593 8.58579 7.17849C8.96086 7.49105 9.46957 7.66665 10 7.66665C10.5304 7.66665 11.0391 7.49105 11.4142 7.17849C11.7893 6.86593 12 6.44201 12 5.99998C12 5.55795 11.7893 5.13403 11.4142 4.82147C11.0391 4.50891 10.5304 4.33331 10 4.33331C9.46957 4.33331 8.96086 4.50891 8.58579 4.82147C8.21071 5.13403 8 5.55795 8 5.99998Z"/>
                                            <path d="M19 6C16.6 9.33333 13.6 11 10 11C6.4 11 3.4 9.33333 1 6C3.4 2.66667 6.4 1 10 1C13.6 1 16.6 2.66667 19 6Z"/>
                                        </svg>
                                    </a>
                                    <button class="btn btn-sm btn-secondary align-items-center d-inline-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <svg width="19" height="20" viewBox="0 0 19 17" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 4.63647H3C2.46957 4.63647 1.96086 4.82803 1.58579 5.16901C1.21071 5.50998 1 5.97244 1 6.45466V14.6365C1 15.1187 1.21071 15.5811 1.58579 15.9221C1.96086 16.2631 2.46957 16.4547 3 16.4547H12C12.5304 16.4547 13.0391 16.2631 13.4142 15.9221C13.7893 15.5811 14 15.1187 14 14.6365V13.7274"/>
                                            <path d="M17.385 4.25919C17.7788 3.90115 18.0001 3.41554 18.0001 2.90919C18.0001 2.40284 17.7788 1.91723 17.385 1.55919C16.9912 1.20115 16.457 1 15.9 1C15.343 1 14.8088 1.20115 14.415 1.55919L6 9.18191V11.9092H9L17.385 4.25919Z"/>
                                            <path d="M13 2.81824L16 5.54551"/>
                                        </svg>
                                    </button>
                                    <a href="start-test.html" class="btn btn-sm btn-primary">Start Test</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection