<?php
class View_SideBySide extends FormView {
	protected $class = "form-horizontal";
	private $sharedCount = 0;

    public function renderFormStart () {
		$this->_form->appendAttribute("class", $this->class);
		$this->_form->getErrorView()->render();
		echo '<form role="form"', $this->_form->getAttributes(), "><!--csrftoken--><fieldset>";
    }

    public function renderElement ($element) {
		if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
			$element->render();
            return;
		}
		if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
			$element->appendAttribute("class", "form-control");

		if (!$element->getAttribute("shared") || $this->sharedCount == 0)
			echo '<div class="form-group elem-'.$element->getAttribute("id").'">', $this->renderLabel($element);

		$colSize = 8;
		if ($element->getAttribute ("shared")) {
			$this->sharedCount += $element->getAttribute("shared");
			$colSize = $element->getAttribute ("shared");
        }

		echo "<div class='col-md-$colSize'>";
		echo $element->render(), $this->renderDescriptions($element);
		echo "</div>\n";

		if (!$element->getAttribute("shared") || $this->sharedCount == 6) {
			$this->sharedCount = 0;
			echo "</div>";
		}
    }

    public function renderFormClose () {
	    echo '</fieldset></form>';
    }

	public function render ($onlyElement = null) {
        $this->renderFormStart();
        if ($onlyElement && $onlyElement == 'open')
            return;

		$elements = $this->_form->getElements();
		foreach ($elements as $element)
            $this->renderElement ($element);
        $this->renderFormClose();
	}

	protected function renderLabel (Element $element) {
		$label = $element->getLabel();
		if(empty ($label))
            return;
		echo '<label class="col-md-4 control-label" for="', $element->getAttribute("id"), '">';
		if ($element->isRequired())
			echo '<span class="required">* </span>';
		echo $label, '</label>';
	}
}
