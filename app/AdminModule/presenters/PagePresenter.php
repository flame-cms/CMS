<?php

namespace Flame\CMS\AdminModule;

use \Nette\Application\UI\Form;

use Flame\Utils\Strings;

class PagePresenter extends AdminPresenter
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Flame\CMS\Models\Pages\Page
     */
    private $page;

    /**
     * @var \Flame\CMS\Models\Pages\PageFacade
     */
    private $pageFacade;

    /**
     * @var \Flame\CMS\Models\Users\UserFacade
     */
    private $userFacade;

    /**
     * @param \Flame\CMS\Models\Pages\PageFacade $pageFacade
     */
    public function injectPageFacade(\Flame\CMS\Models\Pages\PageFacade $pageFacade)
    {
        $this->pageFacade = $pageFacade;
    }

    /**
     * @param \Flame\CMS\Models\Users\UserFacade $userFacade
     */
    public function injectUserFacade(\Flame\CMS\Models\Users\UserFacade $userFacade)
    {
        $this->userFacade = $userFacade;
    }

	public function renderDefault()
	{
		$this->template->pages = $this->pageFacade->getLastPages();
	}

    /**
     * @param $id
     */
    public function actionEdit($id)
    {
        $this->id = $id;

        if($this->page = $this->pageFacade->getOne($id)){
            $this['pageForm']->setDefaults($this->page->toArray());
        }else{
            $this->flashMessage('Page does not exist!');
            $this->redirect('Page:');
        }
    }

    protected function createComponentPageForm()
    {
        $form = new PageForm();

	    if($this->id){
			$form->configureEdit();
	    }else{
		    $form->configureAdd();
	    }

        $form->onSuccess[] = callback($this, 'pageFormSubmitted');
        return $form;
    }

    /**
     * @param PageForm $form
     * @throws \Nette\Application\BadRequestException
     */
    public function pageFormSubmitted(PageForm $form)
    {
        if($this->id and !$this->page){
            throw new \Nette\Application\BadRequestException;
        }

        $values = $form->getValues();

        if(empty($values['slug'])){
            $slug = Strings::createSlug($values['name']);
        }else{
            $slug = Strings::createSlug($values['slug']);
        }

        if($this->id){
            $this->page
                ->setName($values['name'])
                ->setSlug($slug)
                ->setDescription($values['description'])
                ->setKeywords($values['keywords'])
                ->setContent($values['content']);

            $this->pageFacade->save($this->page);
            $this->flashMessage('Page was edited.');
            $this->redirect('this');

        }else{
            $page = new \Flame\CMS\Models\Pages\Page(
                $this->userFacade->getOne($this->getUser()->getId()),
                $values['name'],
                $slug,
                $values['content']
            );

	        $page->setKeywords($values['keywords'])
		        ->setDescription($values['description']);

            $this->pageFacade->save($page);
            $this->flashMessage('Page was added.');
            $this->redirect('Page:');
        }
    }

    /**
     * @param $id
     */
    public function handleDelete($id)
    {
        if(!$this->getUser()->isAllowed('Admin:Page', 'edit')){
            $this->flashMessage('Access denied');
        }else{
            $page = $this->pageFacade->getOne($id);

            if($page){
                $this->pageFacade->delete($page);
            }
        }

        if($this->isAjax()){
            $this->invalidateControl();
        }else{
            $this->redirect('Page:');
        }
    }
}
