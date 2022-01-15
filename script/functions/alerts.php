<?php 
function alert($type, $message) {
    echo '<div class="h4 text-center alert alert-'.$type.'" role="alert">'.$message.'</div>';
}