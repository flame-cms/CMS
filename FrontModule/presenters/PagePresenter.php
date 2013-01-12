<?php
/**
 * PagePresenter
 *
 * @author  Jiří Šifalda
 * @package Flame
 *
 * @date    11.07.12
 */

namespace Flame\CMS\FrontModule;

class PagePresenter extends FrontPresenter
{

	/**
	 * @autowire
	 * @var \Flame\CMS\Models\Pages\PageFacade
	 */
	protected $pageFacade;

	/**
	 * @param $id
	 */
    public function actionDetail($id)
    {
        if($page = $this->pageFacade->getOne($id)){
            $page->setHit($page->getHit() + 1);
            $this->pageFacade->save($page);
            $this->template->page = $page;
        }else{
            $this->setView('notFound');
        }
    }
}
