<?php 
function alert($type, $message) {
    echo '<div class="h4 text-center alert alert-'.$type.' mt-3" role="alert">'.$message.'</div>';
}