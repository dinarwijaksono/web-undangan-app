<div class="box box-success">
    <div class="box-header">
        <h4>List template</h4>
    </div>

    <div class="box-body">

        <table class="table table-bordered" aria-describedby="table-show-all-invitation">

            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Name</th>
                    <th>Dibuat</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($invitationAll as $key)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $key->name }}</td>
                        <td>{{ date('j F Y', $key->created_at / 1000) }}</td>
                        <td style="width: 100px;">
                            <button class="btn btn-block btn-sm btn-success">Lihat</button>
                        </td>

                        <td style="width: 100px;">
                            <button class="btn btn-block btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
