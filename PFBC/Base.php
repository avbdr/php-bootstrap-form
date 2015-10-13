<?php
abstract class Base {
	public function configure (array $properties = null) {
        if (empty ($properties))
            return $this;
        foreach ($properties as $property => $value) {
			$property = strtolower ($property);
            /*Properties beginning with "_" cannot be set directly.*/
            if ($property[0] == "_")
                continue;
            $methodName = "set" . $property;
            if (method_exists ($this, $methodName)) {
                /*If the appropriate class has a "set" method for the property provided, then
                it is called instead or setting the property directly.*/
                $this->$methodName ($value);
            } else if (property_exists ($this, $property)) {
                /*Entries that don't match an available class property are stored in the attributes
                  property if applicable.  Typically, these entries will be element attributes such as
                  class, value, onkeyup, etc.*/
                $this->$property = $value;
            } else
                $this->setAttribute ($property, $value);
        }
        return $this;
    }

	/*This method can be used to view a class' state.*/
	public function debug() {
		echo "<pre>", print_r($this, true), "</pre>";
	}

	/*This method prevents double/single quotes in html attributes from breaking the markup.*/
	protected function filter ($str) {
		return htmlspecialchars($str);
	}

	public function getAttribute($attribute) {
        if (isset ($this->_attributes[$attribute]))
            return $this->_attributes[$attribute];
        return "";
    }

	/*This method is used by the Form class and all Element classes to return a string of html
	attributes.  There is an ignore parameter that allows special attributes from being included.*/
	public function getAttributes($ignore = "") {
        $str = "";
		if(!empty($this->_attributes)) {
			if(!is_array($ignore))
				$ignore = array($ignore);
			$attributes = array_diff(array_keys($this->_attributes), $ignore);
			foreach($attributes as $attribute) {
				$str .= ' ' . $attribute;
				if($this->_attributes[$attribute] !== "")
					$str .= '="' . $this->filter($this->_attributes[$attribute]) . '"';
			}	
		}	
        return $str;
    }

	public function appendAttribute($attribute, $value) {
        if(isset($this->_attributes)) {
            if(!empty($this->_attributes[$attribute]))
                $this->_attributes[$attribute] .= " " . $value;
            else
                $this->_attributes[$attribute] = $value;
        }
    }

    public function setAttribute($attribute, $value) {
        if(isset($this->_attributes))
            $this->_attributes[$attribute] = $value;
    }
}
?>
