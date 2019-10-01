<?php 
function showError($errors,$nameInput){
    if ($errors->has($nameInput)){
        echo '<div style="border: 1px solid red;width:400px;heigh:100px;background:#F08080;opacity:.5;color:black" class="alert ">';
        echo '<strong>'.$errors->first($nameInput).'</strong>';
        echo '</div>';
 }
}

?>
