<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Services\UserService;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,
            [
                'account' => [
                    'required',
                    'between:6,20',
                    'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i',
                    'unique:users'
                ],
                'password' => [
                    'required',
                    'between:6,20',
                ],
                'name' => [
                    'required',
                    'max:20',
                ],
            ],
            [
                'account.required' => '請輸入帳號',
                'account.between' => '帳號需介於6-20字元',
                'account.regex' => '帳號需包含英文數字',
                'account.unique' => '帳號已存在',
                'password.required' => '請輸入密碼',
                'password.between' => '密碼需介於 6-20 字元',
                'name.required' => '請輸入暱稱',
                'name.max' => '暱稱不可超過 20 字元'
            ]
        );
        if ($objValidator->fails())
            return response()->json($objValidator->errors()->all(), 400);
        //抓出request全部資料
        $userService = new UserService();
        $userService->register($postData);
        return response()->json("註冊成功 ", 200);
    }
}
