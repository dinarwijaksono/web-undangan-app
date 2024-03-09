@extends('layouts.main')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Section</h1>
            <ol class="breadcrumb">
                <li><a href="/section" class="active"></i> Section</a></li>
            </ol>
        </section>

        @livewire('section.modal-form-create-section')

        <!-- Main content -->
        <section class="content">

            @livewire('components.alert')

            @livewire('section.box-table-section')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
