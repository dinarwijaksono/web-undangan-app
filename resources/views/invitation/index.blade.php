@extends('layouts.main')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Undangan</h1>
            <ol class="breadcrumb">
                <li><a href="/section" class="active"></i> Section</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @livewire('components.alert')

            @livewire('invitation.form-create-invitation')

            <div class="box box-success">
                <div class="box-header">
                    <h4>List template</h4>
                </div>

            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
