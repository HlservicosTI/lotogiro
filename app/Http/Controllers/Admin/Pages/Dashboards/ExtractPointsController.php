<?php

namespace App\Http\Controllers\Admin\Pages\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Qualifications;
use App\Models\UsersHasPoints;
use App\Models\UsersHasQualifications;
use Illuminate\Http\Request;

class ExtractPointsController extends Controller
{
    public function index(Request $request)
    {
        $balances = UsersHasPoints::getBalancesByUser(auth()->user());
        $points = UsersHasPoints::where('user_id', auth()->user()->id)->get();

        $qualificationAtived = UsersHasQualifications::getActivedByUser(auth()->user());
        $nextGoal = null;
        if ($qualificationAtived) {
            $nextGoal = Qualifications::getDiffNextGoal($qualificationAtived->getQualification(), $balances['personal_balance'], $balances['group_balance']);
        }

        return view('admin.pages.dashboards.points.index', compact('points', 'balances', 'qualificationAtived','nextGoal'));
    }
}
