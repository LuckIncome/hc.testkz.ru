<ul>
    <li><a href="/">@lang('general.home')</a></li>
    <span><img src="/img/icons/bread-arrow-icon.svg" alt="arrow"></span>
    @if(isset($subtitle))
        @if(isset($titleLink))
            <li><a href="{{$titleLink}}">{{$title}}</a></li>
        @else
            <li class="current"><span>{{$title}}</span></li>
        @endif
        <span><img src="/img/icons/bread-arrow-icon.svg" alt="arrow"></span>
        @if(isset($childTitle))
            <li><a href="{{$subtitleLink}}">{{$subtitle}}</a></li>
            <span><img src="/img/icons/bread-arrow-icon.svg" alt="arrow"></span>
            @if(isset($subChildTitle))
                <li><a href="{{$childLink}}">{{$childTitle}}</a></li>
                <span><img src="/img/icons/bread-arrow-icon.svg" alt="arrow"></span>
                <li class="current"><span>{{$subChildTitle}}</span></li>
            @else
                <li class="current"><span>{{$childTitle}}</span></li>
            @endif
        @else
            <li class="current"><span>{{$subtitle}}</span></li>
        @endif
    @else
        <li class="current"><span>{{$title}}</span></li>
    @endif
</ul>
