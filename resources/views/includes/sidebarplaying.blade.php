<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
      <img src="{{ URL::asset('/img/owlitam1.png') }}" alt="" width="100">
    </div>
    <div class="list-group list-group-flush">
         @foreach ($video as $query => $videos)
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="text-header">{{ $videos->judul }}</h5>
                <h5 class="mb-0">
                    @foreach ($anakvideo as $query)
                        @if ($query->video_id == $videos->id)
                            <a href="{{ $videodetails->url }}/users/course_playing/{{ $query->products_slug }}/{{ $query->id }}">
                                {{ Str::limit($query->nama,'21') }}
                            </a>
                        @endif
                    @endforeach
                </h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
