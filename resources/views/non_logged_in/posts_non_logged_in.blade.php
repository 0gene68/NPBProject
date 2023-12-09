<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/board.css') }}">
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
        <a href="/">
          <li>N/A</li>
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
  <div id="board_container">
    <h1>게시판</h1>
    <span>좋아하는 팀을 응원해보세요!</span>
      <div id="post-container">
        <select name="team" id="select">
          <option selected>팀을 선택하세요</option>
          <option name="한신">한신 타이거즈</option>
          <option name="오릭스">오릭스 버팔로즈</option>
          <option name="히로시마">히로시마 도요 카프</option>
          <option name="롯데">치바 롯데 마린즈</option>
          <option name="DeNA">요코하마 DeNA 베이스타즈</option>
          <option name="소프트뱅크">후쿠오카 소프트뱅크 호크스</option>
          <option name="요미우리">요미우리 자이언츠</option>
          <option name="라쿠텐">도호쿠 라쿠텐 골든이글스</option>
          <option name="야쿠르트">도쿄 야쿠르트 스왈로즈</option>
          <option name="세이부">사이타마 세이부 라이온즈</option>
          <option name="주니치">주니치 드래곤즈</option>
          <option name="닛폰햄">홋카이도 닛폰햄 파이터즈</option>
        </select>
        <div id="post_title">
          <span class="number"></span>
          <span class="team">응원팀</span>
          <span class="title">제목</span>
          <span class="writer">작성자</span>
          <span class="created_at">작성일자</span>
        </div>
        <div class="post">
          <span class="number">1</span>
          <span class="team">응원팀</span>
          <span class="title">제목</span>
          <span class="writer">작성자</span>
          <span class="created_at">작성일자</span>
        </div>
        <div class="post">        
          <span class="number">2</span>  
          <span class="team">응원팀</span>
          <span class="title">제목</span>
          <span class="writer">작성자</span>
          <span class="created_at">작성일자</span>
        </div>
        <div class="post">       
          <span class="number">3</span>   
          <span class="team">응원팀</span>
          <span class="title">제목</span>
          <span class="writer">작성자</span>
          <span class="created_at">작성일자</span>
        </div>
        <br>
        <div style="display: none" id="isLoggedIn">{{$isLoggedIn}}</div>
        <a href="/create_post" id="create_post_link">
          <button id="create_post_button">글 작성</button>
        </a>
    </div>
  </div>
  <div id="footer" style="color: white"></div>

  <script src="{{ asset('js/board.js') }}"></script>
</body>
</html>