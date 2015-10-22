<?php
class Element_Checkbox extends OptionElement {
	protected $_attributes = array("type" => "checkbox");
	protected $inline;

	public function render() { 
		if(isset($this->_attributes["value"])) {
			if(!is_array($this->_attributes["value"]))
				$this->_attributes["value"] = array($this->_attributes["value"]);
		}
		else
			$this->_attributes["value"] = array();

		if(substr($this->_attributes["name"], -2) != "[]")
			$this->_attributes["name"] .= "[]";

        $labelClass = $this->getAttribute ('class');
		if(!empty($this->inline))
			$labelClass .= "checkbox-inline";

		$count = 0;
        echo '<div class="checkbox">';
		foreach($this->options as $value => $text) {
			$value = $this->getOptionValue($value);

			echo '<label class="', $labelClass, '">';
            echo '<input id="', $this->_attributes["id"], '-', $count, '"', $this->getAttributes(array("id", "class", "value", "checked")), ' value="', $this->filter($value), '"';
			if(in_array($value, $this->_attributes["value"]))
				echo ' checked="checked"';
			echo '/> ', $text, ' </label> ';
			++$count;
            if ($labelClass != 'checkbox-inline')
                echo '</div><div class="checkbox">';
		}
        echo '</div>';
	}
}
