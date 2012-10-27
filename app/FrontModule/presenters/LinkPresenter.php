<?php
/**
 * LinkPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace FrontModule;

class LinkPresenter extends FrontPresenter
{

	/**
	 * @var \Flame\CMS\Models\Links\LinkFacade $linkFacade
	 */
	private $linkFacade;

	/**
	 * @param \Flame\CMS\Models\Links\LinkFacade $linkFacade
	 */
	public function injectLinkFacade(\Flame\CMS\Models\Links\LinkFacade $linkFacade)
	{
		$this->linkFacade = $linkFacade;
	}

	/**
	 * @param $link
	 */
	public function actionRedirect($link)
	{

		if(!$link){
			$this->flashMessage('Invalid link');
			$this->redirect('Link:');
		}else{

			if($linkModel = $this->linkFacade->getLinkByUrl($link)){
				$this->linkFacade->increaseHit($linkModel);
			}

			$this->redirectUrl($link);
		}

	}

	public function renderDefault()
	{
		$this->template->links = $this->linkFacade->getLastLinks();
	}

}
