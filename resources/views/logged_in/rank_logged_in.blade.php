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
    {{-- 2023시즌 팀 순위표 --}}
    <div id="table-container">
      <div id="rankTableCentral" data-variable="{{$centralTeams}}"></div>
      <div id="rankTablePacific" data-variable="{{$pacificTeams}}"></div>  
    </div>
    <script src="{{ asset('js/rankTable.js') }}"></script>

</body>
</html>