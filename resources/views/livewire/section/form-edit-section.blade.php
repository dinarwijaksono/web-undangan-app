<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Edit section</h3>
    </div>

    <div class="box-body row">

        <section class="col-sm-6">

            @foreach ($listBody as $key)
                <div class="row" style="margin-bottom: 3px;">

                    <div class="col-sm-9">
                        <button class="btn btn-block btn-sm btn-default">{{ $key->tag_name }}</button>
                    </div>

                    <div class="col-sm-3">
                        <button type="button" wire:click="doDeleteBody"
                            class="btn btn-block btn-sm btn-danger">Hapus</button>
                    </div>

                </div>
            @endforeach

        </section>

        <section class="col-sm-6">
            <div class="form-group">
                <label for="tag">Tag</label>
                <select class="form-control" wire:model="tag" wire:click="doChangeTag" id="tag">
                    <option value="h1">heading 1</option>
                    <option value="p">Paragraph</option>
                </select>
            </div>

            @if (in_array($this->tag, ['h1', 'p']))
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea id="text" wire:model="contentText" class="form-control"></textarea>
                </div>
            @endif

            <div class="form-group row">

                <div class="col-xs-10"></div>

                <div class="col-xs-2">
                    <button type="button" wire:click='doUpdateBody' class="btn btn-block btn-primary">Kirim</button>
                </div>
            </div>

        </section>

    </div>

</div>
