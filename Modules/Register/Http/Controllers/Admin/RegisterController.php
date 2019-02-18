<?php

namespace Modules\Register\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Classstudy\Entities\Classstudy;
use Modules\Register\Entities\Register;
use Modules\Register\Http\Requests\CreateRegisterRequest;
use Modules\Register\Http\Requests\UpdateRegisterRequest;
use Modules\Register\Repositories\RegisterRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Support\Facades\Input;

class RegisterController extends AdminBaseController
{
    /**
     * @var RegisterRepository
     */
    private $register;

    public function __construct(RegisterRepository $register)
    {
        parent::__construct();

        $this->register = $register;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $registers = $this->register->all();
        $classstudy =   Classstudy::all();
        return view('register::admin.registers.index', compact('registers','classstudy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $classStudy = Classstudy::all();
        return view('register::admin.registers.create',compact('classStudy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRegisterRequest $request
     * @return Response
     */
    public function store(CreateRegisterRequest $request)
    {
        $this->register->create($request->all());

        return redirect()->route('admin.register.register.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('register::registers.title.registers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Register $register
     * @return Response
     */
    public function edit(Register $register)
    {
        return view('register::admin.registers.edit', compact('register'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Register $register
     * @param  UpdateRegisterRequest $request
     * @return Response
     */
    public function update(Register $register, UpdateRegisterRequest $request)
    {
        $this->register->update($register, $request->all());

        return redirect()->route('admin.register.register.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('register::registers.title.registers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Register $register
     * @return Response
     */
    public function destroy(Register $register)
    {
        $this->register->destroy($register);

        return redirect()->route('admin.register.register.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('register::registers.title.registers')]));
    }

    public function get_info(Register $register, UpdateRegisterRequest $request){
        $registerId = Input::get('id','');
        $registerdefail = Register::where('id',$registerId)->first();
        $update = Register::findorFail($registerId);
        $data = $request->all();
        $class = Classstudy::all();
        $data['status'] = '2';
        $this->register->update($update, $data);

        return view('register::admin.registers.modal-intro',compact('registerdefail','class'));
    }
}
