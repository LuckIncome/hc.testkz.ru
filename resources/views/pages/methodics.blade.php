@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')
    <div class="container-hc">
        <div class="bread">
            @include('partials.breadcrumbs',['title'=>$page->title])
        </div>
        <div class="title-main methods__top-title-main">
            <h3>{{$page->title}}</h3>
        </div>
    </div>
    <section class="methods">
        <div class="accordion" id="accordion">
            @foreach($methodics as $key=>$methodic)
                <div class="card">
                    <div class="card-header" id="heading{{$methodic->id}}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-lrg @if(!$loop->first) collapsed @endif"
                                    type="button" data-toggle="collapse"
                                    data-target="#collapse{{$methodic->id}}"
                                    aria-expanded="{{!$loop->first ? 'true' : 'false' }}"
                                    aria-controls="collapse{{$methodic->id}}"
                                    style="background:url('{{Voyager::image($methodic->image)}}') center center/cover no-repeat;">
                                <div class="btn-lrg__dark"></div>
                                <div class="container-hc">
                                    <div class="methods__title-main">{{$methodic->title}}</div>
                                    <div class="methods__subtitle-main">{{$methodic->excerpt}}</div>
                                    <a href="#" class="btn-request c-modal mobile-link-change"
                                       data-page="{{$methodic->title}}">@lang('general.signup')</a>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div id="collapse{{$methodic->id}}" class="collapse @if($loop->first) show @endif"
                         aria-labelledby="heading{{$methodic->id}}" data-parent="#accordion">
                        <div class="card-body">
                            <div class="accordion-inner" id="acc{{$methodic->id}}-inner">
                                <div class="container-hc">
                                    <p class="methods__inner-text">{{$methodic->description}}</p>
                                    <div class="card">
                                        <div class="card-header" id="head-inner{{$methodic->id}}_1">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-sm collapsed" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapseInner{{$methodic->id}}_1"
                                                        aria-expanded="false"
                                                        aria-controls="collapseInner{{$methodic->id}}_1">
                                                    <div class="acc-arr">
                                                        <svg width="13" height="13" viewbox="0 0 13 13" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="12.728" y="6.36426" width="1.5" height="8.99984"
                                                                  rx="0.75" transform="rotate(135 12.728 6.36426)"
                                                                  fill="#EA5C10"/>
                                                            <rect x="6.36377" y="12.728" width="1.49997" height="9"
                                                                  rx="0.749987" transform="rotate(-135 6.36377 12.728)"
                                                                  fill="#EA5C10"/>
                                                        </svg>
                                                    </div>
                                                    <span>{{strlen($methodic->symptom_title) > 0 ? $methodic->symptom_title : __('general.symptoms')}}</span>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseInner{{$methodic->id}}_1" class="collapse"
                                             aria-labelledby="head-inner{{$methodic->id}}_1"
                                             data-parent="#acc{{$methodic->id}}-inner">
                                            <div class="card-body">
                                                <div class="methods__inner-list">{!! $methodic->symptoms !!}</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="head-inner{{$methodic->id}}_2">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-sm collapsed" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapseInner{{$methodic->id}}_2"
                                                        aria-expanded="true"
                                                        aria-controls="collapseInner{{$methodic->id}}_2">
                                                    <div class="acc-arr">
                                                        <svg width="13" height="13" viewbox="0 0 13 13" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="12.728" y="6.36426" width="1.5" height="8.99984"
                                                                  rx="0.75" transform="rotate(135 12.728 6.36426)"
                                                                  fill="#EA5C10"/>
                                                            <rect x="6.36377" y="12.728" width="1.49997" height="9"
                                                                  rx="0.749987" transform="rotate(-135 6.36377 12.728)"
                                                                  fill="#EA5C10"/>
                                                        </svg>
                                                    </div>
                                                    <span>{{strlen($methodic->program_title) > 0 ? $methodic->program_title : __('general.programContent')}}</span>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseInner{{$methodic->id}}_2" class="collapse"
                                             aria-labelledby="head-inner{{$methodic->id}}_2"
                                             data-parent="#acc{{$methodic->id}}-inner">
                                            <div class="card-body">
                                                <div class="methods__inner-list">{!! $methodic->program !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
