<?php
function inputElement($icon, $placeholder, $name, $value){
    $element ="
    <div class= \"input-group\">
        <div class=\"input-group-prepend\">
            <div class=\"input-group-text icon\">$icon</div>
        </div>
            <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control\" id=\"inline-form-input\" placeholder=\"Username\">
    </div>
    ";
    echo $element;
}

function buttonElement($btnid, $styleclass, $text, $name, $attr){
    $btn= "
    <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
    ";
    echo $btn;
}