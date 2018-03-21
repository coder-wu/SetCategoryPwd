<?php
include 'common.php';
include 'header.php';
include 'menu.php';

Typecho_Widget::widget('Widget_Metas_Category_Admin')->to($categories);
?>
<div class="main">
    <div class="body container">
    <div class="typecho-page-title">
        <h2>分类加密</h2>
    </div>
    <div class="row typecho-page-main" role="form">
        <div class="col-mb-12 col-tb-8 col-tb-offset-2">
            <form action="i<?php $options->index('/action/set-category-password-plugin') ?>" method="post" enctype="application/x-www-form-urlencoded">
            <ul class="typecho-option" id="typecho-option-item-category-0">
                <li>
                    <label class="typecho-label" for="category-0-1">请选择分类</label>
                    <select name="category" id="category-0-1">
                    <?php while($categories->next()): ?>
                        <option value="<?php $categories->mid();?>">
                        <?php $categories->name(); ?>
                        </option>
                     <?php endwhile;?>
                    </select>
                </li>
            </ul>
               <ul class="typecho-option" id="typecho-option-item-password-0">
                   <li>
                   <label class="typecho-label" for="word-0-1">密码</label>
                   <input id="word-0-1" name="password" type="password" class="text" value="" />
                   </li>
               </ul>
               <ul class="typecho-option typecho-option-submit" id="typecho-option-item--1">
                    <li>
                    <button type="submit" class="btn primary">保存</button>
                    </li>
               </ul>
             </form>
         </div>
      </div>
    </div>
</div>
<?php
include 'copyright.php';
include 'common-js.php';
include 'footer.php';
?>
