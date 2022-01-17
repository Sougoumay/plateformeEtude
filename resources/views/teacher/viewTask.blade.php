@extends('layouts.teacherLayouts')
@section('teacher')
    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-lg-12">
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Descripton</th>
                            <th>Point</th>
                            <th>Solutions soumises</th>
                            <th>Solutions évaluées</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{$task->nom}}
                            </td>
                            <td>
                                {{$task->description}}
                            </td>
                            <td>
                                {{$task->points}}
                            </td>
                            <td>
                                {{$task->solutions->count()}}
                            </td>
                            <td>
                                {{$task->solutions->where('evaluation','!=',null)->count()}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('updateTaskGet',$task->id)}}">Update</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Points</th>
                            <th>Date d'evaluation</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($task->solutions as $sol)
                            <tr>
                                <td>
                                    {{$sol->created_at}}
                                </td>
                                <td>
                                    {{$sol->students->nom}}
                                </td>
                                <td>
                                    {{$sol->students->email}}
                                </td>
                                <td>
                                    {{$sol->evaluation}}
                                </td>
                                <td>
                                    {{$sol->evaluated_at}}
                                </td>
                                @if($sol->evaluated_at==NULL)
                                    <td><a class="btn btn-primary" href="{{route('evaluateSolutionGet',$sol->id)}}">Evaluer</a></td>
                                @else
                                    <td>Evalué</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
        <!-- /col-lg-12 -->
            </div>
        </section>
    </section>
@endsection
