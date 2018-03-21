<?php
/**
 * @author coderwu
 * Set password for category
 */
 class SetCategoryPwd_Action extends Typecho_Widget implements Widget_Interface_Do {

    public function setPassword() {
        /** 获取数据库支持 */

        if (isset($_POST['category'], $_POST['password']) && !empty($_POST['category'])) {
            
            $category = $_POST['category'];
            $password = $_POST['password'];

            $db = Typecho_Db::get();
            $prefix = $db->getPrefix();

            $contentId = $db->fetchAll($db->select('cid')->from($prefix . 'relationships')
                        ->join($prefix . 'metas', $prefix . 'relationships.mid = ' . 
                        $prefix. 'metas.mid', Typecho_Db::LEFT_JOIN)
                        ->where($prefix . 'metas.mid = ?', $category));

            $cids =[];
            foreach ($contentId as $key => $value){
                $cids[$key] = $value['cid'];
            }

            $update = $db->update($prefix . 'contents')->rows(['password' => ($password !=NULL && $password != "") ? $password : NULL])->where('cid in ?', $cids);
            $result = $db->query($update);
            
        } else {
            exit('<script>alert("参数错误，请完整填写")</script>');
        }
    }


    public function action() {
        $this->on($this->request->is('setPassword'))->setPassword($this->request->setPassword);
        $this->response->goBack();
    }
 
 }

 ?>
