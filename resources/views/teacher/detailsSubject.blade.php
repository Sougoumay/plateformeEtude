@extends('layouts.teacherLayouts')
@section('teacher')
    <div id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-md-12">
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Descripton</th>
                            <th>Code</th>
                            <th>Credit</th>
                            <th>Date Creation</th>
                            <th>Date modification</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{$subjects->nom}}
                            </td>
                            <td>
                                {{$subjects->description}}
                            </td>
                            <td>
                                {{$subjects->code}}
                            </td>
                            <td>
                                {{$subjects->credit}}
                            </td>
                            <td>
                                {{$subjects->created_at}}
                            </td>
                            <td>
                                {{$subjects->updated_at}}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div>
                        <!-- <label><h5>Le nombre d'étudiants inscrits dans la matière : $students->count()}}</h5></label> -->
                    </div>
                    <div class="content-panel">
                        <h4>Les étudiats qui suivent la matière sont : </h4>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Prenom</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects->userStudents as $student)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$student->prenom}}
                                    </td>
                                    <td>{{$student->email}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="content-panel">
                        <a href="{{route('createTaskGet',$subjects->id)}}"><h3>Créer une nouvelle tache</h3></a>
                    </div>
                    <div class="row mt">
                        <div class="col-md-12">
                            <div class="content-panel">
                                <h4>La liste des questions liées au sujet</h4>
                                <hr>
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Descriptions</th>
                                        <th>Points</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects->tasks as $question)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                <a href="{{route('viewTask', $question->id)}}">
                                                    {{$question->nom}}
                                                </a>
                                            </td>
                                            <td>{{$question->description}}</td>
                                            <td>{{$question->points}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /content-panel -->
                        </div>
                        <!-- /col-md-12 -->
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
        </section>
    </div>
@endsection
