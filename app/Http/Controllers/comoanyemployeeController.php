<?php

namespace App\Http\Controllers;

use App\Models\Comoanyemployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class comoanyemployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'EmpidName' => 'required|max:40',
            'salary' => 'numeric|min:0|max:100000000',

        ], [],[
            'EmpidName' => 'الاسم',
            'salary' => 'الراتب'
        ]);



        if ($validated->fails()) {
            $msg = "تاكد من البيانات المدخلة";
            $data = $validated->errors();
            return response()->json(compact('msg', 'data'), 422);
        }



        $emplooo = new Comoanyemployee();
        $emplooo->EmpidName = $request->EmpidName;
        $emplooo->HireDate = $request->HireDate;
        $emplooo->Age = $request->Age;
        $emplooo->Gender = $request->Gender;
        $emplooo->salary = $request->salary;
        $emplooo->EmpStatus = $request->EmpStatus;
        $emplooo->save();
        return response()->json(['msg' => 'تمت الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
