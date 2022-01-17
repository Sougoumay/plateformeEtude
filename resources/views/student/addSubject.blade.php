@extends('layouts.studentLayouts')
@section('student')
    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-lg-12">
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Code</th>
                            <th>Teacher</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sujets as $sujet)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$sujet->nom}}
                                </td>
                                <td>
                                    {{$sujet->description}}
                                </td>
                                <td>
                                    {{$sujet->code}}
                                </td>
                                <td>
                                    {{$sujet->userTeachers->nom}}
                                </td>
                                <td><a href="{{route('student.addSubject',$sujet->id)}}" class="btn btn-primary">Add to list</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /form-panel -->
                </div>
                <!-- /col-lg-12 -->
            </div>
        </section>
        <!-- /wrapper -->
    </section>
@endsection
