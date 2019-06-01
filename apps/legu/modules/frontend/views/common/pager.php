<!--<div class="dede_pages">-->
<!--    <ul class="pagelist">-->
<!--        <li>首页</li>-->
<!--        <li class="thisclass">1</li>-->
<!--        <li><a href='list_29_2.html'>2</a></li>-->
<!--        <li><a href='list_29_3.html'>3</a></li>-->
<!--        <li><a href='list_29_2.html'>下一页</a></li>-->
<!--        <li><a href='list_29_3.html'>末页</a></li>-->
<!--        <li><span class="pageinfo">共 <strong>3</strong>页<strong>18</strong>条</span></li>-->
<!--    </ul>-->
<!--</div>-->
<?php
/**
 * @var $listview fay\common\ListView
 */

use fay\helpers\Html;
use fay\helpers\HtmlHelper;

//dump($listview);
?>  

<?php
if ($listview->total_pages > 1) {
    ?>
    <div class="dede_pages">
        <ul class="pagelist">
            <?php
            // 首页
            if ($listview->current_page > ($listview->adjacent + 1)) {
                echo "<li>" . HtmlHelper::link("首页", $listview->reload) . "</li>";
            }

            // 上一页
            if ($listview->current_page == 2) {
                echo "<li>" . HtmlHelper::link("上一页", $listview->reload) . "</li>";
            } else if ($listview->current_page > 2) {
                echo "<li>" . HtmlHelper::link("上一页", $listview->reload . "?page=" . ($listview->current_page - 1)) . "</li>";
            }

            //页码
            $pmin = $listview->current_page > $listview->adjacent ? $listview->current_page - $listview->adjacent : 1;
            $pmax = $listview->current_page < $listview->total_pages - $listview->adjacent ? $listview->current_page + $listview->adjacent : $listview->total_pages;
            for ($i = $pmin; $i <= $pmax; $i++) {
                if ($i == $listview->current_page) {
                    echo "<li class='thisclass'>". $i ."</li>";
                } else if ($i == 1) {
                    echo "<li>" . HtmlHelper::link($i, $listview->reload) . "</li>";
                } else {
                    echo "<li>" . HtmlHelper::link($i, $listview->reload . '?page=' . $i) . "</li>";
                }
            }

            //末页
            if($listview->current_page < $listview->total_pages - $listview->adjacent) {
                echo "<li>". HtmlHelper::link("末页", $listview->reload . '?page=' . $listview->total_pages) . "</li>";
            }
            ?>
            <li><span class="pageinfo">共 <strong><?= $listview->total_pages ?></strong>页<strong><?= $listview->total_records ?></strong>条</span></li>
        </ul>
    </div>
    <?php
}
?>