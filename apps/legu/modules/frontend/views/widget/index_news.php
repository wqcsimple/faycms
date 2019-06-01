<?php

//dd($posts);
?>
<div class="i_zixun">
    <div class="i_zixun_bg">
        <div class="i_title white f_16">景区新闻</div>
    </div>

    <div class="i_zixun_list">
        <ul>

            <?php
            foreach ($posts as $post_item) {
                $post = $post_item['post'];
                ?>
                <li>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="480" height="60" align="left" style="padding-left:10px;">
                                <p class="f_12 c_666"><a href="<?= $post['link'] ?>"><strong
                                            class="f_14"><?= $post['title'] ?></strong></a>
                                    </br><?= $post['abstract'] ?></p>
                            </td>
                        </tr>
                    </table>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
