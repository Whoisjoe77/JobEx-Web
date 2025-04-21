<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Lamaran;

use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function index($jobId) {
        $job = Job::findOrFail($jobId);
        return view("lamaran.apply", compact('job'));
    }

    public function store(Request $request, $id) {
        $job = Job::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:lamarans,email',
            'phone' => 'required',
            'address' => 'required',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'message' => 'nullable|string',
        ]);

        $cvPath = $request->file('cv')->store('lamaran/cv', 'public');

        $data['job_id'] = $job->id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['cv_path'] = $cvPath;
        $data['message'] = $request->message ?? null;

        Lamaran::create($data);
        return redirect()->route('lamaran.success')->with('success','lamaran berhasil dikirimkan');
    }

    public function success() {
        return view('lamaran.success');
    }
}
