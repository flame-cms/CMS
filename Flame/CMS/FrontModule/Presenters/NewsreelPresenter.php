<?php

namespace Flame\CMS\FrontModule\Presenters;

class NewsreelPresenter extends FrontPresenter
{

	/**
	 * @var \Flame\CMS\Models\Newsreel\NewsreelFacade
	 */
	private $newsreelFacade;

	/**
	 * @var \Flame\CMS\Components\Newsreel\NewsreelControlFactory $newsreelControlFactory
	 */
	private $newsreelControlFactory;

	/**
	 * @param \Flame\CMS\Components\Newsreel\NewsreelControlFactory $newsreelControlFactory
	 */
	public function injectNewsreelControlFactory(\Flame\CMS\Components\Newsreel\NewsreelControlFactory $newsreelControlFactory)
	{
		$this->newsreelControlFactory = $newsreelControlFactory;
	}

	/**
	 * @param \Flame\CMS\Models\Newsreel\NewsreelFacade $newsreelFacade
	 */
	public function injectNewsreelFacade(\Flame\CMS\Models\Newsreel\NewsreelFacade $newsreelFacade)
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

	/**
	 * @return \Flame\CMS\Components\Newsreel\NewsreelControl
	 */
	protected function createComponentNewsreel()
	{
		$this->newsreelControlFactory->setLimit(15);
		return $this->newsreelControlFactory->create();
	}
}
