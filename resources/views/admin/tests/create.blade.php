@extends('layouts.app')
@section('content')
<!-- breadcrumb -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h4 class="mb-0">Start Tests</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html" class="link">Home</a></li>
                    <li class="breadcrumb-item"><a href="tests.html" class="link">Test List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">SO00001T</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row g-lg-4 g-3">
        <div class="col-12">
            <div class="card rounded-4 overflow-hidden" style="padding: 2px;">
                <div class="accordion accordion-flush my-accordion">
                    <!-- accordion 1 -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ClientDetails" aria-expanded="true" aria-controls="ClientDetails">
                                <h5 class="mb-0 text-secondary">Client Details</h5>
                            </div>
                        </div>
                        <div id="ClientDetails" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-lg-4 g-3">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Clients Name</p>
                                        <h5 class="fs-18 mb-0">Mohammed Ali</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Client Number</p>
                                        <h5 class="fs-18 mb-0">C-00016</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Mobile Number</p>
                                        <h5 class="fs-18 mb-0">+91 98765 43210</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Email Address</p>
                                        <h5 class="fs-18 mb-0">mohammed.ali@example.com</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Date / Time</p>
                                        <h5 class="fs-18 mb-0">20 Aug 2025, 11:30 AM</h5>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                        <p class="text-muted mb-2">Employee Number Received</p>
                                        <h5 class="fs-18 mb-0">2334</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- accordion 2 -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ServiceOrderDetails" aria-expanded="false" aria-controls="ServiceOrderDetails">
                                <h5 class="mb-0 text-secondary">Service Order Details</h5>
                            </div>
                        </div>
                        <div id="ServiceOrderDetails" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                No data
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h5>Gemstones & Jewelry Pc# (GJP)</h5>
            <div class="card rounded-4 overflow-hidden" style="padding: 2px;">
                <div class="accordion accordion-flush my-accordion">
                    <!-- Jewelry Type 1 -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#JewelryType-1" aria-expanded="true" aria-controls="JewelryType-1">
                                <div class="row g-lg-4 g-3 w-100">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Jewelry Type</p>
                                        <h6 class="mb-0">Ring</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Total Weight</p>
                                        <h6 class="mb-0">100 Gram</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Studded Stones</p>
                                        <h6 class="mb-0">Colorless Stones</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="JewelryType-1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-lg-4 g-3">
                                    <div class="col-lg-5">
                                        <ul class="list-unstyled mb-0 me-lg-5">
                                            <li class="d-flex gap-lg-4 gap-2 align-items-center mb-2 flex-wrap">
                                                <span class="text-truncate">Picture 1</span>
                                                <div class="d-flex gap-2 align-items-center ms-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                            <li class="d-flex gap-lg-4 gap-2 align-items-center mb-2 flex-wrap">
                                                <span class="text-truncate">Picture 2</span>
                                                <div class="d-flex gap-2 align-items-center ms-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                            <li class="d-flex gap-lg-4 gap-2 align-items-center mb-2 flex-wrap">
                                                <span class="text-truncate">Picture 3</span>
                                                <div class="d-flex gap-2 align-items-center ms-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                            <li class="d-flex gap-lg-4 gap-2 align-items-center mb-2 flex-wrap">
                                                <span class="text-truncate">Picture 4</span>
                                                <div class="d-flex gap-2 align-items-center ms-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                <p class="mb-0">Article belongings such as Boxes / Bag / Guarantee card:</p>
                                                <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                            <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                <p class="mb-0">Previous Valuation Report:</p>
                                                <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                            <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                <p class="mb-0">Invoices related to the Article:</p>
                                                <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                            <li class="d-flex gap-lg-4 gap-1 align-items-center mb-2 flex-wrap">
                                                <p class="mb-0 col-12 col-lg-6">Attachment:</p>
                                                <div class="d-flex gap-2 align-items-center ms-lg-auto">
                                                    <button class="btn btn-sm btn-accent text-white">Download</button>
                                                    <button class="btn btn-sm btn-secondary text-white">Preview</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-muted mb-2">Comment</p>
                                        <h5 class="fs-18 mb-0">Lorem Ipsum is simply dummy text of the printing</h5>
                                    </div>
                                    <!-- Add New Metal -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-start mb-lg-4 mb-3">
                                            <div class="card brand-bg rounded-4 flex-grow-1">
                                                <div class="card-body">
                                                    <div class="row g-lg-4 g-3">
                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                            <label class="form-label">Precious Metal Type <span class="text-danger">*</span></label>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected="">Select...</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                            <label class="form-label">Precious Colo <span class="text-danger">*</span></label>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected="">Select...</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                            <label class="form-label">Stamp <span class="text-danger">*</span></label>
                                                            <select class="form-select" aria-label="Default select example">
                                                                <option selected="">Select...</option>
                                                                <option value="1">One</option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                            <label class="form-label">Purity <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="input" placeholder="Enter here">
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <label class="form-label">Metal net Weight <span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Enter here">
                                                                <span class="input-group-text">Grams</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Metal">
                                                <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M14.688 14.688L35.3119 35.3119"/>
                                                    <path d="M14.688 35.312L35.3119 14.6881"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <button class="btn link align-items-center d-inline-flex gap-2 p-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 5V19"/>
                                                <path d="M5 12H19"/>
                                            </svg>
                                            Add New Metal
                                        </button>
                                    </div>
                                    <!-- Add New Gem Stones -->
                                    <div class="col-12">
                                        <div class="d-flex align-items-start mb-lg-4 mb-3">
                                            <div class="card brand-bg rounded-4 flex-grow-1">
                                                <div class="card-body">
                                                    <p class="mb-1 form-label">Choose Client Type</p>
                                                    <ul class="nav nav-pills mb-4 border p-1 rounded d-inline-flex" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="Diamond-tab" data-bs-toggle="pill" data-bs-target="#Diamond" type="button" role="tab" aria-controls="Diamond" aria-selected="true">Diamond</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="ColoredStones-tab" data-bs-toggle="pill" data-bs-target="#ColoredStones" type="button" role="tab" aria-controls="ColoredStones" aria-selected="false">ColoredStones</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Diamond -->
                                                        <div class="tab-pane fade show active" id="Diamond" role="tabpanel" aria-labelledby="Diamond-tab" tabindex="0">
                                                            <div class="row g-lg-4 g-3">
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Number of Stones <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="input" placeholder="Enter here">
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Weight <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="Enter here">
                                                                        <span class="input-group-text">Carat</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="input" placeholder="Enter here">
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Shape</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Cut Grade</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Color</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Fluorescence <span class="text-danger">*</span></label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Clarity</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Plotting</label>
                                                                    <input class="form-control" type="file">
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Identification <span class="text-danger">*</span></label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Comment</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="form-label">Internal Comments</label>
                                                                    <textarea class="form-control" placeholder="Enter here" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Colored Stones -->
                                                        <div class="tab-pane fade" id="ColoredStones" role="tabpanel" aria-labelledby="ColoredStones-tab" tabindex="0">
                                                            <div class="row g-lg-4 g-3">
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Number of Stones <span class="text-danger">*</span></label>
                                                                    <input type="number" class="form-control" name="input" placeholder="Enter here">
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Measurement <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" name="input" placeholder="Enter here">
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Weight <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="input" placeholder="Enter here">
                                                                        <select class="form-select">
                                                                            <option selected>Carets</option>
                                                                            <option value="1">option 1</option>
                                                                            <option value="2">option 1</option>
                                                                            <option value="3">option 1</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Weight per Stone <span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="input" placeholder="Enter here">
                                                                        <select class="form-select">
                                                                            <option selected>Carets</option>
                                                                            <option value="1">option 1</option>
                                                                            <option value="2">option 1</option>
                                                                            <option value="3">option 1</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Estimated <span class="text-danger">*</span></label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Identification</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Group</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Species</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Variety</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Color</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Clarity</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Transparncy</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Luster</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Phenomena</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xl-4 col-lg-6">
                                                                    <label class="form-label">Comment</label>
                                                                    <select class="form-select" aria-label="Default select example">
                                                                        <option selected>Select...</option>
                                                                        <option value="1">One</option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="form-label">Internal Comments</label>
                                                                    <textarea class="form-control" placeholder="Enter here" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Gem Stones">
                                                <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#FF1F35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M14.688 14.688L35.3119 35.3119"/>
                                                    <path d="M14.688 35.312L35.3119 14.6881"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <button class="btn link align-items-center d-inline-flex gap-2 p-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 5V19"/>
                                                <path d="M5 12H19"/>
                                            </svg>
                                            Add New Gem Stones
                                        </button>
                                    </div>
                                    <div class="col-12">
                                        <div class="page-action mt-2">
                                            <button class="btn btn-big btn-primary">Save</button>
                                            <button class="btn btn-big btn-secondary btn-cancel">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Jewelry Type 2 -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#JewelryType-2" aria-expanded="false" aria-controls="JewelryType-2">
                                <div class="row g-lg-4 g-3 w-100">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Jewelry Type</p>
                                        <h6 class="mb-0">Bracelet</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Total Weight</p>
                                        <h6 class="mb-0">100 Gram</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Studded Stones</p>
                                        <h6 class="mb-0">Colorless Stones</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="JewelryType-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                No data
                            </div>
                        </div>
                    </div>
                    <!-- Jewelry Type 3 -->
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#JewelryType-3" aria-expanded="false" aria-controls="JewelryType-3">
                                <div class="row g-lg-4 g-3 w-100">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Jewelry Type</p>
                                        <h6 class="mb-0">Watch</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Total Weight</p>
                                        <h6 class="mb-0">100 Gram</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-0 fs-12">Studded Stones</p>
                                        <h6 class="mb-0">Colorless Stones</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="JewelryType-3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                No data
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection