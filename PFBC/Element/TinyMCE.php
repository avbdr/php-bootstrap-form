<?php
class Element_TinyMCE extends Element_Textarea {
    protected $basic;

    public function render() {
        echo "<textarea", $this->getAttributes(array("value", "required")), ">";
        if(!empty($this->_attributes["value"]))
            echo $this->_attributes["value"];
        echo "</textarea>";
    }

    function renderJS() {
        $id = $this->_form->getAttribute("id");
        $formID = "#" . $id ." #" . $this->_attributes["id"];
        echo 'tinymce.init({selector: "', $formID, '", width: "100%"';
/*        if(!empty($this->basic))
            echo ', theme: "simple"';
        else
            echo ', theme: "advanced", theme_advanced_resizing: true';
*/
        echo '});';

        $ajax = $this->_form->getAjax();
        if(!empty($ajax))
            echo 'jQuery("#$id").bind("submit", function() { tinyMCE.triggerSave(); });';
    }

    function getJSFiles() {
        return array(
            "//tinymce.cachefly.net/4.2/tinymce.min.js"
        );
    }
}
