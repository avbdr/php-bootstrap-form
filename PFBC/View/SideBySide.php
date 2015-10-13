<?php
class View_SideBySide extends FormView {
	protected $class = "form-horizontal";
	private $sharedCount = 0;

    public function renderElement ($element) {
		if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
			$element->render();
            return;
		}
		if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
			$element->appendAttribute("class", "form-control");

		if (!$element->getAttribute("shared") || $this->sharedCount == 0)
			echo '<div class="form-group elem-'.$element->getAttribute("id").'"> ', $this->renderLabel($element);

		$colSize = 'col-md-8';
		if ($element->getAttribute ("shared")) {
            $sharedSize = $element->getAttribute("shared");
			$this->sharedCount += $sharedSize[strlen($sharedSize) - 1];
			$colSize = $element->getAttribute ("shared");
        }

		echo " <div class='$colSize'> ";
		echo $element->render(), $this->renderDescriptions($element);
		echo " </div> ";

		if (!$element->getAttribute("shared") || $this->sharedCount == 8) {
			$this->sharedCount = 0;
			echo " </div> ";
		}
    }

	protected function renderLabel (Element $element) {
		$label = $element->getLabel();
		if(empty ($label))
            $label = '';
		echo ' <label class="col-md-4 control-label" for="', $element->getAttribute("id"), '">';
		if ($element->isRequired())
			echo '<span class="required">* </span>';
		echo $label, '</label> ';
	}
}
