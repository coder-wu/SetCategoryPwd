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
            $sql = 'update ' . $prefix . 'contents set password = ' . 
                (($password != NULL && $password != "") ? "'" . $password . "'" : 'NULL') .
                ' where cid in (select cid from '. $prefix . 'relationships as rela, '  .  
                $prefix . 'metas as metas where rela.mid = metas.mid and metas.type = ' .                  "'category' and metas.mid = " . $category . ")";
            echo $sql;
            $result = $db->query($sql);
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
