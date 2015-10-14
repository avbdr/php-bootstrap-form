<?php
class Element_File extends Element_Textbox {
	protected $_attributes = array("type" => "file");
    public $bootstrapVersion = 3;

    public function render () {
        ob_start();
        parent::render();
        $box = ob_get_contents();
        ob_end_clean();
        if ($this->bootstrapVersion == 3)
            echo $box;
        else
            echo preg_replace ("/(.*)(<input .*\/>)(.*)/i",
                    '${1}<label class="file">${2}<span class="file-custom"></span></label>${3}', $box);
    }
}
