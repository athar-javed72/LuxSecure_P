<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(): View
    {
        $inquiries = ContactInquiry::latest()->paginate(20);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function markRead(ContactInquiry $inquiry): RedirectResponse
    {
        $inquiry->update(['is_read' => true]);
        return back()->with('success', 'Marked as read.');
    }
}
