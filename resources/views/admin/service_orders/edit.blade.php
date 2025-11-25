@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div>
        <h4 class="mb-0">Edit Service Order</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="link">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.service-orders.index') }}" class="link">Front Desk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Service Order</li>
            </ol>
        </nav>
    </div>
</div>
<form action="{{ route('admin.service-orders.update', $order) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
    @include('admin.service_orders.form', [
        'clients' => $clients ?? [],
        'jewelryTypes' => $jewelryTypes ?? [],
        'studdedStones' => $studdedStones ?? [],
        'articles' => $articles ?? [],
        'order' => $order ?? null
    ])
</form>
@endsection
