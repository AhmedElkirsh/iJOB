<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Livewire\Features\SupportAttributes\AttributeCollection;

class FormField extends Component
{
    public $value;
    public $type = 'text';
    public $id;
    public $placeholder;
    public $name;
    public $icon;
    public $error;
    public $success;
    public AttributeCollection $attributes;

    public function mount($value = null, $type = 'text', $id = null, $placeholder = null, $name = null, $icon = null, $error = null, $success = null, $attributes = [])
    {
        $this->value = $value;
        $this->type = $type;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->name = $name;
        $this->icon = $icon;
        $this->error = $error;
        $this->success = $success;
        $this->attributes = new AttributeCollection($attributes);
    }

    public function render()
    {
        return view('livewire.form.field');
    }
}
