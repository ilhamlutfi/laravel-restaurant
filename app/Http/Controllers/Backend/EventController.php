<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Services\FileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Services\EventService;
use Illuminate\Contracts\View\View;

class EventController extends Controller
{
    public function __construct(
        private FileService $fileService,
        private EventService $eventService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('backend.event.index', [
            'events' => $this->eventService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $data = $request->validated();

        try {
            $data['image'] = $this->fileService->upload($data['image'], 'images');

            $this->eventService->create($data);

            return redirect()->route('panel.event.index')->with('success', 'Event has been created');
        } catch (\Exception $err) {
            $this->fileService->delete($data['file']);

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
