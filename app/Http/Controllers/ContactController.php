<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    // GET: /contacts
    public function index()
    {
        # Hiển thị toàn bộ liên hệ -> trên này có luôn 1 form tạo
        # 2 livewire component: TableContact, FormCreateContact
        return view('contact.index');
    }


}
