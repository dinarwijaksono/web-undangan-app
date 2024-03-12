<div class="box box-success" @style(['display: none;' => $boxHidden])>
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
                <th class="text-center">Dibuat</th>
                <th></th>
            </tr>

            @foreach ($sectionAll as $section)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $section->locate_tumb }}</td>
                    <td class="text-center">{{ date('d M Y', $section->created_at / 1000) }}</td>
                    <td style="width: 300px">
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="show-section/{{ $section->id }}" class="btn btn-block btn-success">Lihat</a>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block btn-primary">Edit</button>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block btn-danger">Hapus</button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>

    </div><!-- /.box-body -->
</div><!-- /.box -->
