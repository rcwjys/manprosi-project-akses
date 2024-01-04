<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function create()
    {
        return view('customer.index');
    }

    public function store(Request $request)
    {

        $data = $request->all();

        Message::create([
            'customerName' => $data['fullname'],
            'customerEmail' => $data['email'],
            'customerPhoneNumber' => $data['phoneNumber'],
            'customerMessage' => $data['message'],
        ]);
        session()->flash('messageSuccessfullySubmited', 'Pesan berhasil dikirim, mohon check email, secara berkala');
        return redirect(route("customer.index"));
    }

    public function index()
    {
        $messages = Message::all();

        return view('admin.message', compact('messages'));
    }

    public function showDetail($messageId)
    {
        $message = Message::find($messageId);

        return view('admin.detail-message', compact('message'));
    }

    public function editMessage(Request $request)
    {
        $message = DB::table('messages')->where('messageId', $request->messageId)->first();

        $messages = DB::table('messages')->select()->get();

        return view('admin.edit-message')->with(compact('message', 'messages'));
    }

    public function submitEditMessage(Request $request)
    {
        $data = Message::find($request->messageId);
        $data->customerEmail = $request->customerEmail;
        $data->customerPhoneNumber = $request->customerPhoneNumber;
        $data->save();

        session()->flash('editMessage', 'Proses Edit Berhasil');
        return redirect('/messages');
    }

    public function deleteMessage(Request $request)
    {
        $message = Message::find($request->messageId);
        $message->delete();
        session()->flash('deleteMessageSuccessFully', 'Proses Edit Berhasil');
        return redirect('/messages');
    }
}
