<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JBL</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/league.css') }}">
</head>
<body>
  {{-- 비로그인 헤더 --}}
  <div id="header">
    <div id="mainLogo">
      <a href="/">
        <img src="storage/images/logos/projectLogo.png" alt="" id="logoImage">
      </a>    
    </div>
    <div id="wrap">
      <ul>
        <a href="/league">
          <li>NPB 리그</li>
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
        <a href="/login">
          <li>로그인</li>
        </a>
        <a href="/register">
          <li>회원가입</li>
        </a>
      </ul>
    </div>
  </div>
  <div id="main-content">
    <h1 style="font-size: 2.5em">NPB(Nippon Professional Baseball) 리그</h1>
    <div id="info-container">
        <img src="storage/images/logos/NPB_logo.svg.png" alt="">
        <div id="content">
            <div>· 일본 최고 인기의 프로 스포츠 리그</div><br>
            <div>· 전 세계 야구 리그 중 2번째로 큰 규모</div><br>
            <div>· 1936년 7개 팀으로 프로야구 출범</div><br>
            <div>· 1950년 신생 팀이 늘어나며 2개 리그로 분리</div><br>
        </div>
    </div>
    <div id="team-title-container">
        <div id="central">
            <img src="/storage/images/logos/Central.jpeg" alt="" id="centralLogo">
            <h1>센트럴 리그</h1>
        </div>
        <div id="pacific">
            <img src="/storage/images/logos/Pacific.png" alt="" id="pacificLogo">
            <h1>퍼시픽 리그</h1>
        </div>
    </div>
    <div id="team-container">
        <div id="central-team-container">
            @foreach ($centralTeams as $centralTeam)
            <div class="box">
                <img src="/storage/images/logos/{{$centralTeam->team_id}}.svg" alt="" class="teamLogo">
                <p>{{$centralTeam->teamName}}</p>
                <p>{{$centralTeam->hometown}}</p>
            </div>    
            @endforeach
        </div>
        <div id="pacific-team-container">
            @foreach ($pacificTeams as $pacificTeam)
            <div class="box">
                @if ($pacificTeam->team_id == 'Fighters')
                <img src="/storage/images/logos/{{$pacificTeam->team_id}}.png" alt="" class="teamLogo">
                @else
                <img src="/storage/images/logos/{{$pacificTeam->team_id}}.svg" alt="" class="teamLogo">
                @endif
                <p>{{$pacificTeam->teamName}}</p>
                <p>{{$pacificTeam->hometown}}</p>
            </div>    
            @endforeach
        </div>
    </div>
  </div>
  <h1>시즌 진행</h1>
  <div id="season-container">
      <div id="pennantRace-container">
          <h2>페넌트레이스</h2>
          <br>
          <div class="explaination">
              　같은 리그 팀과는 공식전(한 팀당 25경기), 다른 리그 팀과는 교류전(한 팀당 3경기)을 진행하여 총 143경기를 진행한다. 모든 경기를 진행한 이후 승률이 가장 높은 3팀이 클라이맥스 시리즈에 진출한다.
          </div>
      </div>
      <div id="climaxSeries-container">
          <h2>클라이맥스 시리즈</h2>    
          <br>
          <div class="explaination">
              　각 리그 3위 팀과 2위 팀이 3전 2선승제로 퍼스트 스테이지를 실시한다. 2위 팀은 홈 어드밴티지를 받는다. 퍼스트 스테이지 승리 팀은 리그 1위 팀과 6전 4선승제로 파이널 스테이지를 치른다. 리그 1위 팀은 홈 어드밴티지와 1승 어드밴티지를 받는다. 
          </div>
      </div>
      <div id="japanSeries-container">
          <h2>일본시리즈</h2>
          <br>
          <div class="explaination">
              　두 리그의 클라이맥스 시리즈 우승 팀이 맞붙는다. 7전 4선승제로 실시되고, 홀수 해에는 퍼시픽 리그 우승팀이, 짝수 해에는 센트럴 리그 우승팀이 홈 어드밴티지를 가져가게 되고, 홈 어드밴티지가 있는 팀의 홈 구장에서 4경기를 치른다. 
          </div>
      </div>
  </div>
  <br>
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


</body>
</html>