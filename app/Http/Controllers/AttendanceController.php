<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index() {
        $attendances = Attendance::with('user:id,name')->orderBy('created_at', 'desc')->get();

        return view('attendance.index', compact('attendances'));
    }

    public function store(Request $request) {

        $formFields = $request->validate([
            'status' => 'required|in:login,break1,break2,lunch,logout',
            'overbreak' => 'required|in:true,false',
        ]);

        $formFields['overbreak'] = $formFields['overbreak'] === 'true'; // Convert to boolean

        $formFields['user_id'] = Auth::user()->id;

        Attendance::create($formFields);

        return back()->with('success', 'Attendance recorded successfully');
    }

    public function update(Request $request, $id) {
        $formFields = $request->validate([
            'status' => 'required|in:login,break1,break2,lunch'
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($formFields);

        return back()->with('success', 'Attendance updated successfully');
    }

    public function destroy($id) {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return response()->noContent();
    }

    public function calculateTotalHours($userId)
    {
        $attendances = Attendance::where('user_id', $userId)->orderBy('created_at', 'asc')->get();

        $totalHours = 0;
        $lastClockIn = null;

        foreach ($attendances as $attendance) {
            if ($attendance->status === 'login') {
                $lastClockIn = Carbon::parse($attendance->created_at);
            } elseif ($attendance->status === 'logout' && $lastClockIn) {
                $totalHours += Carbon::parse($attendance->created_at)->diffInMinutes($lastClockIn) / 60;
                $lastClockIn = null;
            } elseif (in_array($attendance->status, ['break1', 'break2', 'lunch']) && $lastClockIn) {
                $breakDuration = $attendance->status === 'lunch' ? 60 : 15;
                $totalHours -= $breakDuration / 60;
            }
        }

        return response()->json(['totalHours' => $totalHours]);
    }
}
