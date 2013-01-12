<?php

namespace Flame\CMS\FrontModule;

class NewsreelPresenter extends FrontPresenter
{

	/**
	 * @autowire
	 * @var \Flame\CMS\Models\Newsreel\NewsreelFacade
	 */
	protected $newsreelFacade;

	/**
	 * @autowire
	 * @var \Flame\CMS\Components\Newsreel\NewsreelControlFactory
	 */
	protected $newsreelControlFactory;

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

	/**
	 * @return \Flame\CMS\Components\Newsreel\NewsreelControl
	 */
	protected function createComponentNewsreel()
	{
		$this->newsreelControlFactory->setLimit(15);
		return $this->newsreelControlFactory->create();
	}
}
