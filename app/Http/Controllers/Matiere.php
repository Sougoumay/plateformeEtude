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
use Illuminate\Testing\Assert;

class Matiere extends Controller
{
    function teacherAccueil()
    {
        $sujets = Subject::where('teacher_id',\auth()->id())->get();
        return view('teacher.allSubject',compact('sujets'));
    }

    function createSubject(SubjectRequest $subjectRequest)
    {
        // TODO que fait la fonction user()
        $subjectRequest->user()->subjectTeachers()->create($subjectRequest->all());
        /*Subject::create($subjectRequest->all()); Cette ligne de code ne permet de créer un sujet
        parcequ'on id du teacher qui la crée */
        return  redirect()->route('allSubject');
    }

    public function createSubjectGet()
    {
        return view('teacher.createSubject');
    }

    public function createUser(UserRequest $userRequest)
    {
        User::create($userRequest->all());

        return back();
    }

    public function register()
    {
        return view('register');
    }

    public  function allSubject()
    {
        return redirect()->route('teacher.accueil');
    }

    public function detailsSubject($id)
    {
        //$subjects = Subject::find($id);
        $subjects = Subject::with('userStudents','tasks')->find($id);
        //dd($subjects);
        /*$students = $subjects->userStudents()->whereStatus('student')->get(); Avec cette ligne de code on peut tirer les etudiants
        liées au sujet mais ca rend le code moins performant en ayant recours à plus de query*/
        //dd($students);
        return view('teacher.detailsSubject',compact('subjects'));
    }

    public function updateSubjectGet($id)
    {
        $sujet = Subject::find($id);
        return view('teacher.updateSubject',compact('sujet'));
    }

    public function updateSubject(SubjectRequest $subjectRequest, $id)
    {
        Subject::find($id)->update($subjectRequest->all());
        return redirect()->route('allSubject');
    }

    public function deleteSubject($id)
    {
        $sujet = Subject::find($id);
        $sujet->delete();
        return redirect()->route('allSubject');
    }

    public function createTaskGet($id)
    {
        $sujet = Subject::find($id);
        return view('teacher/createTask',compact('sujet'));
    }

    public function createTask(TaskRequest $taskRequest, $id)
    {
        $sujet = Subject::find($id);
        $sujet->tasks()->create($taskRequest->all());
        //Task::create($taskRequest->all());
        // TODO la redirection est à revoir
        return redirect()->route('detailsSubject', $id);
    }

    public function viewTask($id)
    {
        $task = Task::with('solutions')->find($id);
        //$solutionEvalue = $task->solutions->where('Evaluation','!=','null');
        return view('teacher.viewTask',compact('task'));
    }

    public function updateTaskGet($id)
    {
        $tache = Task::find($id);
        return view('teacher.updateTask',compact('tache'));
    }

    public function updateTask(TaskRequest $taskRequest, $id)
    {
        Task::find($id)->update($taskRequest->all());
        return redirect()->route('viewTask',$id);
    }

    public function createSolutionGet($id)
    {
        $task = Task::find($id);
        return view('teacher.createSolution',compact('task'));
    }

    public function evaluateSolutionGet($id)
    {
        $sol = Solution::with('tasks','students')->find($id);
        $task = Task::with('subjects','solutions')->find($sol->task_id);
        return view('teacher.evaluateSolution',compact('sol','task'));
    }

    public function evaluateSolution(SolutionRequest $solutionRequest, $id)
    {
        $solutions = Solution::find($id);
        $solutions->update([
            'evaluation'=>$solutionRequest->get('evaluation'),
            'evaluated_at'=>now()
        ]);

        return redirect()->route('viewTask',$solutions->task_id);
    }

   // ----------------------------------------------------------------------------------------------
    // Les fonctionnalités liées aux etudiants
    // ---------------------------------------------------------------------------------------------

    public function studentAccueil()
    {
        $sujets =Auth::user()->subjectStudents()->get();
        $teachers = 'Adoum';
        return view('student.accueil',compact('sujets','teachers'));
    }

    public function studentPrendreSujetGet()
    {
        $sujets = Subject::with('userTeachers')
            ->whereDoesntHave('userStudents',function($key){
            $key->where('student_id',auth()->id());
        })->get();
        return view('student.addSubject',compact('sujets'));
    }

    public function addSubject($id)
    {
        Subject::find($id)->userStudents()->attach(auth()->id());
        return redirect()->route('student.accueil');
    }

    public function studentDeleteSubject($id)
    {
        Auth::user()->subjectStudents()->detach($id);
        return redirect()->route('student.accueil');
    }

    public function studentSubjectDetailsGet($id)
    {
        $questions = Task::with('subjects','solutions')->where('subject_id',$id)->get();

        //dd($questions);
        //$solutionSoumise = $questions->solutions;
        //dd($solutionSoumise);
        $subjects = Subject::with('userTeachers', 'userStudents', 'tasks')->find($id);
        //foreach ($subjects->tasks as $task){
            //dd($task->solutions->where('student_id',\auth()->id())->first()->exists());
            //dd($task->solutions->count());
       //}
        $questions = Task::with('subjects','solutions')->find($id);
        //dd($questions->solutions->count());
        //$solutionSoumise = $questions->solutions->where('task_id',$id)->count();
        //dd($questions);
        return view('student.detailsSubject',compact('subjects'));
    }

    public function studentAnswerOnTaskGet($id)
    {
        $questions = Task::with('subjects','solutions')->find($id);
        //dd($solutionSoumise = $questions->solutions->where('task_id',$id)->count());
        $subject = Subject::with('userTeachers')->find($questions->subject_id);
        $teacher = $subject->userTeachers->nom;
        //dd($teacher);
        //dd($subject);
        return view('student.toAnswerOnTask',compact('questions','subject', 'teacher'));
    }

    public function studentAnswerOnTask(SolutionRequest $solutionRequest, $id)
    {
        Solution::create([
            'solution'=>$solutionRequest->get('solution'),
            'student_id'=>auth()->id(),
            'task_id' => $id
        ]);

        return redirect()->route('student.AnswerOnTaskGet',$id);
    }


}


