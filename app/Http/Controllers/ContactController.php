<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display a listing of the contacts
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function create($id)
    {
        $contact = Contact::all();
        return view('dashboard.contacts.create', compact('contact'));
    }
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('dashboard.contacts.edit', compact('contact'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('dashboard.contacts.show', compact('contact'));
    }

    // Store a new contact
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contacts,email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ],[
            'email.unique' => 'maaf kamu haya bisa satu kali mengirim massage pada kami'
        ]);

        Contact::create($validatedData);

        return back()->with('success', 'Message sent successfully!');
    }
    public function contact(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Cek apakah ada pesan yang dikirim dalam waktu 30 menit terakhir
    $recentMessage = Contact::where('email', $validatedData['email'])
        ->where('created_at', '>=', now()->subMinutes(30))
        ->first();

    if ($recentMessage) {
        // Hitung sisa waktu dalam detik
        $timeRemaining = now()->diffInSeconds($recentMessage->created_at->addMinutes(30));
        return back()->with(['error' => 'Silakan coba lagi dalam', 'time_remaining' => $timeRemaining]);
    }

    // Jika tidak ada pesan dalam 30 menit terakhir, simpan pesan baru
    Contact::create($validatedData);

    return back()->with('success', 'Pesan berhasil dikirim!');
}
    

    // Update an existing contact
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact->update($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    // Delete a contact
// ContactController.php

public function destroy(Request $request, $id = null)
{
    // Handle bulk deletion
    if ($request->has('contact_ids')) {
        $contactIds = $request->input('contact_ids');
        Contact::whereIn('id', $contactIds)->delete();

        return redirect()->route('contacts.index')->with('success', 'Selected contacts deleted successfully!');
    }

    // Handle single deletion (if ID is provided)
    if ($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }

    return back()->with('error', 'No contacts selected for deletion.');
}

}