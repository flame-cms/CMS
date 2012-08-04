<?php

namespace FrontModule;

class NewsreelPresenter extends FrontPresenter
{

	/**
	 * @var \Flame\Models\Newsreel\NewsreelFacade
	 */
	private $newsreelFacade;

	/**
	 * @param \Flame\Models\Newsreel\NewsreelFacade $newsreelFacade
	 */
	public function injectNewsreelFacade(\Flame\Models\Newsreel\NewsreelFacade $newsreelFacade)
	{
		$this->newsreelFacade = $newsreelFacade;
	}

	/**
	 * @param $id
	 */
	public function actionDetail($id)
	{
		if($newsreel = $this->newsreelFacade->getOne($id)){
			$this->newsreelFacade->increaseHit($newsreel);
			$this->template->newsreel = $newsreel;
		}else{
			$this->setView('notFound');
		}
	}
}
