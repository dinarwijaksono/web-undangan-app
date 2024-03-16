<?php

namespace App\Livewire\Section;

use App\Services\SectionService;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class FormEditSection extends Component
{
    public $sectionId;

    public $tag;
    public $contentText;
    public $tagClas;
    public $tagStyle;
    public $listBody;

    protected $sectionService;

    public function booted()
    {
        $this->sectionService = App::make(SectionService::class);
        $this->listBody = collect(json_decode(
            $this->sectionService->getById($this->sectionId)->body
        ));
    }

    public function mount()
    {
        $this->tag = 'h1';
    }

    public function doChangeTag()
    {
        $this->tag = strtolower($this->tag);
    }

    public function doUpdateBody()
    {
        $getSection = $this->sectionService->getById($this->sectionId);
        $getBody = collect(json_decode($getSection->body));

        $body = [];
        foreach ($getBody as $key) {
            $body[] = collect($key)->toArray();
        }

        $item = [];
        if ($this->tag == 'p') {
            $item['tag_name'] = 'paragraph';
            $item['tag'] = 'p';
            $item['tag_content'] = $this->contentText;
        }

        if ($this->tag == 'h1') {
            $item['tag_name'] = 'heading 1';
            $item['tag'] = 'h1';
            $item['tag_content'] = $this->contentText;
        }

        $item['tag_class'] = '';
        $item['tag_style'] = '';

        $body[] = $item;

        $this->sectionService->updateBody($this->sectionId, $body, []);
        $this->tag = '';
        $this->contentText = '';
        $this->dispatch('do-update-section')->to(BoxShowSection::class);
    }

    public function doDeleteBody()
    {
        $getSection = $this->sectionService->getById($this->sectionId);
        $getBody = collect(json_decode($getSection->body));

        $body = [];
        foreach ($getBody as $key) {
            $body[] = collect($key)->toArray();
        }

        $bodyNew = [];
        for ($i = 1; $i < $getBody->count(); $i++) {

            if ($i != $getBody->count()) {
                $bodyNew[] = $body[$i - 1];
            }
        }


        $this->sectionService->updateBody($this->sectionId, $bodyNew, []);
        $this->dispatch('do-update-section')->to(BoxShowSection::class);
    }

    public function render()
    {
        return view('livewire.section.form-edit-section');
    }
}
