<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::where('role', 'Teacher')->get();

        $data = [
            'title' => 'Teachers',
            'teachers' => $teachers
        ];

        return view('teacher.teacher-list.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Add Teacher'
        ];

        return view('teacher.teacher-list.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'identity_number' => 'required|unique:users,identity_number',
            'name' => 'required',
            'username' => 'required|alpha_num|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'gender' => 'required',
            'born_date' => 'required|date',
            'phone' => 'required',
            'nik' => 'required|unique:users,nik',
            'address' => 'required',
            'role' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif|max:1024',
        ]);

        $data['password'] = Hash::make($data['password']);

        // Upload image if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        User::create($data);

        return redirect()->route('teacher.index')->with('successMessage', 'Add data sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = User::find($id);
        $data = [
            'title' => 'Teacher Detail',
            'teacher' => $teacher,
        ];

        return view('teacher.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = User::where('id', $id)->where('role', 'Teacher')->first();
        if (!$teacher) {
            return redirect()->route('teacher.index')->with('errorMessage', 'Data tidak ditemukan');
        }
        $data = [
            'title' => 'Edit Teacher',
            'teacher' => $teacher,
        ];

        return view('teacher.teacher-list.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'identity_number' => 'required|unique:users,identity_number,' . $id,
            'name' => 'required',
            'username' => 'required|alpha_num|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:3',
            'gender' => 'required',
            'born_date' => 'required|date',
            'phone' => 'required',
            'nik' => 'required|unique:users,nik,' . $id,
            'address' => 'required',
            'role' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif|max:1024',
        ]);

        try {
            $teacher = User::findOrFail($id);

            if ($request->password) {
                $data['password'] = Hash::make($data["password"]);
            } else {
                $data['password'] = $teacher->password;
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $teacher->image = $imageName;
                $teacher->save();
            }

            $teacher->update($data);

            return redirect()->route('teacher.index')->with('successMessage', 'Edit data sukses');
        } catch (\Throwable $th) {
            return redirect()->route('teacher.edit', $id)->with('errorMessage', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $teacher = User::where('id', $id)->where('role', 'Teacher')->firstOrFail();
            if ($teacher->image) {
                $imagePath = public_path('images') . '/' . $teacher->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $teacher->delete();
            return redirect()->route('teacher.index')->with('successMessage', 'Delete data sukses');
        } catch (\Throwable $th) {
            return redirect()->route('teacher.index')->with('errorMessage', $th->getMessage());
        }
    }

    public function download()
    {
        $teachers = User::where('role', 'Teacher')->get();

        $data = [
            'title' => 'Teachers List',
            'teachers' => $teachers
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('teacher.teacher-list.report', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('List-Teacher.pdf');
    }
}
