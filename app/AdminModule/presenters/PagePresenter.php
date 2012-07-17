<?php

namespace AdminModule;

use \Nette\Application\UI\Form;

class PagePresenter extends AdminPresenter
{
    private $id;

    private $page;

    private $pageFacade;

    private $userFacade;

    public function __construct(\Flame\Models\Pages\PageFacade $pageFacade, \Flame\Models\Users\UserFacade $userFacade)
    {
        $this->pageFacade = $pageFacade;
        $this->userFacade = $userFacade;
    }

	public function renderDefault()
	{
		$this->template->pages = $this->pageFacade->getLastPages();
	}

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
        $form = new \Flame\Forms\PageForm();

	    if($this->id){
			$form->configureEdit();
	    }else{
		    $form->configureAdd();
	    }

        $form->onSuccess[] = callback($this, 'pageFormSubmitted');
        return $form;
    }

    public function pageFormSubmitted(Form $form)
    {
        if($this->id and !$this->page){
            throw new \Nette\Application\BadRequestException;
        }

        $values = $form->getValues();

        if(empty($values['slug'])){
            $slug = $this->createSlug($values['name']);
        }else{
            $slug = $this->createSlug($values['slug']);
        }

        if($this->id){
            $this->page
                ->setName($values['name'])
                ->setSlug($slug)
                ->setDescription($values['description'])
                ->setKeywords($values['keywords'])
                ->setContent($values['content']);

            $this->pageFacade->persist($this->page);
            $this->flashMessage('Page was edited.');
            $this->redirect('this');

        }else{
            $page = new \Flame\Models\Pages\Page(
                $this->userFacade->getOne($this->getUser()->getId()),
                $values['name'],
                $slug,
                $values['description'],
                $values['keywords'],
                $values['content'],
                new \DateTime,
                0
            );

            $this->pageFacade->persist($page);
            $this->flashMessage('Page was added.');
            $this->redirect('Page:');
        }
    }

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