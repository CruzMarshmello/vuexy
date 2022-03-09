<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Mail;
use App\Mail\Message;

use App\Models\Email;
use App\Models\Subscribe;
use App\Models\User;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emails = Email::where('subject', 'like', '%'.$request->search_subject.'%')
                ->OrderBy('id', 'desc')
                ->paginate(15);

        $request->flash();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['name' => 'Emails']
        ];

        return view('admin.emails.index', compact('emails', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/emails', 'name' => 'Emails'],
            ['name' => 'Compose']
        ];

        return view('admin.emails.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required',
            'subject' => 'required|max:200'
        ]);

        $email = new Email();
        $email->to = $request->to;
        $email->subject = $request->subject;
        $email->message = $request->message;
        $email->signature = Auth::user()->full_name;
        $email->save();

        if ($request->to == 'All') {
            $subscribes = Subscribe::get();

            foreach ($subscribes as $key => $subscribe) {
                $details = [
                    'subject' => $request->subject,
                    'full_name' => '',
                    'message' => $request->message
                ];

                Mail::to($subscribe->email)->send(new Message($details));
            }
        } elseif ($request->to == 'Customers') {
            $users = User::where('role', 'User')->get();

            foreach ($users as $key => $user) {
                $details = [
                    'subject' => $request->subject,
                    'full_name' => $user->full_name,
                    'message' => $request->message
                ];

                Mail::to($user->email)->send(new Message($details));
            }
        } else {
            $subscribes = Subscribe::where('status', 'Enabled')->get();

            foreach ($subscribes as $key => $subscribe) {
                $details = [
                    'subject' => $request->subject,
                    'full_name' => '',
                    'message' => $request->message
                ];

                Mail::to($subscribe->email)->send(new Message($details));
            }
        }

        return redirect()->back()->with('success', 'Email has been send successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::where('id', $id)->first();

        if (!$email) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/emails', 'name' => 'Emails'],
            ['name' => 'Show']
        ];

        return view('admin.emails.show', compact('email', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Email::where('id', $id)->first();

        if (!$email) {
            abort(404);
        }

        $email->delete();

        return redirect()->back()->with('success', 'Email has been delete successfully.');
    }
}
