<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolutionRequest;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserRequest;
use App\Models\Solution;
use App\Models\Subject;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Matiere extends Controller
{
    function createSubject(SubjectRequest $subjectRequest)
    {
        $data = $subjectRequest->validate([
            'nom'=>'string|required|min:3',
            'description'=>'text|required',
            'code'=>'string|required',
            'credit'=>'number|required'
        ]);
        Subject::create($data);
        return view('teacher/Accueil');
    }

    public function createSubjectGet()
    {
        return view('teacher/createSubject');
    }

    public function createUser(UserRequest $userRequest)
    {
        $data = $userRequest->validate([
            'nom'=>'string|required|min:3',
            'prenom'=>'string|required|min:3',
            'status'=>'string|required|min:7|max:7',
            'identifiant'=>'string|required|min:8|max:12',
            'email'=>'string|required',
            'password'=>Hash::make('password')
        ]);
        User::create($data);

        return back();
    }

    public function register()
    {
        return view('register');
    }

    public  function allSubject()
    {
        $sujets = Subject::all();

        return view('teacher/allSubject',compact('sujets'));
    }

    public function detailsSubject($id)
    {
        $subjects = Subject::find($id);
        $students = $subjects->users->whereStatus('teacher')->nom;
        $questions = Task::where('subject_id',$id)->get();
        return view('detailsSubject',compact('subjects', 'students','questions'));
    }

    public function updateSubjectGet($id)
    {
        $sujet = Subject::find($id);
        return view('teacher/updateSubject',compact('sujet'));
    }

    public function updateSubject(SubjectRequest $subjectRequest, $id)
    {
        $data = $subjectRequest->validate([
            'nom'=>'string|required|min:3',
            'description'=>'text|required',
            'code'=>'string|required',
            'credit'=>'number|required'
        ]);

        Subject::find($id)->update($data);
        return view('teacher/allSubject');
    }

    public function deleteSubject($id)
    {
        $sujet = Subject::find($id);
        $sujet->softDeletes();
        return view('teacher/allSubject');
    }

    public function createTaskGet($id)
    {
        $sujet = Subject::find($id);
        return view('teacher/createTask',compact('sujet'));
    }

    public function createTask(TaskRequest $taskRequest, Request $request, $id)
    {
        $tasks = $taskRequest->validate([
            'nom'=>'string|required|min:5',
            'description'=>'text|required',
            'points'=>'float'
            ]);

        Task::create([
            'nom'=>$taskRequest->get('nom'),
            'description'=>$taskRequest->get('description'),
            'points'=>$taskRequest->get('points'),
            'subject_id'=>$request->get($id)
        ]);
        // TODO la redirection est à revoir
        return view('teacher/Accueil');
    }

    public function viewTask($id)
    {
        $task = Task::find($id);
        //$solutionSoumise = $task->solutions->whereEvaluation('null');
        //$solutionEvalue = $task->solutions->where('Evaluation','!=','null');
        $solutionSoumise = $task->solutions->whereEvaluation('null');
        $solutionEvalue = $task->solutions->where('Evaluation','!=','null');
        $students = $solutionEvalue->with(['tasks'=>function($tache){
            $tache->with(['subject'=>function($sujets){
                $sujets->with(['users'=>function($etudiants){
                    $etudiants->whereStatus('Student')->get();
                }]);
            }]);
        }]);
        $etudiants = User::with(['subjects'=>function($sujets){
            $sujets->with(['tasks'=>function($tache){
                $tache->with(['$solutions'=>function($solutionSoumise){
                    $solutionSoumise;
                }]);
            }]);
        }]);
        // TODO comment faire pour retrouver les etudiants ayant soumis les olutions liées à une tache donnée
        // TODO c'est la réponse à la question 16
        // TODO la vue viewTask n'est pas encore terminé
        return view('teacher/viewTask',compact('task','solutionSoumise','solutionEvalue'));
    }

    public function updateTaskGet(TaskRequest $taskRequest, $id)
    {
        $tache = Task::find($id);
        return view('updateTask',compact('tache'));
    }

    public function updateTask(TaskRequest $taskRequest, $id)
    {
        Task::find($id)->update([
            'nom'=>$taskRequest->get('nom'),
            'description'=>$taskRequest->get('description'),
            'points'=>$taskRequest->get('points'),
        ]);
    }

    public function createSolutionGet($id)
    {
        $task = Task::find($id);
        return view('teacher/createSolution',compact('task'));
    }

   // ----------------------------------------------------------------------------------------------
    // Les fonctionnalités liées aux etudiants
    // ---------------------------------------------------------------------------------------------

    public function studentAccueil()
    {
        $sujets =Auth::user()->subjects->get();
        $teachers = $sujets->with('users')->whereStatus('teacher')->first();
        return view('student/accueil',compact('sujets','teachers'));
    }

    public function studentPrendreSujetGet()
    {
        // TODO la fonction n'est pas finalisé
        $oldSubject =Auth::user()->subjects->get();
        $oldSubjectId = [];
        $newSubject = Subject::all();
        $newSubjectNameId = [];
        foreach ($oldSubject->id as $id){
            $oldSubjectId[]=[$id];
        }
        foreach ($newSubject as $subject){
            $newSubjectNameId[] = ['id'=>$subject->id,
                'name'=>$subject->nom,
                'description'=>$subject->description,
                'code'=>$subject->code,
                'credit'=>$subject->credit
                ];
        }
        $newSubjectNameIdCollection = collect($newSubjectNameId);
        $nameIdSubjectToAdd = $newSubjectNameIdCollection->whereNotIn('id',$oldSubjectId);

        return view('student/addSubject',compact('id'));
    }

    public function studentDeleteSubject($id)
    {
        $sujet = Subject::find($id);
        $sujet->users->detach(Auth::id());
        $sujet->softDeletes();
        $sujets =Auth::user()->subjects->get();
        $teachers = $sujets->with('users')->whereStatus('teacher')->first();
        return view('student/accueil',compact('sujets','teachers'));
    }


}


