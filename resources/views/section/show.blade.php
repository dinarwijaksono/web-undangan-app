@extends('layouts.main')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Section</h1>
            <ol class="breadcrumb">
                <li><a href="/section"></i> Section</a></li>
                <li><a class="active"></i> show</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @livewire('section.box-show-section', ['sectionId' => $sectionId])

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit section</h3>
                </div>

                <div class="box-body">

                    <div class="form-group">
                        <label>Tag</label>
                        <section class="form-control">
                            <option value="">p</option>
                        </section>
                    </div>

                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control" placeholder="" />
                    </div>

                    <div class="form-group row">

                        <div class="col-xs-10"></div>

                        <div class="col-xs-2">
                            <button class="btn btn-block btn-primary">Kirim</button>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
