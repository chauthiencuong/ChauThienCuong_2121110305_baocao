<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::orderBy('id', 'DESC')->get();
        return view('backend.contact.index')->with(compact('contact'));
    }

    public function trash()
{
    $contact = Contact::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.contact.trash', compact('contact'));
}


    public function delete($id)
{
    $contact = Contact::find($id);

    if (!$contact) {
        return redirect()->back()->with('error', 'liên hệ không tồn tại');
    }

    $contact->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'liên hệ đã được đưa vào thùng rác!');
}


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::orderBy('id', 'DESC')->get();
        return view('backend.contact.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:contact|max:255',
                'email' => 'max:255',
                'phone' => 'max:255',
                'title' => 'required|max:255',
                'content' => 'required|max:255',
                'status' => 'required',
                'user' => 'required',

            ],
            [
                'name.required' => 'Bạn hãy nhập tên liên hệ',
                'name.unique' => 'Tên liên hệ đã tồn tại! Hãy nhập tên liên hệ khác.',
                'title.required' => 'Bạn hãy nhập tiêu đề',
                'content.required' => 'Bạn hãy nhập nội dung',
            ]
        );
        
        $contact = new Contact();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->title = $data['title'];
        $contact->content = $data['content'];
        $contact->status = $data['status'];
        $contact->user_id = $data['user'];
        $contact->save();
        return redirect()->route('contact.create')->with('message', 'Thêm thành công');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact =  Contact::find($id);
        return view('backend.contact.show')->with(compact('contact')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        $user = User::orderBy('id', 'DESC')->get();
        return view('backend.contact.edit', compact('contact', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $data = $request->validate(
            [
                'name' => 'required|unique:contact|max:255',
                'email' => 'max:255',
                'phone' => 'max:255',
                'title' => 'required|max:255',
                'content' => 'required|max:255',
                'status' => 'required',
                'user' => 'required',

            ],
            [
                'name.required' => 'Bạn hãy nhập tên liên hệ',
                'name.unique' => 'Tên liên hệ đã tồn tại! Hãy nhập tên liên hệ khác.',
                'title.required' => 'Bạn hãy nhập tiêu đề',
                'content.required' => 'Bạn hãy nhập nội dung',
            ]
        );
        
        $contact = Contact::find($id);
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->title = $data['title'];
        $contact->content = $data['content'];
        $contact->status = $data['status'];
        $contact->user_id = $data['user'];
        
        $contact->save();
        return redirect()->back()->with('message', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $contact = Contact::withTrashed()->find($id);

    if (!$contact) {
        return redirect()->route('contact.trash')->with('error', 'Không tìm thấy liên hệ trong thùng rác');
    }

    $contact->forceDelete(); // Sử dụng forceDelete để xóa hoàn toàn bản ghi

    return redirect()->route('contact.trash')->with('message', 'Xóa hoàn toàn liên hệ thành công');
}



public function restore($id)
{
    $contact = Contact::withTrashed()->find($id);

    if (!$contact) {
        return redirect()->route('contact.trash')->with('error', 'Không tìm thấy liên hệ trong thùng rác');
    }

    if ($contact->restore()) {
        return redirect()->route('contact.trash')->with('message', 'Khôi phục liên hệ thành công');
    }
}



}
