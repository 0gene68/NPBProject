<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JBL</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/rankTable.css') }}">
</head>
<body>
    @if($isLoggedIn) 
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
    @else
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
  @endif

    {{-- 2024시즌 팀 순위표 --}}
    <div class="table-container">
      <div id="rankTableCentral" data-variable="{{$cTeams}}"></div>
      <div id="rankTablePacific" data-variable="{{$pTeams}}"></div>  
    </div>

    {{-- 2024시즌 투수 성적 --}}
    <div class="table-container">
      <div id="rankTableCentral">
        <div class="rankTable" id="central">
          <img src="storage/images/logos/Central.jpeg" alt="" id="centralLogo">
          <span>2024시즌 센트럴 리그 투수 순위</span>
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
            <img src="{{$cEraWinners[0]->image}}" alt="" id="centralPitcherWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="centralEraRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">방어율</th>
            </tr>
            @foreach ($cEraWinners as $cEraWinner)
            <tr>
              <td class="rank">{{$cEraWinner->ranks}}</td>
              <td class="name">{{$cEraWinner->name}}</td>
              <td class="team">{{$cEraWinner->team}}</td>
              <td class="test">{{$cEraWinner->era}}</td>
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
            @foreach ($cWinsWinners as $cWinsWinner)
            <tr>
              <td class="rank">{{$cWinsWinner->ranks}}</td>
              <td class="name">{{$cWinsWinner->name}}</td>
              <td class="team">{{$cWinsWinner->team}}</td>
              <td class="test">{{$cWinsWinner->wins}}</td>
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
            @foreach ($cKsWinners as $cKsWinner)
            <tr>
              <td class="rank">{{$cKsWinner->ranks}}</td>
              <td class="name">{{$cKsWinner->name}}</td>
              <td class="team">{{$cKsWinner->team}}</td>
              <td class="test">{{$cKsWinner->ks}}</td>
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
            @foreach ($cSavesWinners as $cSavesWinner)
            <tr>
              <td class="rank">{{$cSavesWinner->ranks}}</td>
              <td class="name">{{$cSavesWinner->name}}</td>
              <td class="team">{{$cSavesWinner->team}}</td>
              <td class="test">{{$cSavesWinner->saves}}</td>
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
            @foreach ($cHoldsWinners as $cHoldsWinner)
            <tr>
              <td class="rank">{{$cHoldsWinner->ranks}}</td>
              <td class="name">{{$cHoldsWinner->name}}</td>
              <td class="team">{{$cHoldsWinner->team}}</td>
              <td class="test">{{$cHoldsWinner->holds}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div id="rankTableCentral">
        <div class="rankTable" id="pacific">
          <img src="storage/images/logos/Pacific.png" alt="" id="pacificLogo">
          <span>2024시즌 퍼시픽 리그 투수 순위</span>
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
            <img src="{{$pEraWinners[0]->image}}" alt="" id="pacificPitcherWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="pacificEraRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">방어율</th>
            </tr>
            @foreach ($pEraWinners as $pEraWinner)
            <tr>
              <td class="rank">{{$pEraWinner->ranks}}</td>
              <td class="name">{{$pEraWinner->name}}</td>
              <td class="team">{{$pEraWinner->team}}</td>
              <td class="test">{{$pEraWinner->era}}</td>
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
            @foreach ($pWinsWinners as $pWinsWinner)
            <tr>
              <td class="rank">{{$pWinsWinner->ranks}}</td>
              <td class="name">{{$pWinsWinner->name}}</td>
              <td class="team">{{$pWinsWinner->team}}</td>
              <td class="test">{{$pWinsWinner->wins}}</td>
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
            @foreach ($pKsWinners as $pKsWinner)
            <tr>
              <td class="rank">{{$pKsWinner->ranks}}</td>
              <td class="name">{{$pKsWinner->name}}</td>
              <td class="team">{{$pKsWinner->team}}</td>
              <td class="test">{{$pKsWinner->ks}}</td>
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
            @foreach ($pSavesWinners as $pSavesWinner)
            <tr>
              <td class="rank">{{$pSavesWinner->ranks}}</td>
              <td class="name">{{$pSavesWinner->name}}</td>
              <td class="team">{{$pSavesWinner->team}}</td>
              <td class="test">{{$pSavesWinner->saves}}</td>
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
            @foreach ($pHoldsWinners as $pHoldsWinner)
            <tr>
              <td class="rank">{{$pHoldsWinner->ranks}}</td>
              <td class="name">{{$pHoldsWinner->name}}</td>
              <td class="team">{{$pHoldsWinner->team}}</td>
              <td class="test">{{$pHoldsWinner->holds}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  
    {{-- 2024시즌 타자 성적 --}}
    <div class="table-container">
      <div id="rankTableCentral">
        <div class="rankTable" id="central">
          <img src="storage/images/logos/Central.jpeg" alt="" id="centralLogo">
          <span>2024시즌 센트럴 리그 타자 순위</span>
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
            <img src="{{$cAverageWinners[0]->image}}" alt="" id="centralBatterWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="centralAverageRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">타율</th>
            </tr>
            @foreach ($cAverageWinners as $cAverageWinner)
            <tr>
              <td class="rank">{{$cAverageWinner->ranks}}</td>
              <td class="name">{{$cAverageWinner->name}}</td>
              <td class="team">{{$cAverageWinner->team}}</td>
              <td class="test">{{$cAverageWinner->average}}</td>
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
            @foreach ($cHomerunsWinners as $cHomerunsWinner)
            <tr>
              <td class="rank">{{$cHomerunsWinner->ranks}}</td>
              <td class="name">{{$cHomerunsWinner->name}}</td>
              <td class="team">{{$cHomerunsWinner->team}}</td>
              <td class="test">{{$cHomerunsWinner->homeruns}}</td>
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
            @foreach ($cRbiWinners as $cRbiWinner)
            <tr>
              <td class="rank">{{$cRbiWinner->ranks}}</td>
              <td class="name">{{$cRbiWinner->name}}</td>
              <td class="team">{{$cRbiWinner->team}}</td>
              <td class="test">{{$cRbiWinner->rbi}}</td>
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
            @foreach ($cHitsWinners as $cHitsWinner)
            <tr>
              <td class="rank">{{$cHitsWinner->ranks}}</td>
              <td class="name">{{$cHitsWinner->name}}</td>
              <td class="team">{{$cHitsWinner->team}}</td>
              <td class="test">{{$cHitsWinner->hits}}</td>
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
            @foreach ($cStealsWinners as $cStealsWinner)
            <tr>
              <td class="rank">{{$cStealsWinner->ranks}}</td>
              <td class="name">{{$cStealsWinner->name}}</td>
              <td class="team">{{$cStealsWinner->team}}</td>
              <td class="test">{{$cStealsWinner->steals}}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div id="rankTableCentral">
        <div class="rankTable" id="pacific">
          <img src="storage/images/logos/Pacific.png" alt="" id="pacificLogo">
          <span>2024시즌 퍼시픽 리그 타자 순위</span>
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
            <img src="{{$pAverageWinners[0]->image}}" alt="" id="pacificBatterWinner">
          </div>
          <table class="personal-records-table" style="display: block" id="pacificAverageRank">
            <tr>
              <th class="rank">순위</th>
              <th class="name">이름</th>
              <th class="team">소속팀</th>
              <th class="test">타율</th>
            </tr>
            @foreach ($pAverageWinners as $pAverageWinner)
            <tr>
              <td class="rank">{{$pAverageWinner->ranks}}</td>
              <td class="name">{{$pAverageWinner->name}}</td>
              <td class="team">{{$pAverageWinner->team}}</td>
              <td class="test">{{$pAverageWinner->average}}</td>
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
            @foreach ($pHomerunsWinners as $pHomerunsWinner)
            <tr>
              <td class="rank">{{$pHomerunsWinner->ranks}}</td>
              <td class="name">{{$pHomerunsWinner->name}}</td>
              <td class="team">{{$pHomerunsWinner->team}}</td>
              <td class="test">{{$pHomerunsWinner->homeruns}}</td>
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
            @foreach ($pRbiWinners as $pRbiWinner)
            <tr>
              <td class="rank">{{$pRbiWinner->ranks}}</td>
              <td class="name">{{$pRbiWinner->name}}</td>
              <td class="team">{{$pRbiWinner->team}}</td>
              <td class="test">{{$pRbiWinner->rbi}}</td>
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
            @foreach ($pHitsWinners as $pHitsWinner)
            <tr>
              <td class="rank">{{$pHitsWinner->ranks}}</td>
              <td class="name">{{$pHitsWinner->name}}</td>
              <td class="team">{{$pHitsWinner->team}}</td>
              <td class="test">{{$pHitsWinner->hits}}</td>
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
            @foreach ($pStealsWinners as $pStealsWinner)
            <tr>
              <td class="rank">{{$pStealsWinner->ranks}}</td>
              <td class="name">{{$pStealsWinner->name}}</td>
              <td class="team">{{$pStealsWinner->team}}</td>
              <td class="test">{{$pStealsWinner->steals}}</td>
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
                  @foreach ($cTeams as $cTeam)
                      <a href="{{$cTeam->homepageLink}}">
                          <img src="storage/images/logos/{{$cTeam->team_id}}.svg" alt="꽥!" class="teamLogos">
                      </a>
                  @endforeach                    
              </div>
              <div id="pacificTeams">
                  @foreach ($pTeams as $pTeam)
                      @if ($pTeam->team_id == 'Fighters')
                          <a href="{{$pTeam->homepageLink}}">
                              <img src="storage/images/logos/{{$pTeam->team_id}}.png" alt="꽥!" class="teamLogos">
                          </a>
                      @else
                          <a href="{{$pTeam->homepageLink}}">
                              <img src="storage/images/logos/{{$pTeam->team_id}}.svg" alt="꽥!" class="teamLogos">
                          </a>
                      @endif
                  @endforeach
              </div>
          </div>
          <div>* 모든 선수 정보는 2024 시즌 기준입니다.</div><br>
          <div>* 아이디어 제공: 
            <a href="https://npb.jp/">▶ NPB 사이트</a>
          </div>
        </div>

  <script src="{{ asset('js/rankTable.js') }}"></script>
  <script src="{{ asset('js/logout.js') }}"></script>
  <script>
    /* 센트럴 투수 li 태그 선택 */
const centralEra = document.querySelector("#centralPitcher .era");
const centralWins = document.querySelector("#centralPitcher .wins");
const centralKs = document.querySelector("#centralPitcher .ks");
const centralSaves = document.querySelector("#centralPitcher .saves");
const centralHolds = document.querySelector("#centralPitcher .holds");

/* 센트럴 투수 이미지 선택 */
const centralPitcherImage = document.getElementById("centralPitcherWinner");

/* 센트럴 투수 테이블 선택 */
const centralEraRank = document.getElementById("centralEraRank");
const centralWinsRank = document.getElementById("centralWinsRank");
const centralKsRank = document.getElementById("centralKsRank");
const centralSavesRank = document.getElementById("centralSavesRank");
const centralHoldsRank = document.getElementById("centralHoldsRank");

centralEra.addEventListener("click", function () {
    centralPitcherImage.src = "{{$cEraWinners[0]->image}}";

    centralEraRank.style.display = "block";
    centralWinsRank.style.display = "none";
    centralKsRank.style.display = "none";
    centralSavesRank.style.display = "none";
    centralHoldsRank.style.display = "none";
});

centralWins.addEventListener("click", function () {
    centralPitcherImage.src = "{{$cWinsWinners[0]->image}}";

    centralEraRank.style.display = "none";
    centralWinsRank.style.display = "block";
    centralKsRank.style.display = "none";
    centralSavesRank.style.display = "none";
    centralHoldsRank.style.display = "none";
});

centralKs.addEventListener("click", function () {
    centralPitcherImage.src = "{{$cKsWinners[0]->image}}";

    centralEraRank.style.display = "none";
    centralWinsRank.style.display = "none";
    centralKsRank.style.display = "block";
    centralSavesRank.style.display = "none";
    centralHoldsRank.style.display = "none";
});

centralSaves.addEventListener("click", () => {
    centralPitcherImage.src = "{{$cSavesWinners[0]->image}}";
    centralEraRank.style.display = "none";
    centralWinsRank.style.display = "none";
    centralKsRank.style.display = "none";
    centralSavesRank.style.display = "block";
    centralHoldsRank.style.display = "none";
});

centralHolds.addEventListener("click", function () {
    centralPitcherImage.src = "{{$cHoldsWinners[0]->image}}";

    centralEraRank.style.display = "none";
    centralWinsRank.style.display = "none";
    centralKsRank.style.display = "none";
    centralSavesRank.style.display = "none";
    centralHoldsRank.style.display = "block";
});

/* ---------------------------------------------------------------------- */
/* 퍼시픽 투수 li 태그 선택 */
const pacificEra = document.querySelector("#pacificPitcher .era");
const pacificWins = document.querySelector("#pacificPitcher .wins");
const pacificKs = document.querySelector("#pacificPitcher .ks");
const pacificSaves = document.querySelector("#pacificPitcher .saves");
const pacificHolds = document.querySelector("#pacificPitcher .holds");

/* 퍼시픽 투수 이미지 선택 */
const pacificPitcherImage = document.getElementById("pacificPitcherWinner");

/* 퍼시픽 투수 테이블 선택 */
const pacificEraRank = document.getElementById("pacificEraRank");
const pacificWinsRank = document.getElementById("pacificWinsRank");
const pacificKsRank = document.getElementById("pacificKsRank");
const pacificSavesRank = document.getElementById("pacificSavesRank");
const pacificHoldsRank = document.getElementById("pacificHoldsRank");

pacificEra.addEventListener("click", function () {
    pacificPitcherImage.src = "{{$pEraWinners[0]->image}}";

    pacificEraRank.style.display = "block";
    pacificWinsRank.style.display = "none";
    pacificKsRank.style.display = "none";
    pacificSavesRank.style.display = "none";
    pacificHoldsRank.style.display = "none";
});

pacificWins.addEventListener("click", function () {
    pacificPitcherImage.src = "{{$pWinsWinners[0]->image}}";

    pacificEraRank.style.display = "none";
    pacificWinsRank.style.display = "block";
    pacificKsRank.style.display = "none";
    pacificSavesRank.style.display = "none";
    pacificHoldsRank.style.display = "none";
});

pacificKs.addEventListener("click", function () {
    pacificPitcherImage.src = "{{$pKsWinners[0]->image}}";

    pacificEraRank.style.display = "none";
    pacificWinsRank.style.display = "none";
    pacificKsRank.style.display = "block";
    pacificSavesRank.style.display = "none";
    pacificHoldsRank.style.display = "none";
});

pacificSaves.addEventListener("click", function () {
    pacificPitcherImage.src = "{{$pSavesWinners[0]->image}}";

    pacificEraRank.style.display = "none";
    pacificWinsRank.style.display = "none";
    pacificKsRank.style.display = "none";
    pacificSavesRank.style.display = "block";
    pacificHoldsRank.style.display = "none";
});

pacificHolds.addEventListener("click", function () {
    pacificPitcherImage.src = "{{$pHoldsWinners[0]->image}}";

    pacificEraRank.style.display = "none";
    pacificWinsRank.style.display = "none";
    pacificKsRank.style.display = "none";
    pacificSavesRank.style.display = "none";
    pacificHoldsRank.style.display = "block";
});

/* ---------------------------------------------------------------------- */

/* 센트럴 타자 li 태그 선택 */
const centralAverage = document.querySelector("#centralBatter .average");
const centralHomerun = document.querySelector("#centralBatter .homerun");
const centralRbi = document.querySelector("#centralBatter .rbi");
const centralHits = document.querySelector("#centralBatter .hits");
const centralSteals = document.querySelector("#centralBatter .steals");

/* 센트럴 타자 이미지 선택 */
const centralBatterImage = document.getElementById("centralBatterWinner");

/* 센트럴 타자 테이블 선택 */
const centralAverageRank = document.getElementById("centralAverageRank");
const centralHomerunRank = document.getElementById("centralHomerunRank");
const centralRbiRank = document.getElementById("centralRbiRank");
const centralHitsRank = document.getElementById("centralHitsRank");
const centralStealsRank = document.getElementById("centralStealsRank");

centralAverage.addEventListener("click", function () {
    centralBatterImage.src = "{{$cAverageWinners[0]->image}}";

    centralAverageRank.style.display = "block";
    centralHomerunRank.style.display = "none";
    centralRbiRank.style.display = "none";
    centralHitsRank.style.display = "none";
    centralStealsRank.style.display = "none";
});

centralHomerun.addEventListener("click", function () {
    centralBatterImage.src = "{{$cHomerunsWinners[0]->image}}";

    centralAverageRank.style.display = "none";
    centralHomerunRank.style.display = "block";
    centralRbiRank.style.display = "none";
    centralHitsRank.style.display = "none";
    centralStealsRank.style.display = "none";
});

centralRbi.addEventListener("click", function () {
    centralBatterImage.src = "{{$cRbiWinners[0]->image}}";

    centralAverageRank.style.display = "none";
    centralHomerunRank.style.display = "none";
    centralRbiRank.style.display = "block";
    centralHitsRank.style.display = "none";
    centralStealsRank.style.display = "none";
});

centralHits.addEventListener("click", function () {
    centralBatterImage.src = "{{$cHitsWinners[0]->image}}";

    centralAverageRank.style.display = "none";
    centralHomerunRank.style.display = "none";
    centralRbiRank.style.display = "none";
    centralHitsRank.style.display = "block";
    centralStealsRank.style.display = "none";
});

centralSteals.addEventListener("click", function () {
    centralBatterImage.src = "{{$cStealsWinners[0]->image}}";

    centralAverageRank.style.display = "none";
    centralHomerunRank.style.display = "none";
    centralRbiRank.style.display = "none";
    centralHitsRank.style.display = "none";
    centralStealsRank.style.display = "block";
});

/* ---------------------------------------------------------------------- */

/* 퍼시픽 타자 li 태그 선택 */
const pacificAverage = document.querySelector("#pacificBatter .average");
const pacificHomerun = document.querySelector("#pacificBatter .homerun");
const pacificRbi = document.querySelector("#pacificBatter .rbi");
const pacificHits = document.querySelector("#pacificBatter .hits");
const pacificSteals = document.querySelector("#pacificBatter .steals");

/* 퍼시픽 타자 이미지 선택 */
const pacificBatterImage = document.getElementById("pacificBatterWinner");

/* 퍼시픽 타자 테이블 선택 */
const pacificAverageRank = document.getElementById("pacificAverageRank");
const pacificHomerunRank = document.getElementById("pacificHomerunRank");
const pacificRbiRank = document.getElementById("pacificRbiRank");
const pacificHitsRank = document.getElementById("pacificHitsRank");
const pacificStealsRank = document.getElementById("pacificStealsRank");

pacificAverage.addEventListener("click", function () {
    pacificBatterImage.src = "{{$pAverageWinners[0]->image}}";

    pacificAverageRank.style.display = "block";
    pacificHomerunRank.style.display = "none";
    pacificRbiRank.style.display = "none";
    pacificHitsRank.style.display = "none";
    pacificStealsRank.style.display = "none";
});

pacificHomerun.addEventListener("click", function () {
    pacificBatterImage.src = "{{$pHomerunsWinners[0]->image}}";

    pacificAverageRank.style.display = "none";
    pacificHomerunRank.style.display = "block";
    pacificRbiRank.style.display = "none";
    pacificHitsRank.style.display = "none";
    pacificStealsRank.style.display = "none";
});

pacificRbi.addEventListener("click", function () {
    pacificBatterImage.src = "{{$pRbiWinners[0]->image}}";

    pacificAverageRank.style.display = "none";
    pacificHomerunRank.style.display = "none";
    pacificRbiRank.style.display = "block";
    pacificHitsRank.style.display = "none";
    pacificStealsRank.style.display = "none";
});

pacificHits.addEventListener("click", function () {
    pacificBatterImage.src = "{{$pHitsWinners[0]->image}}";

    pacificAverageRank.style.display = "none";
    pacificHomerunRank.style.display = "none";
    pacificRbiRank.style.display = "none";
    pacificHitsRank.style.display = "block";
    pacificStealsRank.style.display = "none";
});

pacificSteals.addEventListener("click", function () {
    pacificBatterImage.src = "{{$pStealsWinners[0]->image}}";

    pacificAverageRank.style.display = "none";
    pacificHomerunRank.style.display = "none";
    pacificRbiRank.style.display = "none";
    pacificHitsRank.style.display = "none";
    pacificStealsRank.style.display = "block";
});

  </script>
</body>
</html>