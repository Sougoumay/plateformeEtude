@extends('layouts.studentLayouts')
@section('student')
    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
        <div class="col-md-12">
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Code</th>
                    <th>Credit</th>
                    <th>Enseignant</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sujets as $sujet)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <a href="{{route('student.SubjectDetailsGet',$sujet->id)}}">{{$sujet->nom}}</a>
                        </td>
                        <td>{{$sujet->description}}</td>
                        <td>{{$sujet->code}}</td>
                        <td>{{$sujet->credit}}</td>
                        <td>
                            <a href="{{route('student.deleteSubject',$sujet->id)}}" class="btn btn-danger btn-xs">
                                Leave Subject
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        </section>
    </section>
@endsection
