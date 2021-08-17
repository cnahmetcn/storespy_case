<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use Illuminate\Http\Request;
use Mail;
use App\Jobs\MessagingJob;

class MessagingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Messaging::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'mail' => 'required|email',
        //     'message' => 'required'
        // ]);

        $data = [
            'name' => $request->input('name'),
            'mail' => $request->input('email'),
            'message' => $request->input('message')
        ];

        // Mail::send([], [], function ($message) use($request) {
        //     $message->to('ahmetcan@acn.com', 'Ahmet Can');
        //     $message->from($request->mail, $request->name);
        //     $message->subject('Case Mesajı');
        //     $message->setBody(
        //     'Merhaba, ben <strong>'.$request->name.'</strong> <br />
        //     Bana bu mail adresinden ulaşabilirsiniz: <strong>'.$request->mail.'</strong> <br />
        //     <strong>Mesaj</strong>: ' .$request->message.'<br />
        //     <strong>Tarih</strong>: ' .now().'','text/html'
        //     );
        // });

        // dispatch(new MessagingJob($data));
        MessagingJob::dispatch($data);

        return Messaging::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Messaging::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Messaging = Messaging::find($id);
        $Messaging->update($request->all());
        return $Messaging;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Messaging::destroy($id);
    }

     /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($q)
    {
        return Messaging::where('message', 'like', '%'.$q.'%')->get();
    }
}
