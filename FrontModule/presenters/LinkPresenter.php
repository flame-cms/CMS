<?php
/**
 * LinkPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    20.10.12
 */

namespace Flame\CMS\FrontModule;

class LinkPresenter extends FrontPresenter
{

	/**
	 * @autowire
	 * @var \Flame\CMS\Models\Links\LinkFacade
	 */
	protected $linkFacade;

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
