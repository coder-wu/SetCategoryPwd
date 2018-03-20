<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * Set Category Password
 *
 * @package SetCategoryPwd
 * @author coderwu
 * @version 1.0.0 beta
 * @link https://blog.coderwu.com
 */
class SetCategoryPwd_Plugin implements Typecho_Plugin_Interface {
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){
        Helper::addPanel(3, 'SetCategoryPwd/panel.php', _t('设置分类访问密码'), NULL, 'administrator');
        Helper::addAction('set-category-password-plugin', 'SetCategoryPwd_Action');
    }

    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
        Helper::removePanel(3, 'SetCategoryPwd/panel.php');
        Helper::removeAction('set-category-password-plugin', 'SetCategoryPwd_Action');
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form) {}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render() {
    }
}
