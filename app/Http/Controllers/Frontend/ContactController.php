<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\ContactSubmission;
use App\Mail\ContactInquiryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index()
    {
        return view('frontend.contact.index');
    }

    /**
     * Store an incoming B2B inquiry.
     */
    public function store(StoreContactRequest $request)
    {
        // 1. Honeypot check for robot submissions
        if ($request->filled('website_title')) {
            Log::warning('Honeypot trigger fired by submission attempt from IP: ' . $request->ip());
            return redirect()->back()->with('error', 'Spam submission detected.');
        }

        // 2. Log database record
        $submission = ContactSubmission::create([
            'name' => $request->name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'service' => $request->service,
            'message' => $request->message,
            'status' => 'pending'
        ]);

        // 3. Dispatch alert mail (wrapped in try-catch to prevent 500 pages on empty SMTP credentials)
        try {
            $recipient = setting('notification_recipient_email', 'inquiries@reliancesolutions.co.tz');
            Mail::to($recipient)->send(new ContactInquiryMail($submission));
        } catch (\Exception $e) {
            Log::error('SMTP Mail Dispatch Failed: ' . $e->getMessage() . ' | Submission ID: ' . $submission->id);
            // We intentionally do not crash the request, since the submission was successfully written to the MySQL database
        }

        return redirect()->back()->with('success', 'Thank you! Your inquiry has been received. Our solutions team will contact you shortly.');
    }
}
