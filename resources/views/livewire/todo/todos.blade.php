<section>
    <livewire:todo.create-todo/>
    <div class=" m-auto mt-5 bg-violet-400 h-auto pb-6 pt-2  w-2/6 rounded-[10px] relative">
        <h2 class="text-white text-2xl text-center p-3"> {{$message}} </h2>
        @foreach($todos as $todo)
        <div wire:key="{{$todo->id}}" class="bg-sky-600 p-4 mt-1 rounded flex items-center justify-between">
            <span class="text-xl text-white">{{$todo->name}}</span>
            <div class="space-x-2">
                @if($todo->status == 'pending')
                <button wire:click="doTodo({{$todo->id}})" class="bg-green-600 px-3 py-1 hover:bg-green-900 rounded text-white" type="submit">انجام شد</button>
                @endif
                <button wire:click="$dispatch('deleteTodo',{todo_id : {{$todo->id}}})" class="bg-red-600 px-3 py-1 hover:bg-red-900 rounded text-white" type="submit">حذف</button>
            </div>
        </div>
        @endforeach
    </div>
</section>
@script
<script>
    Livewire.on('deleteTodo',(event)=>{
        Swal.fire({
            title: "آیا از حذف کار مطمئن هستید ؟",
            text: "اگر حذف کنید قابل بازنشانی نیست!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonText: 'انصراف',
            cancelButtonColor: "#d33",
            confirmButtonText: "حذف"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('destroyTodo',{todo_id : event.todo_id })
                Swal.fire({
                    title: "حذف شد!",
                    text: "کار شما با موفقیت حذف شد",
                    icon: "success"
                });
            }
        });
    });
</script>
@endscript
