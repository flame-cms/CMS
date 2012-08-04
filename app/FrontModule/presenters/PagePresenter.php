<?php
/**
 * PagePresenter
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    11.07.12
 */

namespace FrontModule;

class PagePresenter extends FrontPresenter
{

	/**
	 * @var \Flame\Models\Pages\PageFacade
	 */
    private $pageFacade;

	/**
	 * @param \Flame\Models\Pages\PageFacade $pageFacade
	 */
    public function injectPageFacade(\Flame\Models\Pages\PageFacade $pageFacade)
    {
    	$this->pageFacade = $pageFacade;
    }

	/**
	 * @param $id
	 */
    public function actionDetail($id)
    {
        if($page = $this->pageFacade->getOne($id)){
            $page->setHit($page->getHit() + 1);
            $this->pageFacade->persist($page);
            $this->template->page = $page;
        }else{
            $this->setView('notFound');
        }
    }
}
