<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $parents = Parents::where('student_id', $search)->get();
        }else{
            $parents = Parents::all();
        }
        return view('parents.index', compact('parents'));
    }

    public function create()
    {
        $students = Student::select("id", "name")->get();
        $parents = Parents::select("student_id")->get();
        return view('parents.create', compact("students", "parents"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "student_id" => "required|exists:students,id",
            "parent_first" => "required|string",
            "type1" => "required|string|in:father,mother,g_father,g_mother,sister,brother,uncle,aunt,friend",
            "phone_first" => "required|string|max:20|min:7",
            "parent_second" => "nullable|string",
            "type2" => "nullable|string|in:father,mother,g_father,g_mother,sister,brother,uncle,aunt,friend",
            "phone_second" => "nullable|string|max:20|min:7",
            "message" => "nullable|string",
        ]);

        Parents::create([
            "student_id" => $request->student_id,
            "parent_first" => $request->parent_first,
            "type1" => $request->type1,
            "phone_first" => $request->phone_first,
            "parent_second" => $request->parent_second,
            "type2" => $request->type2,
            "phone_second" => $request->phone_second,
            "message" => $request->message,
        ]);

        return redirect()->back()->with("success", "Added The Parents successfully");
    }

    public function show(Parents $parent)
    {
        return view('parents.show', compact('parent'));
    }

    public function edit(Parents $parent)
    {
        $students = Student::select("id", "name")->get();
        return view('parents.edit', compact('parent', "students"));
    }

    public function update(Request $request, Parents $parent)
    {
        $request->validate([
            "student_id" => "required|exists:students,id",
            "parent_first" => "required|string",
            "type1" => "required|string|in:father,mother,g_father,g_mother,sister,brother,uncle,aunt,friend",
            "phone_first" => "required|string|max:20|min:7",
            "parent_second" => "nullable|string",
            "type2" => "nullable|string|in:father,mother,g_father,g_mother,sister,brother,uncle,aunt,friend",
            "phone_second" => "nullable|string|max:20|min:7",
            "message" => "nullable|string",
        ]);

        $parent->update([
            "student_id" => $request->student_id,
            "parent_first" => $request->parent_first,
            "type1" => $request->type1,
            "phone_first" => $request->phone_first,
            "parent_second" => $request->parent_second,
            "type2" => $request->type2,
            "phone_second" => $request->phone_second,
            "message" => $request->message,
        ]);

        return redirect()->back()->with('success', 'The Parents Updated successfully');


    }

    public function destroy(Parents $parent)
    {
        $parent->delete();
        return redirect()->back()->with('success', 'The Parents Deleted successfully');
    }
}
