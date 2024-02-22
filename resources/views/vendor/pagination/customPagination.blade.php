@if ($paginator->hasPages())
    <div class="text-center col-lg-12 p-3 mx-auto">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <div class="btn text-monospace text-center text-dark">
                <a class="btn-text" style="text-decoration: none" href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev</a>
            </div>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="btn text-monospace text-center text-dark">
                <a class="btn-text" style="text-decoration: none" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></div>
        @endif
    </div>
@endif
