<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function send(Request $request)
    {
        // Rate limiting: max 3 submissions per hour per IP
        $key = 'contact-form:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()
                ->withErrors(['form' => 'Too many submissions. Please try again later.'])
                ->withInput();
        }
        RateLimiter::hit($key, 3600);

        $validated = $request->validate([
            'name'              => ['required', 'string', 'min:2', 'max:100'],
            'email'             => ['required', 'email', 'max:255'],
            'subject'           => ['required', 'string', 'min:5', 'max:200'],
            'project_category'  => ['nullable', 'string', 'in:web_app,api_backend,automation,consultation,maintenance,other'],
            'budget'            => ['nullable', 'string', 'in:under_500,500_2000,2000_5000,over_5000'],
            'message'           => ['required', 'string', 'min:20', 'max:5000'],
            'preferred_contact' => ['nullable', 'string', 'in:email,whatsapp'],
        ]);

        // Persist to database
        $contactMessage = ContactMessage::create([
            'name'              => $validated['name'],
            'email'             => $validated['email'],
            'subject'           => $validated['subject'],
            'project_category'  => $validated['project_category'] ?? null,
            'budget'            => $validated['budget'] ?? null,
            'message'           => $validated['message'],
            'preferred_contact' => $validated['preferred_contact'] ?? 'email',
            'ip_address'        => $request->ip(),
        ]);

        // Send email notification if SMTP configured
        try {
            if (config('mail.mailers.smtp.host') !== 'mailpit') {
                Mail::raw(
                    "New contact from {$validated['name']} ({$validated['email']}):\n\n" .
                    "Subject: {$validated['subject']}\n" .
                    "Category: {$validated['project_category']}\n" .
                    "Budget: {$validated['budget']}\n\n" .
                    $validated['message'],
                    function ($mail) use ($validated) {
                        $mail->to(config('app.admin_email', 'emmanuelmwangata26@gmail.com'))
                             ->subject('New Portfolio Enquiry: ' . $validated['subject'])
                             ->replyTo($validated['email'], $validated['name']);
                    }
                );
            }
        } catch (\Exception $e) {
            // Log but don't fail the user request
            logger()->warning('Contact email failed: ' . $e->getMessage());
        }

        return redirect()
            ->route('contact')
            ->with('success', "Thank you for reaching out. I'll be in touch within 24–48 hours.");
    }
}
