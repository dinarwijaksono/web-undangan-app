<div class="box box-success">
    <div class="box-body">

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" wire:model="name" class="form-control" placeholder="Nama" autocomplete="off">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-sm-9"></div>
            <div class="col-sm-3">
                <button type="button" wire:click="doCreateInvitation" class="btn btn-success btn-block">Buat Template
                    Undangan</button>
            </div>
        </div>
    </div>
</div>
