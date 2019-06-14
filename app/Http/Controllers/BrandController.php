<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BrandController extends Controller
{
    public function add()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num = $redis->get('num');
        echo $num."<br/>";
        return view('brand.add');
    }
    public function cate(Request $request)
    {
        $data = request()->except(['_token']);
        // $data = request()->all();
        $path = $request->file('img')->store('public');
        //  echo asset('storage'.'/'.$path);
        // dd($path);
        $res = DB::table('brand')->insert($data);
        if($res){
            return redirect('/brand/list');
        }
    }

    public function list()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $query = request()->all();
        $where =[];
        if($query['name']??''){
            $where[]=['name','like',"%$query[name]%"];
        }
        // $pageSize = config('app.pageSize');
        $data = DB::table('brand')->where($where)->orderby('id','desc')->paginate(2);
        return view('brand.list',['data'=>$data,'query'=>$query]);
    }

    // public function del($id)
    // {
    //     $data = DB::table('brand')->where(['id'=>$id])->delete();
    //     if($data){
    //         return redirect('/brand/list');
    //     }
    // }
    public function del($id)
    {
        $res = DB::table('brand')->where('id',$id)->delete();
        if($res){
            return ['code'=>1,'msg'=>'删除成功'];
        }else{
            return ['code'=>0,'msg'=>'删除失败'];
        }
    }
    public function edit($id)
    {
        // $data = DB::table('brand')->get()->toArray();
        $res = DB::table('brand')->where('id',$id)->first();
        return view('brand.edit',['res'=>$res]);
    }

    public function update(Request $request,$id)
    {
        $data = request()->except(['_token']);
        $res = DB::table('brand')->where(['id'=>$id])->update($data);
        if($res){
            return redirect('/brand/list');
        }else{
            return redirect('/brand/list');
        }
    }


}
