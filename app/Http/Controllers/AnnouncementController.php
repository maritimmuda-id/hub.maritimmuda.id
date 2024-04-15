<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{

    public function update(Request $request)
    {
        $announcement = Announcement::first();

        if($announcement) {
            $announcement->update($request->all());
            return redirect()->route('dashboard')->with('success', 'Announcement updated successfully');
        } else {
            $newAnnouncement = Announcement::create($request->all());
            return redirect()->route('dashboard')->with('success', 'New announcement created successfully');
        }
    }

    public function delete(Request $request)
    {
        DB::table('announcements')->truncate();
        return redirect()->route('dashboard')->with('success', 'Announcement deleted successfully');
    }
}
