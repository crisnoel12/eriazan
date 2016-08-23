<?php
if (isset($_SESSION['flash-message'])) {
    echo '<p class="flash-message bg-primary">
        '. $_SESSION['flash-message'] .'
        <button id="flash-message-close" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </p>';
        unset($_SESSION['flash-message']);
}
