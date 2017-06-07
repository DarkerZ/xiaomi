<?php
namespace app\admin\controller;

class Category extends \think\Controller
{
    public function index()
    {

//    	查询，实例化音乐模型
//        数据库的优化方法，第一个：需要哪些字段就只查询哪些字段
       $m=db('goods');
       $search_a=array();
       if (input("keyword")) {
          $search_a["m.goods_name"]=array("like","%".input("keyword")."%");
       }
       if (input("category_id")) {
          $search_a["m.category_id"]=array("=",input("category_id"));
       }
        $goods_list=$m
            ->alias('m')
            ->field('m.id,m.goods_name,s.cate_name')
            ->join("__CATEGORY__ s","m.cate_id=s.id")
            ->where($search_a)
            ->order(" m.id desc ")
            ->paginate(10);

            // 测试的时候一定要边界值，为0不传的时候，传的时候很多数据为怎么样
      
        $this->assign('goods_list',$goods_list);

        $category_list = db('category')->select();
        $this->assign('category_list',$category_list);
       return $this->fetch();
    }

     public function add()
    {
        //明星的数据
        $category_list = db('category')->select();
        $this->assign('category_list',$category_list);
        return $this->fetch();
    }

    public function save()
    {
//        第一步：把表单传过来的数据放到一个数组里
        $save_data=array(
            'goods_name'=>input('goods_name'),
            'description'=>input('description'),
            'cate_id'=>input('cate_id'),
        );
        // $goods = validate("Goods");
        // if($goods->check($save_data)){//根据规则自动校验用户传过来的数据
//            上传文件
//            如果没有上传文件提示错误
            $file = request()->file('goods_thumb');

           if (!empty($file)){//如果有上传文件
               $info = $file->move(ROOT_PATH .'public'.DS.'uploads');
               if($info ){//判断文件是否上传成功，如果没有文件上传我们也需要保存
//                文件入口
                   $save_data['goods_thumb'] = DS.'public'.DS.'uploads'.DS.$info->getSaveName();

               }else{
                   $this->error($info -> getError());
               }

           }
           //无论是否有上传文件都要保存数据
            db("goods")->insert($save_data);
            $this->success('添加成功！','index');
        // }else{
        //     $this->error($goods->getError());
        // }

    }

    public function delete()
    {
        $id = input("id");

        db('goods')->delete($id);

        $this->success('删除成功！','index');


    }

    public function edit()
    {
        $id = input("id");
        $info = db("goods")->where("id=$id")->find();
        $this->assign('info',$info);
        //明星的数据
        $category_list = db('category')->select();
        $this->assign('category_list',$category_list);

        return $this->fetch();
    }

    public function update()
    {
        $id = input("id");
        $updateData=[
            'goods_name'=>input('goods_name'),
            'lrc'=>input('lrc'),
            'category_id'=>input('category_id'),

        ];

//        自动验证
       $vali = validate("goods");
       if($vali ->scene("edit") ->check($updateData)){
           //        怎么保存文件
           $file= request()->file("mp3");
            if (!empty($file)){
//                新添加的文件保存起来，保存的时候需传绝对地址

                $info = $file->move(ROOT_PATH .'public'.DS.'uploads');
                if ($info){
//                    入库
                    $updateData['mp3'] = "/public/uploads/".$info->getSaveName();
                }else{
                    $this->error($info->getError());
                }
            }

           db("goods")->where("id=$id")->update($updateData);
           $this->success('修改成功！','index');
       }else{
           $this->error($vali->getError());
       }



    }
}
