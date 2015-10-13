<?php
class View_Vertical extends FormView {
    private $sharedCount = 0;
    public function renderElement ($element) {
		if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
			$element->render();
            return;
		}
		if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
			$element->appendAttribute("class", "form-control");

        if (!$element->getAttribute("shared") || $this->sharedCount == 0) {
            $rowClass = $element->getAttribute ("shared") ? 'row' : '';
            echo '<div class="'.$rowClass.' form-group elem-'.$element->getAttribute("id").'"> ', $this->renderLabel($element);
        }

        if ($element->getAttribute ("shared")) {
            $sharedSize = $element->getAttribute("shared");
            $this->sharedCount += $sharedSize[strlen($sharedSize) - 1];
            $colSize = $element->getAttribute ("shared");
            echo " <div class='$colSize'> ";
        }

        $element->setAttribute('placeholder', $element->getLabel());
		echo $element->render(), $this->renderDescriptions($element);
        if ($element->getAttribute ("shared"))
            echo " </div> ";

        if (!$element->getAttribute("shared") || $this->sharedCount == 12) {
            $this->sharedCount = 0;
            echo " </div> ";
        }
    }

	protected function renderLabel (Element $element) {}
}
