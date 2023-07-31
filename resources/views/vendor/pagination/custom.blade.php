@if ($paginator->hasPages())
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <a href="{{ route('status') }}">
                <button type="button" class="btn btn-warning">Sebelumnya</button>
            </a>
            @else
            <a href="{{ $paginator->previousPageUrl() }}">
                <button type="button" class="btn btn-warning">Sebelumnya</button>
            </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <button type="submit" class="btn btn-warning">
                <a class="bg-warning border-warning text-dark" href="{{ $paginator->nextPageUrl() }}" rel="next">Selanjutnya</a>
            </button>
            @else
            <a href="">
                <button type="button" class="btn btn-danger ">Selesai</button>
            </a>
            @endif
@endif
