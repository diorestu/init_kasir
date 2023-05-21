<div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="{{ $id }}" aria-labelledby="{{ $id }}Label">
        <div class="offcanvas-header">
            <h5 id="{{ $id }}Label" class="offcanvas-title">{{ $title }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{ $slot }}
        </div>
    </div>
</div>
