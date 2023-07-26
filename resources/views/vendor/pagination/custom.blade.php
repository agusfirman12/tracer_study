@if ($paginator->hasPages())
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                    <button type="button" class="btn btn-warning">
                        <a href="{{ route('status') }}" class="page-link bg-warning border-warning text-dark">Sebelumnya</a >
                    </button>
            @else
                    <button type="button" class="btn btn-warning">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">sebelumnya</a>
                    </button>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <button type="submit" class="btn btn-warning">
                        <a class="page-link bg-warning border-warning text-dark" href="{{ $paginator->nextPageUrl() }}" rel="next">Selanjutnya</a>
                    </button>
            @else
                <div class="page-item disabled" aria-disabled="true">
                    <button type="submit" class="btn btn-warning">
                        <a class="page-link bg-warning border-warning text-dark" href="{{ $paginator->nextPageUrl() }}" rel="next">Selanjutnya</a>
                    </button>>
                </div>
            @endif
        </div>
@endif
