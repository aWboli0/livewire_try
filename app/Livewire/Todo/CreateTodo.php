<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;

class CreateTodo extends Component
{
    public $title,$name,$status,$slot;
    public function createTodo(): void
    {
        Todo::query()->create([
            'name' => $this->name,
        ]);
        $this->reset();
        $this->dispatch('todoCreated');
    }
    public function render()
    {
        return view('livewire.todo.create-todo');
    }
}
