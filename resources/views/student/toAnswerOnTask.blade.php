@extends('layouts.studentLayouts')
@section('student')
    <div id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                    <th>Subject name</th>
                                    <th>Teacher name</th>
                                    <th>Questions</th>
                                    <th>Points</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{$subject->description}}
                                        </td>
                                        <td>{{$subject->userTeachers->nom}}</td>
                                        <td>
                                            {{$questions->description}}
                                        </td>
                                        <td>
                                            {{$questions->points}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <form role="form" class="form-horizontal style-form" method="post" action="{{route('student.answerOnTask',$questions->id)}}">
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
                                        <input type="text" name="solution" placeholder="" id="solution" class="form-control">
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
            </div>
        </section>
    </div>
@endsection
