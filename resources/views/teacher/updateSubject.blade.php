@extends('layouts.teacherLayouts')
@section('teacher')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Create a new subject</h3>
            <!-- BASIC FORM VALIDATION -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <form role="form" class="form-horizontal style-form" method="post" action="{{route('updateSubject',$sujet->id)}}">
                            @csrf
                            <div class="form-group has-success">
                                <label class="col-lg-2 control-label">Nom</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{$sujet->nom}}" name="nom" placeholder="" id="nom" class="form-control">
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label class="col-lg-2 control-label">Description</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{$sujet->description}}" name="description" placeholder="" id="description" class="form-control">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label class="col-lg-2 control-label">Code</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{$sujet->code}}" name="code" placeholder="" id="code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label class="col-lg-2 control-label">Credit</label>
                                <div class="col-lg-10">
                                    <input type="text" value="{{$sujet->credit}}" name="credit" placeholder="" id="credit" class="form-control">
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
