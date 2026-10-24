<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AdminMessageController extends Controller
{
    // Show all messages or saved messages
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        // Show saved messages only when requested
        if ($request->input('view') === 'saved') {
            $query->where('is_saved', true);
        }

        // Search name, email and message
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $messages = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.messages', compact('messages'));
    }

    // Save or unsave a message
    public function toggleSave(ContactMessage $message)
    {
        $message->is_saved = !$message->is_saved;
        $message->save();

        return back()->with(
            'success',
            $message->is_saved
                ? 'Message saved successfully.'
                : 'Message removed from saved messages.'
        );
    }

    // Delete a message
    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return back()->with('success', 'Message deleted successfully.');
    }

    // reply to a message
    public function reply(Request $request, ContactMessage $message)
{
    $validated = $request->validate([
        'reply' => 'required|string|max:10000',
    ]);

    try {
        Mail::raw($validated['reply'], function ($mail) use ($message) {
            $mail->to($message->email)
                ->subject('Reply from Portfolio Owner')
                ->from(
                    config('mail.from.address'),
                    config('mail.from.name')
                );
        });

        return back()->with('success', 'Reply email sent successfully!');
    } catch (\Throwable $e) {
        Log::error('Portfolio reply email failed', [
            'message_id' => $message->id,
            'error' => $e->getMessage(),
        ]);

        return back()->withErrors([
            'reply' => 'Email could not be sent. Please check your mail settings.',
        ]);
    }
}

}
