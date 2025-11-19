@if(session('success'))
    <div class="toast-container position-fixed top-0 end-0">
        <div class="toast bg-white text-success border-success m-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body d-flex align-items-center gap-2">
                {{ session('success') }}
                <button type="button" class="btn-close ms-auto p-1" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>        
    </div>
@endif
@if(session('error'))
    <div class="toast-container position-fixed top-0 end-0">
        <div class="toast bg-white text-danger border-danger m-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body d-flex align-items-center gap-2">
                {{ session('error') }}
                <button type="button" class="btn-close ms-auto p-1" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif