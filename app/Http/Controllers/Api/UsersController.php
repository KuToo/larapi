<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use http\Client\Request;


class UsersController extends Controller
{
    public function index(Request $request)
    {
        $auth = Auth::user();
        $query = User::query()->where('pid', $auth->id);
        $total = (clone $query)->count();
        //分页
        $page = $request->input('size', 0);
        $page_size = $request->input('size', 100);
        $users = $query->skip($page * $page_size)->take($page_size)->get();
        return $this->success(['total' => $total, 'list' => UserResource::collection($users)]);
    }

    public function show(User $user)
    {
        return $this->success(new UserResource($user));
    }
    //增加子账号
    public function store(UserRequest $request)
    {
        $auth = Auth::user();
        $data=[
            'account'=>$request->account,
            'password'=>bcrypt($request->account),
            'name'=>empty($request->name)?$request->account:$request->name,
            'creator_id'=>$auth->creator_id,
            'pid'=>$auth->id,
        ];
        $user = User::create($data);
        return $this->success(new UserResource($user));
    }

    //修改用户信息
    public function update(User $user, UserRequest $request)
    {
        $user->update($request->all());
        return $this->success(new UserResource($user));
    }

    // 删除用户
    public function destroy(User $user)
    {
        $user->delete();
        return $this->message('删除成功');
    }
}
