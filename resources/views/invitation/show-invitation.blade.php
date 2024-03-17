@extends('layouts.main')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Undangan</h1>
            <ol class="breadcrumb">
                <li><a href="/invitation"></i> Invitation</a></li>
                <li><a class="active"> un </a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @livewire('invitation.box-model-add-page', ['invitationId' => $invitationId])

            @livewire('invitation.box-show-invitation')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
