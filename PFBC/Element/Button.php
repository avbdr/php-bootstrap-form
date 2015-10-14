<?php
class Element_Button extends Element {
	protected $_attributes = array("type" => "submit", "value" => "Submit");
	protected $icon;

	public function __construct($label = "Submit", $type = "", array $properties = null) {
		if(!is_array($properties))
			$properties = array();

		if(!empty($type))
			$properties["type"] = $type;

		$class = "btn";
		if(empty($type) || $type == "submit")
			$class .= " btn-primary";

		if(!empty($properties["class"]))
			$properties["class"] .= " " . $class;
		else
			$properties["class"] = $class;
		
		if(empty($properties["value"]))
			$properties["value"] = $label;

		parent::__construct("", "", $properties);
	}

    public function render () {
        $value = $this->getAttribute ("value");
        if (!empty ($this->icon)) {
            if ($this->icon[0] == 'f' && $this->icon[1] == 'a')
                $value = '<i class="' . $this->icon . '"></i> ' . $value;
            else
                $value = '<span class="' . $this->icon . '"></span> ' . $value;
        }
        echo '<button', $this->getAttributes(array('value')), '/>',$value,'</button>';
    }
}
