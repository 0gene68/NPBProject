<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
        {{-- 비로그인 헤더 --}}
        <div id="header">
          <div id="mainLogo">
              <a href="/">
                  <img src="storage/images/logos/NPB_logo.svg.png" alt="" id="logoImage">
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
          </nav>
      </div>
  </div>

</body>
</html>