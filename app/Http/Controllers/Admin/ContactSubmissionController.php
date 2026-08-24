<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::orderBy('created_at', 'desc')->get();
        return view('admin.contact-submissions.index', compact('submissions'));
    }

    public function show(ContactSubmission $submission)
    {
        // Mark as processed when viewed for convenience
        if ($submission->status === 'pending') {
            $submission->update(['status' => 'processed']);
        }
        return view('admin.contact-submissions.show', compact('submission'));
    }

    public function updateStatus(Request $request, ContactSubmission $submission)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processed,archived',
        ]);

        $submission->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Inquiry status updated successfully.');
    }

    public function destroy(ContactSubmission $submission)
    {
        $submission->delete();
        return redirect()->route('admin.contact-submissions.index')->with('success', 'Inquiry submission deleted successfully.');
    }
}
