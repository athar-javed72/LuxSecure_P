<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactInquiryRequest;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function store(StoreContactInquiryRequest $request): RedirectResponse
    {
        $inquiry = ContactInquiry::create($request->validated());

        if (config('mail.default') !== 'array' && config('mail.from.address')) {
            try {
                \Illuminate\Support\Facades\Mail::to(config('mail.from.address'))
                    ->send(new \App\Mail\ContactInquiryReceived($inquiry));
            } catch (\Throwable $e) {
                report($e);
            }
        }

        return back()->with('success', 'Thank you! Your message has been sent. We will get back to you soon.');
    }
}
