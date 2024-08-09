<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Button;

class DashboardGrid extends Component
{
    public $buttons;
    public $selectedButton;
    public $showModal = false;
    public $url = '';
    public $color = '#ffffff';

    public function mount()
    {
        $this->buttons = Button::whereUserId(auth()->id())->get();
    }

    public function handleButtonClick($id)
    {
        $button = Button::find($id);
        if ($button->url) {
            $this->dispatch('new-tab', ['url' => $button->url]);
        } else {
            $this->selectedButton = $button;
            $this->url = $button->url;
            $this->color = $button->color;
            $this->showModal = true;
        }
    }

    public function saveButtonConfiguration()
    {
        $this->selectedButton->update([
            'url' => $this->url,
            'color' => $this->color,
        ]);

        $this->showModal = false;
        $this->mount();
    }

    public function deleteButtonConfiguration($id)
    {
        $button = Button::find($id);

        if ($button) {
            $button->update([
                'url' => null,
                'color' => '#ffffff',
            ]);
        }

        $this->mount();
    }


    public function render()
    {
        return view('livewire.dashboard-grid');
    }
}

