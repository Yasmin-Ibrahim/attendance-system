<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function scanner(){
        return view('attendance.scanner');
    }

    public function scan(Request $request){
        $qr_code = trim($request->qr_code);

        $student = Student::where('qr_code', $qr_code)->first();

        if(!$student){
            return response()->json([
                'success' => false,
                'message' => 'Qr_code is not correct'
            ], 404);
        }

        $alreadyAttencance = Attendance::where('student_id', $student->id)->whereDate('created_at', Carbon::today())->exists();

        if($alreadyAttencance){
            return response()->json([
                'success' => false,
                'message' => 'Student ' . $student->name . ' Already was registered'
            ]);
        }

        Attendance::create([
            'student_id' => $student->id,
            'status' => 'present'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Student ' . $student->name . ' is successfully registered'
        ]);
    }
}
