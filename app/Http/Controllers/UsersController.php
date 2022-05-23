<?php

namespace App\Http\Controllers;

use App\Models\Attandandances;
use App\Models\Contrie;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Classes = Employee::orderBy('id', 'DESC')->get();
        return response()->json($Classes);
        return view('Home.chake', compact('Classes'));
    }

    public function getUsers(Request $request)
    {
        $Classes = User::orderBy('id','DESC')
            ->when($request->name,function ($q) use ($request) {$q->where('name','like','%'.$request->name.'%');})
            ->when($request->phone,function ($q) use ($request) {$q->where('phone','like','%'.$request->phone.'%');})
            ->when($request->email,function ($q) use ($request) {$q->where('email','like','%'.$request->email.'%');
        })->paginate(2);
        return response()->json($Classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Conterys = Contrie::orderBy('id', 'DESC')->get();
        return response()->json($Conterys);


        $Conterys = new Contrie();

        $Conterys->name = 'مصر';
        $Conterys->code = 'eg';
        $Conterys->save();
        return response()->json($Conterys);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'conf_password'=>'required|same:password'
            ], [],[
                'name' => 'الاسم',
                'email' => 'البريد الالكتروني',
            'conf_password'=>'تاكيد كلمة المرور',
        ]);

        if ($validated->fails()) {
            $msg = "تاكد من البيانات المدخلة";
            $data = $validated->errors();
            return response()->json(compact('msg', 'data'), 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->active = $request->active;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->save();
        return response()->json(['msg' => 'تمت الاضافة بنجاح']);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::Find($id);
        return response()->json(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $fun = Employee::Find($id);
        return response()->json($fun);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        {
            $validated = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'sometimes|unique:users,email,'.$id,
                'conf_password'=>'sometimes|same:password',
                'image' => 'mimes:jpeg,jpg,png,gif|sometimes|max:10000' // max 10000kb

            ], [],[
                'image' => 'الصورة',
                'name' => 'الاسم',
                'email' => 'البريد الالكتروني',
                'conf_password'=>'تاكيد كلمة المرور',
            ]);

            if ($validated->fails()) {
                $msg = "تاكد من البيانات المدخلة";
                $data = $validated->errors();
                return response()->json(compact('msg', 'data'), 422);
            }

        $path = $request->file('image')->store('public/image');
        $user = User::Find($id);
        $user->name = $request->name;
        $user->active = $request->active;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->image = $path;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->save();
        return response()->json(['msg' => 'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
