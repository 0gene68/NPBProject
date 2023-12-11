<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/post.css') }}">
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
    <div id="create_post_container">
        <h1>게시글 작성</h1>
        <form action="/post" method="post">
            @csrf
            <label for="title">제목</label>
            <input type="text" name="title" id="title" autocomplete="off"><br><br>
            <label for="team">응원팀</label>
            <select name="team" id="select">
                <option selected>팀을 선택하세요</option>
                <option value="한신">한신 타이거스</option>
                <option value="오릭스">오릭스 버팔로즈</option>
                <option value="히로시마">히로시마 도요 카프</option>
                <option value="롯데">치바 롯데 마린즈</option>
                <option value="DeNA">요코하마 DeNA 베이스타즈</option>
                <option value="소프트뱅크">후쿠오카 소프트뱅크 호크스</option>
                <option value="요미우리">요미우리 자이언츠</option>
                <option value="라쿠텐">도호쿠 라쿠텐 골든이글스</option>
                <option value="야쿠르트">도쿄 야쿠르트 스왈로즈</option>
                <option value="세이부">사이타마 세이부 라이온즈</option>
                <option value="주니치">주니치 드래곤즈</option>
                <option value="닛폰햄">홋카이도 닛폰햄 파이터즈</option>
              </select><br><br>
              <textarea name="content" id="content" autocomplete="off" cols="30" rows="10"></textarea><br><br>
              <input type="submit" value="등록" id="submit_button">
        </form>
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