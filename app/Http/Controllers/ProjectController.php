<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

//class ProjectController extends Controller
//{
//    public function index()
//    {
//        return view('ProjectList', ['projects' => Project::all()]);
//    }
//    public function create(Request $request)
//    {
//        return Project::create($request->all());
//    }
//}
class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return view('ProjectList', ['projects' => Project::all()]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $project = Project::create([
            'name' => $validatedData['name'],
            'date' => $validatedData['date'],
        ]);

        return response()->json([
            'message' => 'Project created successfully',
            'project' => $project
        ], 201);

//        $name = $_REQUEST['name'];
//       echo $name;
//        $date = $_REQUEST['date'];
//       echo $date;
//        return Project::create([ 'name' => $name, 'date' => $date]);
//        if ($name && $date) {
//            return Project::create([
//                'name' => $name,
//                'date' => $date
//            ]);
//        } else {
//            echo 'no data';die;
//    }
}
}
