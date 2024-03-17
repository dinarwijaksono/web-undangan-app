<div class="example-modal" @style(['display: none' => $boxHidden])>
    <div class=" modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" wire:click="doChangeBoxToHidden" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pilih template</h4>
                </div>

                <div class="modal-body" style="max-height: 200px; overflow-y: scroll">

                    <div>
                        @foreach ($sectionAll as $key)
                            <button type="button" wire:click="doAddPage('{{ $key->id }}')"
                                class="btn btn-block btn-default">{{ $key->locate_tumb }}</button>
                        @endforeach

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" wire:click="doChangeBoxToHidden" class="btn btn-outline pull-left"
                        data-dismiss="modal">Batal</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->
