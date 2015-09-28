<?php
class View_SideBySide extends FormView {
	protected $class = "form-horizontal";

	public function render() {
		$this->_form->appendAttribute("class", $this->class);
		$sharedCnt = 0;

		echo '<form role="form"', $this->_form->getAttributes(), '><fieldset>';
		$this->_form->getErrorView()->render();

		$elements = $this->_form->getElements();
		$elementSize = sizeof($elements);
		$elementCount = 0;
		for($e = 0; $e < $elementSize; ++$e) {
			$element = $elements[$e];
            if (isset ($elements[$e+1]))
    			$nextElement = $elements[$e+1];
            else
                $nextElement == null;

			if (!$nextElement)
				$nextElement = new Element_HTML("");

			if($element instanceof Element_Hidden || $element instanceof Element_HTML)
				$element->render();
            elseif($element instanceof Element_Button) {
                if($e == 0 || !$elements[($e - 1)] instanceof Element_Button)
					echo '<div class="form-actions">';
				else
					echo ' ';
				
				$element->render();

                if(($e + 1) == $elementSize || !$elements[($e + 1)] instanceof Element_Button)
                    echo '</div>';
            }
            else {
                if (!$element instanceof Element_Radio && !$element instanceof Element_File)
                    $element->appendAttribute("class", "form-control");
				if ($sharedCnt == 0)
        			echo '<div class="form-group elem-'.$element->getAttribute("id").'">', $this->renderLabel($element);

				if ($element->getAttribute("shared"))
					echo "<div class='".$element->getAttribute("shared")."'>";
				else
					echo '<div class="col-md-6">';
				echo $element->render(), $this->renderDescriptions($element);
				echo '</div>';
				if ($element->getAttribute("shared") && $nextElement->getAttribute("shared")) {
					$sharedCnt++;
				} else {
					echo "</div>";
					$sharedCnt = 0;
				}

				++$elementCount;
			}
		}
		echo '</fieldset></form>';
    }

	protected function renderLabel(Element $element) {
        $label = $element->getLabel();
        if(!empty($label)) {
			echo '<label class="col-md-4 control-label" for="', $element->getAttribute("id"), '">';
			if($element->isRequired())
				echo '<span class="required">* </span>';
			echo $label, '</label>'; 
        }
    }
}
