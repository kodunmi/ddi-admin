<?php

namespace App\Http\Controllers;

use App\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function sendMessage(Request $request){

        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'email' => 'required'
        ]);

        if ($validator->passes()) {
            Message::create($request->except('_token'));
            return response()->json(['success'=>'Your message has been recieved and we will contact you soon'], 200);
        }else{
            return response()->json(['error'=>$validator->errors()->all()], 400);
        }



    }

    public function markAsRead($id){
        Message::find($id)->markAsRead();
        return redirect()->route('message.show',['id' => $id]);
    }
    public function messageShow($id){
        $message = Message::find($id);

        return view('admin.pages.message', [
            'message' => $message
        ]);
    }
    public function messageDelete($id){
        $message = Message::find($id);

        $message->delete();

        return redirect()->route('message.all')->with([
            'message' => 'message deleted from system',
            'type' => 'success'
        ]);
    }
    public function messageIndex(){
        $messages = Message::latest()->get();

        return view('admin.pages.messages', [
            'messages' => $messages
        ]);
    }
}
