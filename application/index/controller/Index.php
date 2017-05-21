<?php
namespace app\index\controller;

class Index
{
    public function index($page=1)
    {
        $offset = ($page-1)*30;
        $data = db('image')->limit($offset,50)->select();
        $total = db('image')->count();
        return view('index',
            ['data'=>$data,'page'=>$page,'total'=>ceil($total/30)]);
    }
    public function image($pid)
    {
        $data = db('image')->where('pid',$pid)->select();
        return view('image',
            ['data'=>$data,]);
    }
}
