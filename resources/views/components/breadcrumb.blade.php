<div class="d-flex d-md-none mb-2 justify-content-end">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mb-0 py-0">
            <li class="breadcrumb-item">
                <a href="#">{{ $parent1 ?? 'Beranda' }}</a>
            </li>
            @isset($parent2)
                <li class="breadcrumb-item">
                    <a href="#">{{ $parent2 }}</a>
                </li>
            @endisset
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div>
