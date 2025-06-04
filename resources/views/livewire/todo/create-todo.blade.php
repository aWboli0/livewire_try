<div class="flex items-center justify-center mt-4">
    <form action="" wire:submit="createTodo" method="post" dir="rtl" class="bg-cyan-800  flex flex-col items-center w-full max-w-lg p-6 rounded-2xl">
        <h2 class="text-2xl text-white bold">ایجاد کارجدید</h2>
        <input type="text" wire:model="name" class="border border-white-2 p-2 focus:bg-black text-white  mt-6 w-full rounded-lg " placeholder="وراد کردن کار جدید...">
        <button type="submit" class="bg-green-600  text-white w-full mt-2 rounded-lg">ثبت</button>
    </form>
</div>
@assets
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endassets
@script
<script>
    Livewire.on('successTodo',(event)=>{
        Swal.fire({
            title: "ای بنازم بهت",
            text: "^_^ کارت عالی بود بهت افتخار میکنم گل ",
            icon: "success"
        });
    });
</script>
@endscript
