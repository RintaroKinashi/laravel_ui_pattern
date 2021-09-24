<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* 必要なモデルを宣言 */
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateRecipeController extends Controller
{
    // バリデーション（必須項目確認）のルール
    protected $validationRules = [
        "name" => ["required", "string"],
        "url" => ["nullable", "url"],
        "description" => ["nullable", "string"]
    ];

    function __construct()
    {
        // このコントローラーはログイン後のみに使えることを明記
        $this->middleware('auth');
    }

    /**
     * レシピ登録フォームを表示
     */
    function create()
    {
        return view("recipe.recipe_create_form");
    }

    /**
     * レシピ登録フォームからの遷移先
     */
    function store(Request $request)
    {
        //入力値の受け取り $request->validate()でバリデーション実行、エラー時に前画面表示
        $validatedData = $request->validate($this->validationRules);

        //作成するユーザーIDを設定\
        $validatedData["user_id"] = Auth::id();

        //レシピの保存
        $new = Recipe::create($validatedData);

        //登録後はダッシュボードに遷移
        return redirect()->route("dashboard");
    }
}
