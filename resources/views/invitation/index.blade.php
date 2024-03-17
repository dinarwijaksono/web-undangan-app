@extends('layouts.main')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Undangan</h1>
            <ol class="breadcrumb">
                <li><a href="/invitation" class="active"></i> Invitation</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @livewire('components.alert')

            @livewire('invitation.form-create-invitation')

            @livewire('invitation.box-show-all-invitation')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
