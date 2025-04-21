<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    public function getData()
    {
        $jobs = Job::all();
        return response()->json($jobs);
    }

    public function joblist(Request $request)
    {
        if ($request->ajax()) {
            $jobs = Job::select(['id', 'title', 'description', 'location', 'category', 'salary', 'deadline', 'image'])
                ->latest();

            return DataTables::of($jobs)
                ->addColumn('image', function ($job) {
                    return '<img src="' . asset('storage/' . $job->image) . '" width="50" height="50" alt="Job Image">';
                })
                ->rawColumns(['image'])
                ->make(true);
        }

        return view('jobs.joblist');
    }

    public function detail($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.jobdetail', array_merge(compact('job'), ['activePage' => 'jobdetail']));
    }

    public function addfavorite($id)
    {
        $user = auth()->user();
        $job = Job::findOrFail($id);

        $favoriteJobs = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        // Cek apakah job sudah ada
        if (in_array($id, $favoriteJobs)) {
            return back()->with('info', 'Pekerjaan sudah ada di favorit.');
        }

        // Tambahkan dan simpan
        $favoriteJobs[] = $id;
        $user->favorite_jobs = $favoriteJobs;
        $user->save();

        return back()->with('success', 'Pekerjaan ditambahkan ke favorit.');
    }

    public function favoriteJobsData()
    {
        $user = auth()->user();

        $favoriteIds = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        $jobs = Job::whereIn('id', $favoriteIds)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($jobs);
    }


    public function myfavorites()
    {
        $user = auth()->user();
        $favoriteIds = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        // Ambil semua job yang ID-nya ada di favoriteIds
        $jobs = Job::whereIn('id', $favoriteIds)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('jobs.favoritejobs', compact('jobs'));
    }

    public function deletefavorite($id)
    {
        $user = auth()->user();
        $favorites = is_array($user->favorite_jobs)
            ? $user->favorite_jobs
            : json_decode($user->favorite_jobs, true) ?? [];

        $favorites = array_filter($favorites, fn($jobId) => $jobId != $id);

        // Simpan kembali ke kolom favorites
        $user->favorite_jobs = array_values($favorites); // biar index rapi
        $user->save();

        return redirect()->back()->with('success', 'Pekerjaan dihapus dari favorit.');
    }
}
