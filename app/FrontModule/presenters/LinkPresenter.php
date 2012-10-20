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

	public function renderDefault()
	{
		$this->template->links = $this->linkFacade->getLastLinks();
	}

}
