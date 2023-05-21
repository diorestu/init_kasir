<div class="d-none d-md-block">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mb-0 py-0">
            <li class="breadcrumb-item">
                <a href="{{ $parent_url ?? route('dashboard') }}">{{ $parent1 ?? 'Beranda' }}</a>
            </li>
            @isset($parent2)
                <li class="breadcrumb-item">
                    <a href="#">{{ $parent2 }}</a>
                </li>
            @endisset
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
    <h4 class="fw-bold">
        {{ $title }}
    </h4>
</div>
