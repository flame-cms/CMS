<?php

namespace Flame\CMS\AdminModule;

use \Nette\Application\UI\Form;

class NewsreelPresenter extends AdminPresenter
{
    private $newsreelFacade;

    private $newsreel;
    private $id;

	public function __construct(\Flame\CMS\Models\Newsreel\NewsreelFacade $newsreelFacade )
	{
	    $this->newsreelFacade = $newsreelFacade;
	}

    public function renderDefault()
    {
        $newsreels = $this->newsreelFacade->getLastNewsreel();
        $this->template->newsreels = $newsreels;
    }

    public function actionEdit($id)
    {
        $this->id = $id;

        if($this->newsreel = $this->newsreelFacade->getOne($id)){
            $this['newsreelForm']->setDefaults($this->newsreel->toArray());
        }else{
            $this->flashMessage('Newsreel dose not exist.');
            $this->redirect('Newsreel:');
        }
    }

    protected function createComponentNewsreelForm($name)
    {
        $f = new NewsreelForm();

        if($this->id){
			$f->configureEdit();
        }else{
            $f->configureAdd();
        }

        $f->onSuccess[] = callback($this, 'newsreelFormSubmitted');

	    return $f;
    }

    public function newsreelFormSubmitted(Form $f)
    {
        if($this->id and !$this->newsreel){
            throw new \Nette\Application\BadRequestException;
        }

        $values = $f->getValues();

        if($this->id){ //edit
            $this->newsreel
                ->setTitle($values['title'])
                ->setDate($values['date'])
                ->setContent($values['content']);

            $this->newsreelFacade->save($this->newsreel);

            $this->flashMessage('Newsreel was successfully edited');
            $this->redirect('this');
        }else{ //add

            $newsreel = new \Flame\CMS\Models\Newsreel\Newsreel($values['title'], $values['content'], $values['date'], 0);
            $this->newsreelFacade->save($newsreel);

            $this->flashMessage('Newsreel was successfully added');
            $this->redirect('Newsreel:');
        }
    }

    public function handleDelete($id)
    {
        if(!$this->getUser()->isAllowed('Admin:Newsreel', 'delete')){
            $this->flashMessage('Access denied.');
        }else{
            if($newsreel = $this->newsreelFacade->getOne($id)){
                $this->newsreelFacade->delete($newsreel);
                $this->flashMessage('Newsreel was deleted');
            }else{
                $this->flashMessage('Newsreel does not exist!');
            }
        }

        if($this->isAjax()){
            $this->invalidateControl('newsreel');
        }else{
            $this->redirect('Newsreel:');
        }
    }
}
