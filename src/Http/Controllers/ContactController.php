<?php

namespace Pm\ContactForm\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Pm\ContactForm\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use NjoguAmos\Turnstile\Turnstile;

class ContactController extends Controller
{
    public function create()
    {
        return view('contactform::contact');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ];

        if (config('contactform.use_turnstile')) {
            $rules['cf-turnstile-response'] = 'required';
        }

        $validated = $request->validate($rules);

        if (config('contactform.use_turnstile')) {
            $token = $request->input('cf-turnstile-response');

            $turnstile  = new Turnstile();
            $response   = $turnstile->getResponse($token);

            if (! $response->success) {
                return back()
                    ->withErrors(['captcha' => 'Turnstile validatie is mislukt.'])
                    ->withInput();
            }
        }

        Mail::to(config('contactform.recipient_email'))
            ->send(new ContactFormSubmitted($validated));


        return back()->with('success', 'Bedankt voor je bericht!');


    }
}
