<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    $teams = Team::all();
    $centralTeams = Team::where('league', 'central')->orderBy('current_rank')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('current_rank')->get();

    if(Auth::check()) {
        $user = Auth::user();
        return view('logged_in.welcome_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams, 'user'=>$user]);   
    } else {
        return view('non_logged_in.welcome_non_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);   
    }
});

Route::get('/league', function() {
    $centralTeams = Team::where('league', 'central')->orderBy('current_rank')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('current_rank')->get();

    if(Auth::check()) {
        $user = Auth::user();

        return view('logged_in.league_logged_in', ['user'=>$user, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    } else {
        return view('non_logged_in.league_non_logged_in', ['centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    }
});

Route::get('/rank', function() {
    $isLoggedIn = Auth::check();
    $user = Auth::user();
    $teams = Team::all();

    $cTeams = Team::where('league', 'central')->orderBy('current_rank')->get();
    $pTeams = Team::where('league', 'pacific')->orderBy('current_rank')->get();

    /* 평균자책점 */
    $cEraWinners = DB::select('SELECT * FROM eras WHERE league = "central" ORDER BY ranks');
    $pEraWinners = DB::select('SELECT * FROM eras WHERE league = "pacific" ORDER BY ranks');

    /* 다승 */
    $cWinsWinners = DB::select('SELECT * FROM wins WHERE league = "central" ORDER BY ranks');
    $pWinsWinners = DB::select('SELECT * FROM wins WHERE league = "pacific" ORDER BY ranks');

    /* 탈삼진 */
    $cKsWinners = DB::select('SELECT * FROM ks WHERE league = "central" ORDER BY ranks');
    $pKsWinners = DB::select('SELECT * FROM ks WHERE league = "pacific" ORDER BY ranks');

    /* 세이브 */
    $cSavesWinners = DB::select('SELECT * FROM saves WHERE league = "central" ORDER BY ranks');
    $pSavesWinners = DB::select('SELECT * FROM saves WHERE league = "pacific" ORDER BY ranks');

    /* 홀드 */
    $cHoldsWinners = DB::select('SELECT * FROM holds WHERE league = "central" ORDER BY ranks');
    $pHoldsWinners = DB::select('SELECT * FROM holds WHERE league = "pacific" ORDER BY ranks');

    /* 타율 */
    $cAverageWinners = DB::select('SELECT * FROM average WHERE league = "central" ORDER BY ranks');
    $pAverageWinners = DB::select('SELECT * FROM average WHERE league = "pacific" ORDER BY ranks');

    /* 홈런 */
    $cHomerunsWinners = DB::select('SELECT * FROM homeruns WHERE league = "central" ORDER BY ranks');
    $pHomerunsWinners = DB::select('SELECT * FROM homeruns WHERE league = "pacific" ORDER BY ranks');

    /* 타점 */
    $cRbiWinners = DB::select('SELECT * FROM rbi WHERE league = "central" ORDER BY ranks');
    $pRbiWinners = DB::select('SELECT * FROM rbi WHERE league = "pacific" ORDER BY ranks');

    /* 안타 */
    $cHitsWinners = DB::select('SELECT * FROM hits WHERE league = "central" ORDER BY ranks');
    $pHitsWinners = DB::select('SELECT * FROM hits WHERE league = "pacific" ORDER BY ranks');

    /* 도루 */
    $cStealsWinners = DB::select('SELECT * FROM steals WHERE league = "central" ORDER BY ranks');
    $pStealsWinners = DB::select('SELECT * FROM steals WHERE league = "pacific" ORDER BY ranks');


    return
    view('logged_in.rank_logged_in', 
    [
        'isLoggedIn'=>$isLoggedIn, 'teams'=>$teams, 'cTeams'=>$cTeams, 'pTeams'=>$pTeams, 'user'=>$user,
        'cEraWinners'=>$cEraWinners, 'pEraWinners'=>$pEraWinners,
        'cWinsWinners'=>$cWinsWinners, 'pWinsWinners'=>$pWinsWinners,
        'cKsWinners'=>$cKsWinners, 'pKsWinners'=>$pKsWinners,
        'cSavesWinners'=>$cSavesWinners, 'pSavesWinners'=>$pSavesWinners,
        'cHoldsWinners'=>$cHoldsWinners, 'pHoldsWinners'=>$pHoldsWinners,
        'cAverageWinners'=>$cAverageWinners, 'pAverageWinners'=>$pAverageWinners,
        'cHomerunsWinners'=>$cHomerunsWinners, 'pHomerunsWinners'=>$pHomerunsWinners,
        'cRbiWinners'=>$cRbiWinners, 'pRbiWinners'=>$pRbiWinners,
        'cHitsWinners'=>$cHitsWinners, 'pHitsWinners'=>$pHitsWinners,
        'cStealsWinners'=>$cStealsWinners, 'pStealsWinners'=>$pStealsWinners,
    ]);  
});


Route::get('/teams', function() {
    $centralTeams = Team::where('league', 'central')->orderBy('current_rank')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('current_rank')->get();

    if(Auth::check()) {
        $user = Auth::user();
        return view('logged_in.teams_logged_in', ['centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams, 'user'=>$user]);
    } else {
        return view('non_logged_in.teams_non_logged_in', ['centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    }
});


Route::get('/board', function() {
    $isLoggedIn = null;

    $posts = DB::select("SELECT * FROM posts ORDER BY id DESC");

    $centralTeams = Team::where('league', 'central')->orderBy('current_rank')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('current_rank')->get();

    if(Auth::check()) {
        $user = Auth::user();
        $isLoggedIn = "true";
        return view('logged_in.board_logged_in', ['isLoggedIn'=>$isLoggedIn, 'posts'=>$posts, 'user'=>$user, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    } else {
        $isLoggedIn = "false";
        return view('non_logged_in.board_non_logged_in', ['isLoggedIn'=>$isLoggedIn, 'posts'=>$posts, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    }
});

Route::get('/create_post', function() {
    $user = Auth::user();

    $centralTeams = Team::where('league', 'central')->orderBy('current_rank')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('current_rank')->get();


    return view('logged_in.create_post_logged_in', ['user'=>$user, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
});

Route::post('/post', function(Request $request) {
    $user = Auth::user();
    
    $title = $request->input('title');
    $team = $request->input('team');
    $content = $request->input('content');

    $post = new Post();
    $post->title = $title;
    $post->user_name = $user->name;
    $post->team = $team;
    $post->content = $content;
    $post->save();

    return redirect('/board')->with('success', '포스트가 등록되었습니다.');;
});

Route::put('/posts/{id}', function(Request $request, $id) {
    $post = Post::find($id);

    $title = $request->input('title');
    $team = $request->input('team');
    $content = $request->input('content');

    $post->title = $title;
    $post->team = $team;
    $post->content = $content;
    $post->save();
    
    return redirect('/board')->with('success', '포스트가 수정되었습니다.');
});

Route::delete('/posts/{id}', function($id) {
    $post = Post::find($id);
    $post->delete();

    return redirect('/board');
});


Route::get('/{team_id}', function(string $team_id) {
    $selectedTeam = Team::where('team_id', $team_id)->first();
    
    $pitchers = DB::select("SELECT * FROM $team_id WHERE position = '투수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $catchers = DB::select("SELECT * FROM $team_id WHERE position = '포수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $infielders = DB::select("SELECT * FROM $team_id WHERE position = '내야수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $outfielders = DB::select("SELECT * FROM $team_id WHERE position = '외야수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $nurtures = DB::select("SELECT * FROM $team_id WHERE nurture = true ORDER BY CAST(backNumber AS UNSIGNED)");

    $championYears = Team::where('team_id', $team_id)->first()->championYears()->get();

    $centralTeams = Team::where('league', 'central')->orderBy('current_rank')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('current_rank')->get();


    if(Auth::check()) {
        $user = Auth::user();
        return view('logged_in.team_logged_in', ['team_id'=>$team_id, 'selectedTeam'=>$selectedTeam, 'pitchers'=>$pitchers, 'catchers'=>$catchers, 'infielders'=>$infielders, 'outfielders'=>$outfielders, 'nurtures'=>$nurtures, 'championYears'=>$championYears, 'user'=>$user, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    } else {
        return view('non_logged_in.team_non_logged_in', ['team_id'=>$team_id, 'selectedTeam'=>$selectedTeam, 'pitchers'=>$pitchers, 'catchers'=>$catchers, 'infielders'=>$infielders, 'outfielders'=>$outfielders, 'nurtures'=>$nurtures, 'championYears'=>$championYears, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    }
})->where('team_id', 'Tigers|Buffaloes|Carp|Marines|Baystars|Hawks|Giants|Eagles|Swallows|Lions|Dragons|Fighters');




