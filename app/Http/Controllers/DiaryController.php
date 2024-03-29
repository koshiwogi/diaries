<?php

namespace App\Http\Controllers;

use App\Diary; // App/Diaryクラスを使用する宣言
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiary; // 追加


class DiaryController extends Controller
{
    public function index()
    {
        //省略
    }

    public function create()
    {
        return view('diaries.create');
    }
   
    public function store(CreateDiary $request)
    {
        $diary = new Diary(); //Diaryモデルをインスタンス化
    
        $diary->title = $request->title; //画面で入力されたタイトルを代入
        $diary->body = $request->body; //画面で入力された本文を代入
        $diary->save(); //DBに保存
    
        return redirect()->route('diary.index'); //一覧ページにリダイレクト
    }
    public function destroy(int $id)
{
    //Diaryモデルを使用して、diariesテーブルから$idと一致するidをもつデータを取得
    $diary = Diary::find($id); 

    //取得したデータを削除
    $diary->delete();

    return redirect()->route('diary.index');
}
    
}