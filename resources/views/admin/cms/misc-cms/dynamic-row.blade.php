<div class="{{ $type }}-row">
    <li class="align-items-center d-flex gap-2 mb-1">
        <input type="hidden" name="{{ $type }}[{{ $index }}][id]" value="{{ $id }}">
        <input class="form-control" type="text" name="{{ $type }}[{{ $index }}][name]" value="{{ old($type.'.'.$index.'.name', $name) }}" placeholder="{{ $placeholder }}">

        @if($loop->last ?? true)
            <button type="button" class="btn p-0 delete-row remove-row" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete row" style="display: none;">
                <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--bs-danger)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.688 14.6875L35.3119 35.3114"/>
                    <path d="M14.6885 35.3125L35.3124 14.6886"/>
                </svg>
            </button>
            <button type="button" class="btn p-0 add-row btn-add" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add row">
                <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M25 10.416V39.5827"/>
                    <path d="M10.4166 25H39.5833"/>
                </svg>
            </button>
        @else
            <button type="button" class="btn p-0 delete-row remove-row" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete row" style="display: inline-flex;">
                <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--bs-danger)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.688 14.6875L35.3119 35.3114"/>
                    <path d="M14.6885 35.3125L35.3124 14.6886"/>
                </svg>
            </button>
            <button type="button" class="btn p-0 add-row btn-add" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add row" style="display: none;">
                <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="var(--brand-secondary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M25 10.416V39.5827"/>
                    <path d="M10.4166 25H39.5833"/>
                </svg>
            </button>
        @endif
    </li>
    @error($type.'.'.$index.'.name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>