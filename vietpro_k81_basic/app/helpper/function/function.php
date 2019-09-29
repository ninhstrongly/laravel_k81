<?php 
function showError($errors,$nameInput){
    if ($errors->has($nameInput)){
        echo '<div style="border: 1px solid red;width:500px;heigh:100px;margin: auto;" class="alert ">';
        echo '<strong>'.$errors->first($nameInput).'</strong>';
        echo '</div>';
 }
}

?>