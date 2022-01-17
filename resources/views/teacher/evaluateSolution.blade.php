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

                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('updateTaskGet',$task->id)}}">Update</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /col-lg-12 -->
            </div>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form role="form" class="form-horizontal style-form" method="post" action="{{route('evaluateSolution',$sol->id)}}">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group has-success">
                                <label class="col-lg-2 control-label">Solution</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{$sol->solution}}" name="solution" placeholder="" id="solution" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label class="col-lg-2 control-label">Evaluation</label>
                                <div class="col-lg-10">
                                    <input type="number" name="evaluation" placeholder="" id="evaluation" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
        </section>
    </section>
@endsection
