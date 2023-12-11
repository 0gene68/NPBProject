<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/rankTable.css') }}">
</head>
<body>
  {{-- 비로그인 헤더 --}}
  <div id="header">
    <div id="mainLogo">
        <a href="/">
          <img src="storage/images/logos/NPB_logo.svg.png" alt="" id="logoImage" />
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
      </ul>
      <ul>
        <a href="/dashboard">
          <li>로그인</li>
        </a>
        <a href="/register">
          <li>회원가입</li>
        </a>
      </ul>
    </div>
  </div>
    {{-- 2023시즌 팀 순위표 --}}
    <div id="table-container">
      <div id="rankTableCentral" data-variable="{{$centralTeams}}"></div>
      <div id="rankTablePacific" data-variable="{{$pacificTeams}}"></div>  
    </div>
    <script src="{{ asset('js/rankTable.js') }}"></script>

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
</body>
</html>