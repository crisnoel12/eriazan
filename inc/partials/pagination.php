<div class="col-xs-12 paging">
<?php
    $i = 0;
    while ($i < $total_pages) {
        $i +=1 ;
        echo '<a href="' . (isset($_GET['categories']) && $_GET['categories'] !== 'All Products' ? '?categories='.$selected_category.'&pg=' .$i : './?pg='. $i ).'" class="'.($current_page == $i ? 'active' : '').'">' . $i . '</a>';
    }
 ?>
 </div>
