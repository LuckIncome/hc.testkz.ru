<!DOCTYPE html>
<html lang="{{session()->get('locale')}}">
@include('partials.head')
<body class="@yield('page_class')">
<div id="healthcity">
    @include('partials.header')
    <main>
        @yield('content')
    </main>
</div>
@include('partials.footer')
@include('partials.modals')
@include('partials.scripts')
@yield('scripts')
</body>
</html>
