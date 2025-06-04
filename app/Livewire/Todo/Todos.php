<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class Todos extends Component
{
    public $message;
    #[On('todoCreated')]
    public function todoCreated()
    {
        $this->message = 'کار با موفقیت ایجاد شد';
    }

    public function doTodo($todo_id)
    {
        Todo::query()->findOrFail($todo_id)->update([
            'status' => 'completed'
        ]);
        $this->dispatch('successTodo');
    }

    #[On('destroyTodo')]
    public function destroyTodo($todo_id)
    {
        Todo::destroy($todo_id);

    }

    public function render()
    {
        $todos = Todo::query()->orderBy('todos.created_at','desc')->get();
        return view('livewire.todo.todos',compact('todos'));
    }
}
