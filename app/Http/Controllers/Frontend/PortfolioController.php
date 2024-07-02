<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function viewPortfolio()
    {
        $this->data['firstGroupSkills'] = Skill::query()->where('status',Skill::STATUS['active'])->take(3)->get();
        $this->data['secondGroupSkills'] = Skill::query()->where('status',Skill::STATUS['active'])->skip(3)->take(3)->get();
        return view('frontend.portfolio',$this->data);
    }
}
