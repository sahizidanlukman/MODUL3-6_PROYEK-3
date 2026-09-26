<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Services\ActivityService;
use DomainException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $validStatuses = ['Planned', 'Ongoing', 'Done'];
        $selectedStatus = $request->query('status');

        $activities = Activity::query()
            ->when(in_array($selectedStatus, $validStatuses), function ($query) use ($selectedStatus) {
                return $query->where('status', $selectedStatus);
            })
            ->get();

        return view('activities.index', compact('activities', 'selectedStatus'));
    }

    public function create(): View
    {
        return view('activities.create');
    }

    public function store(StoreActivityRequest $request): RedirectResponse
    {
        Activity::create($request->validated());

        return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(UpdateActivityRequest $request, Activity $activity, ActivityService $service)
    {
        try {
            $service->update($activity, $request->validated());

            return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil diperbarui!');
        } catch (DomainException $e) {
            return back()->withErrors(['status' => $e->getMessage()])->withInput();
        }
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
