<?php
namespace App\View\Composers;

use App\Models\League;
use Illuminate\View\View;

class LeagueViewComposer
{
    public function compose(View $view)
    {
        $leagues = League::orderBy('id')->get();

        $view->with('leagues', $leagues);
    }
}