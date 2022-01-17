@extends('layouts.teacherLayouts')
@section('teacher')
    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Descrition</th>
                                <th>Code</th>
                                <th>Credit</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sujets as $sujet)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('detailsSubject', $sujet->id)}}">
                                            {{$sujet->nom}}
                                        </a>
                                    </td>
                                    <td>{{$sujet->description}}</td>
                                    <td>{{$sujet->code}}</td>
                                    <td>{{$sujet->credit}}</td>
                                    <td>
                                        <a href="{{route('updateSubjectGet', $sujet->id)}}" class="btn btn-primary btn-xs">
                                            Update
                                        </a>
                                        <a href="{{route('deleteSubject', $sujet->id)}}" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
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
        </section>
    </section>
@endsection
