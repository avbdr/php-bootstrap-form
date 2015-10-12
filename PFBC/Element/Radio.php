<?php
class Element_Radio extends OptionElement {
	protected $_attributes = array("type" => "radio");
	protected $inline;

	public function render() { 
		$labelClass = $this->getAttribute ('class');
		if(!empty($this->inline))
			$labelClass .= "radio-inline";

		$count = 0;
        echo '<div class="radio">';
		foreach($this->options as $value => $text) {
			$value = $this->getOptionValue($value);

			echo '<label class="', $labelClass . '">';
            echo '<input id="', $this->_attributes["id"], '-', $count, '"', $this->getAttributes(array("id", "class", "value", "checked")), ' value="', $this->filter($value), '"';
			if(isset($this->_attributes["value"]) && $this->_attributes["value"] == $value)
				echo ' checked="checked"';
			echo '/> ', $text, ' </label> ';
			++$count;
            if ($labelClass != 'radio-inline')
                echo '</div><div class="radio">';
		}
        echo '</div>';
	}
}
