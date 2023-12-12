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
    {{-- 로그인 헤더 --}}
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
    {{-- 2023시즌 팀 순위표 --}}
    <div class="table-container">
      <div id="rankTableCentral" data-variable="{{$centralTeams}}"></div>
      <div id="rankTablePacific" data-variable="{{$pacificTeams}}"></div>  
    </div>

    {{-- 2023시즌 투수 성적 --}}
    <div class="table-container">
      <div id="rankTableCentral">
        <div class="rankTable" id="central">
          <img src="storage/images/logos/Central.jpeg" alt="" id="centralLogo">
          <span>2023시즌 센트럴 리그 투수 순위</span>
        </div>
        <ul class="menus" id="centralPitcher">
          <li class="era">방어율</li>
          <li class="wins">다승</li>
          <li class="ks">탈삼진</li>
          <li class="saves">세이브</li>
          <li class="holds">홀드</li>
        </ul>
        <div style="display: flex">
          <div>
            <img src="/storage/images/Tigers/Tigers41.jpg" alt="" id="centralPitcherWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="centralEraRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">방어율</th>
            </tr>
            @foreach ($centralEraWinners as $centralEraWinner)
            <tr>
              <td class="rank">{{$centralEraWinner->ranks}}</td>
              <td class="name">{{$centralEraWinner->name}}</td>
              <td class="team">{{$centralEraWinner->team}}</td>
              <td class="test">{{$centralEraWinner->era}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralWinsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">다승</th>
            </tr>
            @foreach ($centralWinsWinners as $centralWinsWinner)
            <tr>
              <td class="rank">{{$centralWinsWinner->ranks}}</td>
              <td class="name">{{$centralWinsWinner->name}}</td>
              <td class="team">{{$centralWinsWinner->team}}</td>
              <td class="test">{{$centralWinsWinner->wins}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralKsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">탈삼진</th>
            </tr>
            @foreach ($centralKsWinners as $centralKsWinner)
            <tr>
              <td class="rank">{{$centralKsWinner->ranks}}</td>
              <td class="name">{{$centralKsWinner->name}}</td>
              <td class="team">{{$centralKsWinner->team}}</td>
              <td class="test">{{$centralKsWinner->ks}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralSavesRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">세이브</th>
            </tr>
            @foreach ($centralSavesWinners as $centralSavesWinner)
            <tr>
              <td class="rank">{{$centralSavesWinner->ranks}}</td>
              <td class="name">{{$centralSavesWinner->name}}</td>
              <td class="team">{{$centralSavesWinner->team}}</td>
              <td class="test">{{$centralSavesWinner->saves}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralHoldsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">홀드</th>
            </tr>
            @foreach ($centralHoldsWinners as $centralHoldsWinner)
            <tr>
              <td class="rank">{{$centralHoldsWinner->ranks}}</td>
              <td class="name">{{$centralHoldsWinner->name}}</td>
              <td class="team">{{$centralHoldsWinner->team}}</td>
              <td class="test">{{$centralHoldsWinner->holds}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div id="rankTableCentral">
        <div class="rankTable" id="pacific">
          <img src="storage/images/logos/Pacific.png" alt="" id="pacificLogo">
          <span>2023시즌 퍼시픽 리그 투수 순위</span>
      </div>
        <ul class="menus" id="pacificPitcher">
          <li class="era">방어율</li>
          <li class="wins">다승</li>
          <li class="ks">탈삼진</li>
          <li class="saves">세이브</li>
          <li class="holds">홀드</li>
        </ul>
        <div style="display: flex">
          <div>
            <img src="/storage/images/Buffaloes/Buffaloes18.jpg" alt="" id="pacificPitcherWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="pacificEraRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">방어율</th>
            </tr>
            @foreach ($pacificEraWinners as $pacificEraWinner)
            <tr>
              <td class="rank">{{$pacificEraWinner->ranks}}</td>
              <td class="name">{{$pacificEraWinner->name}}</td>
              <td class="team">{{$pacificEraWinner->team}}</td>
              <td class="test">{{$pacificEraWinner->era}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificWinsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">다승</th>
            </tr>
            @foreach ($pacificWinsWinners as $pacificWinsWinner)
            <tr>
              <td class="rank">{{$pacificWinsWinner->ranks}}</td>
              <td class="name">{{$pacificWinsWinner->name}}</td>
              <td class="team">{{$pacificWinsWinner->team}}</td>
              <td class="test">{{$pacificWinsWinner->wins}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificKsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">탈삼진</th>
            </tr>
            @foreach ($pacificKsWinners as $pacificKsWinner)
            <tr>
              <td class="rank">{{$pacificKsWinner->ranks}}</td>
              <td class="name">{{$pacificKsWinner->name}}</td>
              <td class="team">{{$pacificKsWinner->team}}</td>
              <td class="test">{{$pacificKsWinner->ks}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificSavesRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">세이브</th>
            </tr>
            @foreach ($pacificSavesWinners as $pacificSavesWinner)
            <tr>
              <td class="rank">{{$pacificSavesWinner->ranks}}</td>
              <td class="name">{{$pacificSavesWinner->name}}</td>
              <td class="team">{{$pacificSavesWinner->team}}</td>
              <td class="test">{{$pacificSavesWinner->saves}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificHoldsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">홀드</th>
            </tr>
            @foreach ($pacificHoldsWinners as $pacificHoldsWinner)
            <tr>
              <td class="rank">{{$pacificHoldsWinner->ranks}}</td>
              <td class="name">{{$pacificHoldsWinner->name}}</td>
              <td class="team">{{$pacificHoldsWinner->team}}</td>
              <td class="test">{{$pacificHoldsWinner->holds}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  
    {{-- 2023시즌 타자 성적 --}}
    <div class="table-container">
      <div id="rankTableCentral">
        <div class="rankTable" id="central">
          <img src="storage/images/logos/Central.jpeg" alt="" id="centralLogo">
          <span>2023시즌 센트럴 리그 타자 순위</span>
        </div>
        <ul class="menus" id="centralBatter">
          <li class="average">타율</li>
          <li class="homerun">홈런</li>
          <li class="rbi">타점</li>
          <li class="hits">안타</li>
          <li class="steals">도루</li>
        </ul>
        <div style="display: flex">
          <div>
            <img src="/storage/images/Baystars/Baystars51.jpg" alt="" id="centralBatterWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="centralAverageRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">타율</th>
            </tr>
            @foreach ($centralAverageWinners as $centralAverageWinners)
            <tr>
              <td class="rank">{{$centralAverageWinners->ranks}}</td>
              <td class="name">{{$centralAverageWinners->name}}</td>
              <td class="team">{{$centralAverageWinners->team}}</td>
              <td class="test">{{$centralAverageWinners->average}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralHomerunRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">홈런</th>
            </tr>
            @foreach ($centralHomerunsWinners as $centralHomerunsWinner)
            <tr>
              <td class="rank">{{$centralHomerunsWinner->ranks}}</td>
              <td class="name">{{$centralHomerunsWinner->name}}</td>
              <td class="team">{{$centralHomerunsWinner->team}}</td>
              <td class="test">{{$centralHomerunsWinner->homeruns}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralRbiRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">타점</th>
            </tr>
            @foreach ($centralRbiWinners as $centralRbiWinner)
            <tr>
              <td class="rank">{{$centralRbiWinner->ranks}}</td>
              <td class="name">{{$centralRbiWinner->name}}</td>
              <td class="team">{{$centralRbiWinner->team}}</td>
              <td class="test">{{$centralRbiWinner->rbi}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralHitsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">안타</th>
            </tr>
            @foreach ($centralHitsWinners as $centralHitsWinner)
            <tr>
              <td class="rank">{{$centralHitsWinner->ranks}}</td>
              <td class="name">{{$centralHitsWinner->name}}</td>
              <td class="team">{{$centralHitsWinner->team}}</td>
              <td class="test">{{$centralHitsWinner->hits}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="centralStealsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">홀드</th>
            </tr>
            @foreach ($centralStealsWinners as $centralStealsWinner)
            <tr>
              <td class="rank">{{$centralStealsWinner->ranks}}</td>
              <td class="name">{{$centralStealsWinner->name}}</td>
              <td class="team">{{$centralStealsWinner->team}}</td>
              <td class="test">{{$centralStealsWinner->steals}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div id="rankTableCentral">
        <div class="rankTable" id="pacific">
          <img src="storage/images/logos/Pacific.png" alt="" id="pacificLogo">
          <span>2023시즌 퍼시픽 리그 타자 순위</span>
        </div>
        <ul class="menus" id="pacificBatter">
          <li class="average">타율</li>
          <li class="homerun">홈런</li>
          <li class="rbi">타점</li>
          <li class="hits">안타</li>
          <li class="steals">도루</li>
        </ul>
        <div style="display: flex">
          <div>
            <img src="/storage/images/Buffaloes/Buffaloes44.jpg" alt="" id="pacificBatterWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="pacificAverageRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">타율</th>
            </tr>
            @foreach ($pacificAverageWinners as $pacificAverageWinner)
            <tr>
              <td class="rank">{{$pacificAverageWinner->ranks}}</td>
              <td class="name">{{$pacificAverageWinner->name}}</td>
              <td class="team">{{$pacificAverageWinner->team}}</td>
              <td class="test">{{$pacificAverageWinner->average}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificHomerunRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">홈런</th>
            </tr>
            @foreach ($pacificHomerunsWinners as $pacificHomerunsWinner)
            <tr>
              <td class="rank">{{$pacificHomerunsWinner->ranks}}</td>
              <td class="name">{{$pacificHomerunsWinner->name}}</td>
              <td class="team">{{$pacificHomerunsWinner->team}}</td>
              <td class="test">{{$pacificHomerunsWinner->homeruns}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificRbiRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">타점</th>
            </tr>
            @foreach ($pacificRbiWinners as $pacificRbiWinner)
            <tr>
              <td class="rank">{{$pacificRbiWinner->ranks}}</td>
              <td class="name">{{$pacificRbiWinner->name}}</td>
              <td class="team">{{$pacificRbiWinner->team}}</td>
              <td class="test">{{$pacificRbiWinner->rbi}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificHitsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">안타</th>
            </tr>
            @foreach ($pacificHitsWinners as $pacificHitsWinner)
            <tr>
              <td class="rank">{{$pacificHitsWinner->ranks}}</td>
              <td class="name">{{$pacificHitsWinner->name}}</td>
              <td class="team">{{$pacificHitsWinner->team}}</td>
              <td class="test">{{$pacificHitsWinner->hits}}</td>
            </tr>
            @endforeach
          </table>
          <table class="personal-records-table" style="display: none" id="pacificStealsRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">도루</th>
            </tr>
            @foreach ($pacificStealsWinners as $pacificStealsWinner)
            <tr>
              <td class="rank">{{$pacificStealsWinner->ranks}}</td>
              <td class="name">{{$pacificStealsWinner->name}}</td>
              <td class="team">{{$pacificStealsWinner->team}}</td>
              <td class="test">{{$pacificStealsWinner->steals}}</td>
            </tr>
            @endforeach
          </table>
        </div>
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

  <script src="{{ asset('js/rankTable.js') }}"></script>
  <script src="{{ asset('js/logout.js') }}"></script>
</body>
</html>