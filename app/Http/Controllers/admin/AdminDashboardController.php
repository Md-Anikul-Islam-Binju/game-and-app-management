<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Project;
use App\Models\ProjectFile;
use App\Models\Showcase;
use App\Models\Team;
use App\Models\Training;
use App\Models\Venue;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
       $totalNews = News::count();
       $totalProject = Project::count();
       $totalTeamMember = Team::count();
       $totalShowcase = Showcase::count();
       $venue = Venue::count();
       $totalApp = ProjectFile::where('category_id',1)->count();
       $totalWebsite = ProjectFile::where('category_id',2)->count();
       $totalProjectFile = ProjectFile::count();
       $totalTraining = Training::count();
       $data =  [
                    'labels' => ['App', 'Project', 'Website', 'Training', 'Venue'],
                    'value' => [$totalNews, $totalProjectFile, $totalWebsite, $totalTraining, $venue],
                ];
       return view('admin.dashboard', compact('data', 'totalNews',
            'totalProject','totalTeamMember',
            'totalShowcase','venue','totalApp',
            'totalWebsite','totalProjectFile','totalTraining'));
    }

    public function unauthorized()
    {
        return view('admin.unauthorized');
    }





}
