<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/teams.css') }}">
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
                  <li id="userName">{{$user->name}}</li>
              </a>
              <li id="logout-btn">로그아웃</li>
              <form id="logout-form" method="POST" action="{{ route('logout') }}">
                  @csrf
              </form>
          </ul>
      </div>
  </div>
  <div id="titles">
    <div class="title" id="centralTitle">
      <img src="storage/images/logos/Central.jpeg" alt="" id="centralLogo">
      <span>센트럴 리그</span>
    </div>
    <div class="title" id="pacificTitle">
      <img src="storage/images/logos/Pacific.png" alt="" id="pacificLogo">
      <span>퍼시픽 리그</span>
    </div>
  </div>
  <div id="container">
    <div id="central-container">
        @foreach ($centralTeams as $centralTeam)
        <div class="wrapper">
          <div>
            <a href="/{{$centralTeam->team_id}}">
              <img src={{$centralTeam->logo}} alt="이미지 1">
            </a>
          </div>
          <div>
            <h2>{{$centralTeam->teamName}}</h2>
            <h4>창단 | {{$centralTeam->foundationDate}}</h4>
            <h4>연고지 | {{$centralTeam->hometown}}</h4>
            <h4>홈구장 | {{$centralTeam->homeStadium}} </h4>
            <a href={{$centralTeam->homepageLink}}><h4>▶ 구단 홈페이지</h4></a>
          </div>
        </div>
        @endforeach
    </div>
    <div id="pacific-container">
      @foreach ($pacificTeams as $pacificTeam)
      <div class="wrapper">
        <div>
          <a href="/{{$pacificTeam->team_id}}">
            <img src={{$pacificTeam->logo}} alt="이미지 1">
          </a>
        </div>
        <div>
          <h2>{{$pacificTeam->teamName}}</h2>
          <h4>창단 | {{$pacificTeam->foundationDate}}</h4>
          <h4>연고지 | {{$pacificTeam->hometown}}</h4>
          <h4>홈구장 | {{$pacificTeam->homeStadium}} </h4>
          <a href={{$pacificTeam->homepageLink}}><h4>▶ 구단 홈페이지</h4></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  {{-- 푸터 --}}
  <div id="footer">
    <div id="teamHomepageLinks">
        <div id="centralTeams">
            @foreach ($centralTeams as $centralTeam)
                <a href="{{$centralTeam->homepageLink}}">
                    <img src="storage/images/logos/{{$centralTeam->team_id}}.svg" alt="꽥!" class="teamLogos">
                </a>
            @endforeach                    
        </div>
        <div id="pacificTeams">
            @foreach ($pacificTeams as $pacificTeam)
                @if ($pacificTeam->team_id == 'Fighters')
                    <a href="{{$pacificTeam->homepageLink}}">
                        <img src="storage/images/logos/{{$pacificTeam->team_id}}.png" alt="꽥!" class="teamLogos">
                    </a>
                @else
                    <a href="{{$pacificTeam->homepageLink}}">
                        <img src="storage/images/logos/{{$pacificTeam->team_id}}.svg" alt="꽥!" class="teamLogos">
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    
    <div>* 모든 선수 정보는 2023 시즌 기준입니다.</div><br>
    <div>* 아이디어 제공: 
        <a href="https://npb.jp/">▶ NPB 사이트</a>
    </div>
</div>
  <script src="{{ asset('js/logout.js') }}"></script>
</body>
</html>