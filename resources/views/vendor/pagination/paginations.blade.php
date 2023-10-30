@vite(["resources/sass/pagination.scss"])
@if($proposals->hasPages())
<div class="pagination">
    @if(!$proposals->onFirstPage())
    <a href="{{ $proposals->previousPageUrl() }}" class="btn-nav left-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="left-icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
    </a>
    @endif
    <div class="page-numbers">
        @php
            $currentPage = $proposals->currentPage();
            $lastPage = $proposals->lastPage();
        @endphp
        @if ($lastPage <= 5)
            @foreach (range(1, $lastPage) as $pageNumber)
                <a href="{{ $proposals->url($pageNumber) }}" class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
            @endforeach
        @else
            @if ($currentPage <= 3)
                @foreach (range(1, 4) as $pageNumber)
                    <a href="{{ $proposals->url($pageNumber) }}" class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
                @endforeach
                <span class="btn-page">...</span>
                <a href="{{ $proposals->url($lastPage) }}" class="btn-page">{{ $lastPage }}</a>
            @elseif ($currentPage >= $lastPage - 3)
                <a href="{{ $proposals->url(1) }}" class="btn-page">1</a>
                <span class="btn-page">...</span>
                @foreach (range($lastPage - 4, $lastPage) as $pageNumber)
                    <a href="{{ $proposals->url($pageNumber) }}" class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
                @endforeach
            @else
                <a href="{{ $proposals->url(1) }}" class="btn-page">1</a>
                <span class="btn-page">...</span>
                @foreach (range($currentPage - 1, $currentPage + 1) as $pageNumber)
                    <a href="{{ $proposals->url($pageNumber) }}" class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</a>
                @endforeach
                <span class="btn-page">...</span>
                <a href="{{ $proposals->url($lastPage) }}" class="btn-page">{{ $lastPage }}</a>
            @endif
        @endif
    </div>
    @if(!$proposals->onLastPage())
    <a href="{{ $proposals->nextPageUrl() }}" class="btn-nav right-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="right-icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </a>
    @endif
</div>
@endif
