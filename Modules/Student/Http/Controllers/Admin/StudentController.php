<?php

namespace Modules\Student\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Student;
use Modules\Student\Http\Requests\CreateStudentRequest;
use Modules\Student\Http\Requests\UpdateStudentRequest;
use Modules\Student\Repositories\StudentRepository;
use Modules\Classstudy\Entities\Classstudy;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class StudentController extends AdminBaseController
{
    /**
     * @var StudentRepository
     */
    private $student;

    public function __construct(StudentRepository $student)
    {
        parent::__construct();

        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $students = $this->student->all();
        $classStudy = Classstudy::all();
        return view('student::admin.students.index', compact('students','classStudy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $classStudy = Classstudy::all();
        return view('student::admin.students.create',compact('classStudy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateStudentRequest $request
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {
        $this->student->create($request->all());

        return redirect()->route('admin.student.student.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('student::students.title.students')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student $student
     * @return Response
     */
    public function edit(Student $student)
    {
        $classStudy = Classstudy::all();
        return view('student::admin.students.edit', compact('student','classStudy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Student $student
     * @param  UpdateStudentRequest $request
     * @return Response
     */
    public function update(Student $student, UpdateStudentRequest $request)
    {
        $this->student->update($student, $request->all());

        return redirect()->route('admin.student.student.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('student::students.title.students')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student $student
     * @return Response
     */
    public function destroy(Student $student)
    {
        $this->student->destroy($student);

        return redirect()->route('admin.student.student.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('student::students.title.students')]));
    }
}
