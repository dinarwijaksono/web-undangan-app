<div class="box no-border" @style(['display: none' => $boxHidden])>
    <box class="body">

        <button class="btn btn-block btn-success">Show</button>

        <div style="width: 100%; margin-top: 5px; margin-bottom: 5px; border: 1px solid black;">

            <h1>Lorem ipsum dolor sit amet consectetur adipisicing.</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>

        </div>

        <div style="width: 100%; margin-top: 5px; margin-bottom: 5px; border: 1px solid black; padding: 5px;">

            <button class="btn btn-sm btn-default btn-block">Header</button>

            <button class="btn btn-sm btn-default btn-block">Header</button>

            <button class="btn btn-sm btn-default btn-block">Header</button>

        </div>

        <button class="btn btn-block btn-success">Show</button>

        <button class="btn btn-block btn-success">Show</button>

        <button type="button" wire:click="doShowBoxAddPage" class="btn btn-block btn-primary">
            Tambahkan halaman</button>

    </box>
</div>
