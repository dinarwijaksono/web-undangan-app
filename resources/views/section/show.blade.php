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

            @livewire('section.form-edit-section', ['sectionId' => $sectionId])

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
