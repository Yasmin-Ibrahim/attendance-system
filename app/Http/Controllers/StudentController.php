<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $students = Student::where('name', 'like', "%$search%")->get();
        }else{
            $students = Student::all();
        }
        return view("students.index", compact('students'));
    }

    public function create()
    {
        return view("students.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|string',
            "phone" => 'required|string|min:7|max:20',
            "paid_this_month" => 'required|boolean',
            "old_due" => 'numeric|min:0|max:1000'
        ]);

        $students = Student::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "paid_this_month" => $request->paid_this_month,
            "old_due" => $request->old_due,
            "qr_code" =>Str::uuid() //object
        ]);

        // dd($students);

        $qrPath = 'qrCodes/' . $students->qr_code . '.svg';

        // convert "qr_code" =>Str::uuid() from object to string
        QrCode::format('svg')->size(200)->generate((string) $students->qr_code, storage_path('app/public/' . $qrPath));

        return redirect()->back()->with('success', 'The Student added successfully');

    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            "name" => 'required|string',
            "phone" => 'required|string|min:7|max:20',
            "paid_this_month" => 'required|boolean',
            "old_due" => 'numeric|min:0|max:1000'
        ]);

        $student->update([
            "name" => $request->name,
            "phone" => $request->phone,
            "paid_this_month" => $request->paid_this_month,
            "old_due" => $request->old_due,
        ]);

        return redirect()->back()->with('success', 'The Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back()->with('success', 'This Student deleted successfully');
    }
}
