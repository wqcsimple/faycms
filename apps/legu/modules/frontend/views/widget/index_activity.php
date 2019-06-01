<?php

//dd($posts);
?>
<div class="jd_566">
    <div class="jd_box">
        <div class="jd_title_bg">
            <div class="i_title white f_16">热门活动</div>
        </div>
    </div>
    <div class="jd_pic">
        <div id="list" name="list">
            <ul>
                <?php
                foreach ($posts as $post_item) {
                    $post = $post_item['post'];
                    ?>
                    <li>
                        <div class="box"><a href="<?= $post['link'] ?>"><img
                                        src="<?= $post['thumbnail']['url'] ?>"
                                        width="281" height="158"
                                        alt="<?= $post['title'] ?>"/><?= $post['title'] ?></a></div>
                    </li>
                    <?php
                }

                ?>
            </ul>
        </div>

    </div>

</div>
            