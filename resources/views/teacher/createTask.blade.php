@extends('layouts.teacherLayouts')
@section('teacher')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Create a new subject</h3>
            <!-- BASIC FORM VALIDATION -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form role="form" class="form-horizontal style-form" method="post" action="{{route('createTask',$sujet->id)}}">
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
                                <label class="col-lg-2 control-label">Nom</label>
                                <div class="col-lg-10">
                                    <input type="text" name="nom" placeholder="" id="nom" class="form-control">
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label class="col-lg-2 control-label">Description</label>
                                <div class="col-lg-10">
                                    <input type="text" name="description" placeholder="" id="description" class="form-control">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label class="col-lg-2 control-label">Points</label>
                                <div class="col-lg-10">
                                    <input type="text" name="points" placeholder="" id="code" class="form-control">
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
        <!-- /wrapper -->
    </section>
@endsection
