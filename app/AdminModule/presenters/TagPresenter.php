<?php
/**
 * TagPresenter.php
 *
 * @author  Jiří Šifalda <jsifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    15.07.12
 */

namespace AdminModule;

class TagPresenter extends AdminPresenter
{

	private $id;

	private $tag;

	private $tagFacade;

	public function injectTagFacade(\Flame\CMS\Models\Tags\TagFacade $tagFacade)
	{
		$this->tagFacade = $tagFacade;
	}

	public function renderDefault()
	{
		$this->template->tags = $this->tagFacade->getLastTags();
	}

	public function actionEdit($id)
	{
		$this->id = $id;

		if(!$this->tag = $this->tagFacade->getOne($id)){
			$this->flashMessage('Tag does not exist!');
			$this->redirect('Tag:');
		}
	}

	protected function createComponentTagForm()
	{
		$form = new \Flame\CMS\Forms\TagForm();

		if($this->id){
			$form->configureEdit($this->tag->toArray());
		}else{
			$form->configureAdd();
		}

		$form->onSuccess[] = callback($this, 'tagFormSubmitted');

		return $form;
	}

	public function tagFormSubmitted(\Flame\Application\UI\Form $form)
	{
		if($this->id and !$this->tag){
			throw new \Nette\Application\BadRequestException;
		}

		$values = $form->getValues();

		if(empty($values['slug'])){
			$slug = $this->createSlug($values['name']);
		}else{
			$slug = $this->createSlug($values['slug']);
		}

		if($this->id){
			$this->tag
				->setName($values['name'])
				->setSlug($slug);

			$this->tagFacade->persist($this->tag);
			$this->flashMessage('Tag was edited');
		}else{
			if(!$this->tagFacade->getOneByName($values['name'])){

				$tag = new \Flame\CMS\Models\Tags\Tag($values['name'], $slug);
				$this->tagFacade->persist($tag);
				$this->flashMessage('Tag was added');
			}else{
				$this->flashMessage('Tag with name "' . $values['name'] . '" exist.');
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('this');
		}
	}

	public function handleDelete($id)
	{
		if(!$this->getUser()->isAllowed('Admin:Tag', 'delete')){
			$this->flashMessage('Access denied');
		}else{
			$tag = $this->tagFacade->getOne($id);

			if($tag){
				$this->tagFacade->delete($tag);
			}
		}

		if($this->isAjax()){
			$this->invalidateControl();
		}else{
			$this->redirect('this');
		}
	}
}
