<div x-data="{contactId: @entangle('contactId'), name: @entangle('name'), phone: @entangle('phone'), email: @entangle('email')}">
    <div class="flex justify-between mb-3">
        <select wire:model.live="limit" class="select w-fit">
            <option value="1">1 bản ghi</option>
            <option value="5">5 bản ghi</option>
            <option value="10">10 bản ghi</option>
            <option value="20">20 bản ghi</option>
        </select>

        <label class="input">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2.5"
                    fill="none"
                    stroke="currentColor"
                >
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input wire:model.live.debounce.500ms="search" type="search" class="grow" placeholder="Search"/>
        </label>
    </div>

    <table class="table table-zebra border border-gray-200">
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        @foreach($contacts as $row)
            <tr wire:key="{{$row->id}}">
                <td>{{$loop->iteration}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td>
                    <button wire:click="deleteContact('{{$row->id}}')"
                            wire:confirm="Bạn có chắc chắn muốn xoá liên hệ - {{$row->name}} ?"
                            class="btn btn-sm btn-soft btn-error">Xoá
                    </button>
                    <button x-on:click="contactId='{{$row->id}}', name='{{$row->name}}';phone='{{$row->phone}}';email='{{$row->email}}'; ;editModal.showModal()" class="btn btn-sm btn-soft btn-warning" >Sửa</button>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        {{$contacts->links()}}
    </div>

    <dialog id="editModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="text-lg font-bold my-3">Cập nhật liên hệ</h3>
            <div>
                <form wire:submit="updateContact" class="flex flex-col gap-2">
                    <input x-model="contactId" hidden type="text" class="input w-full"/>
                    <input x-model="name" type="text" placeholder="Họ tên" class="input w-full"/>
                    <input x-model="phone" type="text" placeholder="Số điện thoại" class="input w-full"/>
                    <input x-model="email" type="email" placeholder="Email" class="input w-full"/>
                    <div class="flex justify-between">
                        <button x-on:click="editModal.close()" type="button" class="btn btn-soft btn-error">Huỷ</button>
                        <button x-on:click="editModal.close()" class="btn btn-soft btn-primary w-fit" type="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
</div>
