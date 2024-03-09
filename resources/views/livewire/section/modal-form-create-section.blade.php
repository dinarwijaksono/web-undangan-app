<section class='content' @style(['display: none' => $boxHidden])>
    <div class='example-modal d-block'>
        <div class="modal"
            style="
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display:block;
            z-index: 1;
            background: transparent!important;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Buat Section</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="location">Location tumb</label>
                            <input type="text" wire:model="locateTumb" class="form-control" id="location"
                                placeholder="Locate file">
                            @error('locateTumb')
                                <p class="help-block" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" wire:click="doChangeBoxHidden"
                                class="btn btn-danger pull-left">Batal</button>
                            <button type="button" wire:click="doCreateSection" class="btn btn-primary">Simpan</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div><!-- /.example-modal -->
</section>
