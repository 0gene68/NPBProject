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
    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();

    if(Auth::check()) {
        $user = Auth::user();
        return view('logged_in.welcome_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams, 'user'=>$user]);   
    } else {
        return view('non_logged_in.welcome_non_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);   
    }
});

Route::get('/league', function() {
    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();

    if(Auth::check()) {
        $user = Auth::user();

        return view('logged_in.league_logged_in', ['user'=>$user, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    } else {
        return view('non_logged_in.league_non_logged_in', ['centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    }
});

Route::get('/rank', function() {
    $teams = Team::all();

    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();

    $centralEraWinners = DB::select('SELECT * FROM eras WHERE league = "central" ORDER BY ranks');
    $pacificEraWinners = DB::select('SELECT * FROM eras WHERE league = "pacific" ORDER BY ranks');

    $centralWinsWinners = DB::select('SELECT * FROM wins WHERE league = "central" ORDER BY ranks');
    $pacificWinsWinners = DB::select('SELECT * FROM wins WHERE league = "pacific" ORDER BY ranks');

    $centralKsWinners = DB::select('SELECT * FROM ks WHERE league = "central" ORDER BY ranks');
    $pacificKsWinners = DB::select('SELECT * FROM ks WHERE league = "pacific" ORDER BY ranks');

    $centralSavesWinners = DB::select('SELECT * FROM saves WHERE league = "central" ORDER BY ranks');
    $pacificSavesWinners = DB::select('SELECT * FROM saves WHERE league = "pacific" ORDER BY ranks');

    $centralHoldsWinners = DB::select('SELECT * FROM holds WHERE league = "central" ORDER BY ranks');
    $pacificHoldsWinners = DB::select('SELECT * FROM holds WHERE league = "pacific" ORDER BY ranks');

    $centralAverageWinners = DB::select('SELECT * FROM average WHERE league = "central" ORDER BY ranks');
    $pacificAverageWinners = DB::select('SELECT * FROM average WHERE league = "pacific" ORDER BY ranks');

    $centralHomerunsWinners = DB::select('SELECT * FROM homeruns WHERE league = "central" ORDER BY ranks');
    $pacificHomerunsWinners = DB::select('SELECT * FROM homeruns WHERE league = "pacific" ORDER BY ranks');

    $centralRbiWinners = DB::select('SELECT * FROM rbi WHERE league = "central" ORDER BY ranks');
    $pacificRbiWinners = DB::select('SELECT * FROM rbi WHERE league = "pacific" ORDER BY ranks');

    $centralHitsWinners = DB::select('SELECT * FROM hits WHERE league = "central" ORDER BY ranks');
    $pacificHitsWinners = DB::select('SELECT * FROM hits WHERE league = "pacific" ORDER BY ranks');

    $centralStealsWinners = DB::select('SELECT * FROM steals WHERE league = "central" ORDER BY ranks');
    $pacificStealsWinners = DB::select('SELECT * FROM steals WHERE league = "pacific" ORDER BY ranks');


    if(Auth::check()) {
        $user = Auth::user();
        return view('logged_in.rank_logged_in', 
            [
                'teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams, 'user'=>$user,
                'centralEraWinners'=>$centralEraWinners, 'pacificEraWinners'=>$pacificEraWinners,
                'centralWinsWinners'=>$centralWinsWinners, 'pacificWinsWinners'=>$pacificWinsWinners,
                'centralKsWinners'=>$centralKsWinners, 'pacificKsWinners'=>$pacificKsWinners,
                'centralSavesWinners'=>$centralSavesWinners, 'pacificSavesWinners'=>$pacificSavesWinners,
                'centralHoldsWinners'=>$centralHoldsWinners, 'pacificHoldsWinners'=>$pacificHoldsWinners,
                'centralAverageWinners'=>$centralAverageWinners, 'pacificAverageWinners'=>$pacificAverageWinners,
                'centralHomerunsWinners'=>$centralHomerunsWinners, 'pacificHomerunsWinners'=>$pacificHomerunsWinners,
                'centralRbiWinners'=>$centralRbiWinners, 'pacificRbiWinners'=>$pacificRbiWinners,
                'centralHitsWinners'=>$centralHitsWinners, 'pacificHitsWinners'=>$pacificHitsWinners,
                'centralStealsWinners'=>$centralStealsWinners, 'pacificStealsWinners'=>$pacificStealsWinners
            ]);   
    } else {
        return view('non_logged_in.rank_non_logged_in',             
        [
            'teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams,
            'centralEraWinners'=>$centralEraWinners, 'pacificEraWinners'=>$pacificEraWinners,
            'centralWinsWinners'=>$centralWinsWinners, 'pacificWinsWinners'=>$pacificWinsWinners,
            'centralKsWinners'=>$centralKsWinners, 'pacificKsWinners'=>$pacificKsWinners,
            'centralSavesWinners'=>$centralSavesWinners, 'pacificSavesWinners'=>$pacificSavesWinners,
            'centralHoldsWinners'=>$centralHoldsWinners, 'pacificHoldsWinners'=>$pacificHoldsWinners,
            'centralAverageWinners'=>$centralAverageWinners, 'pacificAverageWinners'=>$pacificAverageWinners,
            'centralHomerunsWinners'=>$centralHomerunsWinners, 'pacificHomerunsWinners'=>$pacificHomerunsWinners,
            'centralRbiWinners'=>$centralRbiWinners, 'pacificRbiWinners'=>$pacificRbiWinners,
            'centralHitsWinners'=>$centralHitsWinners, 'pacificHitsWinners'=>$pacificHitsWinners,
            'centralStealsWinners'=>$centralStealsWinners, 'pacificStealsWinners'=>$pacificStealsWinners
        ]);   
    }
});


Route::get('/teams', function() {
    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();

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

    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();

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

    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();


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

    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();


    if(Auth::check()) {
        $user = Auth::user();
        return view('logged_in.team_logged_in', ['team_id'=>$team_id, 'selectedTeam'=>$selectedTeam, 'pitchers'=>$pitchers, 'catchers'=>$catchers, 'infielders'=>$infielders, 'outfielders'=>$outfielders, 'nurtures'=>$nurtures, 'championYears'=>$championYears, 'user'=>$user, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    } else {
        return view('non_logged_in.team_non_logged_in', ['team_id'=>$team_id, 'selectedTeam'=>$selectedTeam, 'pitchers'=>$pitchers, 'catchers'=>$catchers, 'infielders'=>$infielders, 'outfielders'=>$outfielders, 'nurtures'=>$nurtures, 'championYears'=>$championYears, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    }
})->where('team_id', 'Tigers|Buffaloes|Carp|Marines|Baystars|Hawks|Giants|Eagles|Swallows|Lions|Dragons|Fighters');




