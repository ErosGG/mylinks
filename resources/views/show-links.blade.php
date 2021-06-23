@extends("layout")

@section("title", "mylnks")

@section("content")
    @if($links)
        <h5 class="text-center fw-bold mt-3">mylnks</h5>
        <div class="mt-2 row m-0 mt-4">
            @foreach($links as $link)
                <div class="pb-linkbox pb-desktop-list-small-rnd pb-mobile-list-small-rnd bt-2 mb-3 col-md-12 col-12">
                    <div class="pb-linkbox-inner lnkbio-boxcolor rounded p-2 row ml-0 mr-0">
                        <a href="{{ $link->url }}" rel="external nofollow ugc" target="_blank" class="d-block w-100 h-100"
                           title="{{ $link->title }}">
                            <div class="pb-placeholder-desktop pb-placeholder-mobile bg-lightgray">
                                <i class="far fa-image"></i>
                            </div>
                        </a>
                        <a class="pb-linktitle d-block lnkbio-linkcolor text-center
                                    fw-bold text-uppercase mt-0 col-12 align-self-center"
                           href="{{ $link->url }}" rel="external nofollow" target="_blank">{{ $link->title }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
