<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title" style="margin-bottom: 8px;">Section List</h3>

        <button type="button" wire:click="doShowModalFormCreateSection" class="btn btn-block btn-primary">
            Buat section</button>

    </div>
    <div class="box-body">

        <table class="table table-bordered" aria-describedby="table-section">
            <tr>
                <th style="width: 10px"></th>
                <th>Location</th>
                <th>Dibuat</th>
                <th></th>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td>Update software</td>
                <td>12 maret</td>
                <td style="width: 200px">
                    <div class="row">
                        <div class="col-xs-6">
                            <button class="btn btn-block btn-primary">Edit</button>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block btn-danger">Hapus</button>
                        </div>
                    </div>
                </td>
            </tr>

        </table>

    </div><!-- /.box-body -->
</div><!-- /.box -->
