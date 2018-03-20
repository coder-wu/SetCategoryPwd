<?php
/**
 * @author coderwu
 * Set password for category
 */
 class UploadPlugin_Action extends Typecho_Widget implements Widget_Interface_Do {

    public function updatePassword($categoryName) {
        /** 获取数据库支持 */
        $db = Typecho_Db::get();
        $prefix = $db->getPrefix();
        $sql = 'update ' . $prefix . 'contents set password = ' . 
               ($password != NULL && $password != "") ? "'" . $password . "'" : 'NULL' .
               ' where cid in (select cid from '. $prefix . 'relationships as rela, '      
               $prefix . 'metas as metas where rela.mid = metas.mid and metas.type = ' .                                                                                                   "'category' and metas.name = " . "'" . $category  . "'";
        $db->query($sql);
    }
 
 }

 ?>
