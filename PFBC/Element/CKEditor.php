<?php
class Element_CKEditor extends Element_Textarea {
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
        if(!empty($this->basic)) {
            echo <<<JS
var basicConfig = {
    height: 100,
    plugins: 'about,basicstyles,clipboard,list,indent,enterkey,entities,link,pastetext,toolbar,undo,wysiwygarea',
    forcePasteAsPlainText : true,
    removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript',
    toolbarGroups: [
        { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'forms' },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'others' },
        { name: 'about' }
    ]
};
JS;
        }
        echo 'var pfbcCkeditor = document.querySelector("' . $formID . '");';
        echo 'CKEDITOR.replace(pfbcCkeditor';
        if(!empty($this->basic))
            echo ', basicConfig';
        echo ');';

        $ajax = $this->_form->getAjax();
        if(!empty($ajax))
            echo 'jQuery("#', $id, '").bind("submit", function() { CKEDITOR.instances["', $this->_attributes["id"], '"].updateElement(); });';
    }

    function getJSFiles() {
        return array(
            "//cdn.ckeditor.com/4.5.4/standard/ckeditor.js"
        );
    }
}
