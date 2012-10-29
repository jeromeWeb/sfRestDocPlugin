<?php

class sfRestDocActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {
		$documentation = new sfRestDoc();
		$this->ressource = $documentation->getRessources($request->getParameter("section"));
	}

	public function executeShow(sfWebRequest $request) {
		$this->service = $this->getRoute()->getObject();
	}
}
