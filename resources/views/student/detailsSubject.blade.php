@extends('layouts.studentLayouts')
@section('student')
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
                            <th>Teacher</th>
                            <th>Teacher's Email</th>
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
                            <td>
                                {{$subjects->userTeachers->nom}}
                            </td>
                            <td>
                                {{$subjects->userTeachers->email}}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div>
                        <label><h5>Le nombre d'étudiants inscrits dans la matière : {{$subjects->userStudents()->count()}}</h5></label>
                    </div>
                    <div class="content-panel">
                        <h4>Les étudiats qui suivent la matière sont : </h4>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
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
                                        {{$student->nom}}
                                    </td>
                                    <td>{{$student->email}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                                        <th>Descriptions</th>
                                        <th>Points</th>
                                        <th>Soumise</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subjects->tasks as $question)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                @if($question->solutions->where('student_id',auth()->id())->count()>0)
                                                    {{$question->description}}
                                                @else
                                                    <a href="{{route('student.AnswerOnTaskGet', $question->id)}}">
                                                        {{$question->description}}
                                                    </a>
                                                @endif

                                            </td>
                                            <td>{{$question->points}}</td>
                                            <td>
                                                @if($question->solutions->where('student_id',auth()->id())->count()>0)
                                                    Oui
                                                @else
                                                    Non
                                                @endif
                                            </td>
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
