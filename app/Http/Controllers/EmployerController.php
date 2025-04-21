<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Lamaran;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EmployerController extends Controller
{
    public function home()
    {
        return view("employer.home");
    }

    public function myjobs()
    {
        $user = auth()->user();
        $jobs = $user->jobs()->orderBy("created_at", "desc");
        return view('employer.myjobs', compact('jobs'));
    }

    public function addjob()
    {
        return view('employer.addjob');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'location' => 'required',
            'category' => 'required',
            'employment_type' => 'required',
            'salary' => 'required',
            'deadline' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $imagePath = 'job-image/' . $filename;

            Storage::disk('public')->put($imagePath, file_get_contents($image));
        }

        Job::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'company_name' => $request->company,
            'description' => $request->description,
            'location' => $request->location,
            'category' => $request->category,
            'employment_type' => $request->employment_type,
            'salary' => $request->salary,
            'deadline' => $request->deadline,
            'image' => $imagePath,
        ]);

        return redirect()->route('employer.myjobs')->with('success', 'Job berhasil ditambahkan!');
    }

    public function jobdetail($id)
    {
        $job = Job::findOrFail($id);
        return view('employer.jobdetail', array_merge(compact('job')));
    }

    public function editjob($id)
    {
        $job = Job::findOrFail($id);
        return view('employer.editjob', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $find = Job::find($id);

        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'location' => 'required',
            'category' => 'required',
            'employment_type' => 'required',
            'salary' => 'required',
            'deadline' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = ([
            'title' => $request->title,
            'company_name' => $request->company,
            'description' => $request->description,
            'location' => $request->location,
            'category' => $request->category,
            'employment_type' => $request->employment_type,
            'salary' => $request->salary,
            'deadline' => $request->deadline,
        ]);

        $imagePath = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $imagePath = 'job-image/' . $filename;

            Storage::disk('public')->put($imagePath, file_get_contents($image));

            $data['image'] = $imagePath;
        }


        $find->update($data);

        return redirect()->route('employer.jobdetail', $id)->with('success','Job telah diupdate!');
    }

    public function delete($id)
    {
        $data = Job::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('employer.myjobs')->with('deletesuccess', 'Job telah dihapus!');
    }

    public function applicants($id)
    {
        $job = Job::findOrFail($id);
        $lamarans = $job->lamarans;

        return view('employer.applicants', array_merge(compact('job', 'lamarans')));
    }

    public function getLamaransData($id)
    {
        $lamarans = Lamaran::where('job_id', $id)->get(['id', 'name', 'email', 'phone', 'address', 'cv_path', 'message', 'created_at']);

        return response()->json($lamarans);
    }

    public function applicantsdetail($id)
    {
        $lamarans = Lamaran::findOrFail($id);
        $tes = $lamarans->job_id;
        $job = Job::findOrFail($tes);
        if ($lamarans->status === 'belum_dilihat') {
            $lamarans->status = 'dilihat';
            $lamarans->save();
        }
        return view('employer.applicantsdetail', compact(['lamarans', 'job']));
    }

    public function lamaransdelete($id)
    {
        $data = Lamaran::find($id);

        if ($data) {
            $jobId = $data->job_id; // simpan dulu sebelum dihapus
            $data->delete();

            return redirect()->route('employer.applicants', ['id' => $jobId])
                ->with('success', 'Lamaran berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Data lamaran tidak ditemukan.');
    }

    public function lamaransupdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak,dipertimbangkan',
            'catatan' => 'nullable|string'
        ]);

        $lamaran = Lamaran::findOrFail($id);
        $lamaran->status = $request->status;
        $lamaran->catatan = $request->catatan;
        $lamaran->save();

        return redirect()->route('employer.applicantsdetail', $id)->with('success', 'Status dan catatan berhasil diperbarui.');
    }

    public function lamaranaccept($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $lamaran->status = 'diterima';
        $lamaran->save();
        $job = $lamaran->job_id;
        return redirect()->back()->with('successupdate', 'Status dan catatan berhasil diperbarui.');
    }
    
    public function lamarandecline($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $lamaran->status = 'ditolak';
        $lamaran->save();
        $job = $lamaran->job_id;
        return redirect()->back()->with('successupdate', 'Status dan catatan berhasil diperbarui.');
    }
}
