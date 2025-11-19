<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Contract CMS
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.contract.cms.store') }}" method="POST">
                        @csrf
                
                        <div class="card mb-4">
                            <div class="card-header fw-bold">Contract CMS English <span class="text-danger">*</span></div>
                            <div class="card-body">
                                <textarea name="contract_en" id="contract_en" class="form-control" rows="10">{{ old('contract_en', $contract->contract_en ?? '') }}</textarea>
                                @error('contract_en')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                
                        <div class="card mb-4">
                            <div class="card-header fw-bold">Contract CMS Arabic <span class="text-danger">*</span></div>
                            <div class="card-body">
                                <textarea name="contract_ar" id="contract_ar" class="form-control" rows="10">{{ old('contract_ar', $contract->contract_ar ?? '') }}</textarea>
                                @error('contract_ar')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('contract_en', {
        height: 300,
    });
    CKEDITOR.replace('contract_ar', {
        height: 300,
    });
</script>