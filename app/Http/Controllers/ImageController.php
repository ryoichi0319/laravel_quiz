<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    //
  public function index(){
    return view('image.index');
  }
  public function store(Request $request){
    //ファイル詳細確認
    // dd($request->all());
    // dd($request->file('file')); 

    //任意のファイルに保存storage/app
    // $request->file('file')->store('/img');
    
    //名前をつけて保存
    //$request->file('file')->storeAs('/img','いちご.jpg');
    
    //元々の名前をつけて保存
    $file_name = $request->file('file')->getClientOriginalName();
    $request->file('file')->storeAs('/img',$file_name);

    //複数ファイル
    // $files = $request->file('file');
    // foreach($files as $file){
    //   $file_name = $file->getClientOriginalName();
    //   $file->storeAs('img',$file_name);
    // }    


   //sail artisan storage:link後
    // $file_name = $request->file('file')->getClientOriginalName();

    // $request->file('file')->storeAs('public',$file_name);

    
    //use Illuminate\Support\Facades\Storage;  で
    // Storage::putFile('',$request->file('file'));


    // $file_name = $request->file('file')->getClientOriginalName();

    //putメソッドによってもファイルの保存。file_get_contents関数を使い文字列としてファイル内容の読み込みを行っています。
    // Storage::put($file_name,file_get_contents($request->file('file')->getRealPath()));

    //
    // Storage::put('file.txt', 'この文字列をファイルに追加');

    //

      



     
  }
  
   
}

