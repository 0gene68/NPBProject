<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NPB</title>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/imageSlider.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rankTable.css') }}">
    </head>
    <body>
    {{-- 로그인 헤더 --}}
    <div id="header">
        <div id="mainLogo">
            <a href="/">
                <img src="storage/images/logos/NPB_logo.svg.png" alt="" id="logoImage">
            </a>    
        </div>
        <div id="wrap">
            <ul>
                <a href="/">
                    <li>일정</li>
                </a>
                <a href="/rank">
                    <li>순위</li>
                </a>
                <a href="/teams">
                    <li>구단 · 선수</li>
                </a>
                <a href="/board">
                    <li>게시판</li>
                </a>
                <a href="/">
                    <li>N/A</li>
                </a>
            </ul>
            <ul>
                <a href="/dashboard">
                    <li>마이페이지</li>
                </a>
                <li id="logout-btn">로그아웃</li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    {{-- 이미지 슬라이더 --}}
    <div class="slider-container">
        <div class="slider">
            @foreach ($teams as $team)
                <a href="/{{$team->team_id}}">
                    <img src={{$team->logo}} name="{{$team->teamName}}">
                </a>
            @endforeach
        </div>
    </div>
    {{-- 이전 / 다음 버튼 --}}
    <button class="prev-button">◀</button>
    <button class="next-button">▶</button>

    {{-- 이미지 슬라이더의 팀 로고에 따른 팀 이름 표시 --}}
    <div id="teamName"></div>

    {{-- 2023시즌 팀 순위표 --}}
    <div id="table-container">
        <div id="rankTableCentral" data-variable="{{$centralTeams}}"></div>
        <div id="rankTablePacific" data-variable="{{$pacificTeams}}"></div>  
    </div>
        
    <div id="footer"></div>

    <script src="{{ asset('js/imageSlider.js') }}"></script>
    <script src="{{ asset('js/rankTable.js') }}"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
    </body>
</html>
