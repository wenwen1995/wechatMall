<?php
/**
 * Created by PhpStorm.
 * User: renwenji
 * Date: 2016/12/5
 * Time: 14:05
 */
$Model = M('User');
$data['name'] = 'fjj';
$data['email'] = '460755844@qq.com';
$Model->data($data)->where('id=8')->save();

$map['name'] ='lll';
$Model->where($map)->find();
$data = $Model->data();

$Model->field('id,name,content')->select();

$this->assign('name',$value);
$this->name = $value;