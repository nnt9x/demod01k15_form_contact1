<div>
    <form wire:submit="save" class="flex flex-col gap-2">
        <input wire:model="name" type="text" placeholder="Họ tên" class="input w-full"/>
        <input wire:model="phone" type="text" placeholder="Số điện thoại" class="input w-full"/>
        <input wire:model="email" type="email" placeholder="Email" class="input w-full"/>
        <div>
            <button type="reset" class="btn btn-soft btn-error">Đặt lại</button>
            <button class="btn btn-soft btn-primary w-fit" type="submit">Thêm liên hệ</button>
        </div>
    </form>
</div>
