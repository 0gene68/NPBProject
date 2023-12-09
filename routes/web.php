<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
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
        return view('logged_in.welcome_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);   
    } else {
        return view('non_logged_in.welcome_non_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);   
    }
});

Route::get('/teams', function() {
    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();

    if(Auth::check()) {
        return view('logged_in.teams_logged_in', ['centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    } else {
        return view('non_logged_in.teams_non_logged_in', ['centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);
    }
});

Route::get('/rank', function() {
    $teams = Team::all();
    $centralTeams = Team::where('league', 'central')->orderBy('rank_2023')->get();
    $pacificTeams = Team::where('league', 'pacific')->orderBy('rank_2023')->get();

    if(Auth::check()) {
        return view('logged_in.welcome_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);   
    } else {
        return view('non_logged_in.rank_non_logged_in', ['teams'=>$teams, 'centralTeams'=>$centralTeams, 'pacificTeams'=>$pacificTeams]);   
    }
});


Route::get('/{team_id}', function(string $team_id) {
    $selectedTeam = Team::where('team_id', $team_id)->first();
    
    $pitchers = DB::select("SELECT * FROM $team_id WHERE position = '투수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $catchers = DB::select("SELECT * FROM $team_id WHERE position = '포수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $infielders = DB::select("SELECT * FROM $team_id WHERE position = '내야수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $outfielders = DB::select("SELECT * FROM $team_id WHERE position = '외야수' AND nurture <> true ORDER BY CAST(backNumber AS UNSIGNED)");
    $nurtures = DB::select("SELECT * FROM $team_id WHERE nurture = true ORDER BY CAST(backNumber AS UNSIGNED)");

    $championYears = Team::where('team_id', $team_id)->first()->championYears()->get();

    if(Auth::check()) {
        return view('logged_in.team_logged_in', ['team_id'=>$team_id, 'selectedTeam'=>$selectedTeam, 'pitchers'=>$pitchers, 'catchers'=>$catchers, 'infielders'=>$infielders, 'outfielders'=>$outfielders, 'nurtures'=>$nurtures, 'championYears'=>$championYears]);
    } else {
        return view('non_logged_in.team_non_logged_in', ['team_id'=>$team_id, 'selectedTeam'=>$selectedTeam, 'pitchers'=>$pitchers, 'catchers'=>$catchers, 'infielders'=>$infielders, 'outfielders'=>$outfielders, 'nurtures'=>$nurtures, 'championYears'=>$championYears]);
    }
});


Route::resource('comments', CommentsController::class);

