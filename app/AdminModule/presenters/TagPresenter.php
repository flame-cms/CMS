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

use Flame\Utils\Strings;

class TagPresenter extends AdminPresenter
{

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var \Flame\CMS\Models\Tags\Tag
	 */
	private $tag;

	/**
	 * @var \Flame\CMS\Models\Tags\TagFacade
	 */
	private $tagFacade;

	/**
	 * @param \Flame\CMS\Models\Tags\TagFacade $tagFacade
	 */
	public function injectTagFacade(\Flame\CMS\Models\Tags\TagFacade $tagFacade)
	{
		$this->tagFacade = $tagFacade;
	}

	public function renderDefault()
	{
		$this->template->tags = $this->tagFacade->getLastTags();
	}

	/**
	 * @param $id
	 */
	public function actionEdit($id)
	{
		$this->id = $id;

		if(!$this->tag = $this->tagFacade->getOne($id)){
			$this->flashMessage('Tag does not exist!');
			$this->redirect('Tag:');
		}
	}

	/**
	 * @param $name
	 * @return TagForm
	 */
	protected function createComponentTagForm($name)
	{
		$form = new TagForm($this, $name);

		if($this->id){
			$form->configureEdit($this->tag->toArray());
		}else{
			$form->configureAdd();
		}

		$form->onSuccess[] = $this->tagFormSubmitted;

		return $form;
	}

	/**
	 * @param TagForm $form
	 * @throws \Nette\Application\BadRequestException
	 */
	public function tagFormSubmitted(TagForm $form)
	{
		if($this->id and !$this->tag){
			throw new \Nette\Application\BadRequestException;
		}

		$values = $form->getValues();

		if(empty($values['slug'])){
			$slug = Strings::createSlug($values['name']);
		}else{
			$slug = Strings::createSlug($values['slug']);
		}

		if($this->id){
			$this->tag
				->setName($values['name'])
				->setSlug($slug);

			$this->tagFacade->save($this->tag);
			$this->flashMessage('Tag was edited');
		}else{
			if(!$this->tagFacade->getOneByName($values['name'])){

				$tag = new \Flame\CMS\Models\Tags\Tag($values['name'], $slug);
				$this->tagFacade->save($tag);
				$this->flashMessage('Tag was added');
			}else{
				$this->flashMessage('Tag with name "' . $values['name'] . '" exist.');
			}
		}

		if($this->isAjax()){
			$form->restore();
			$this->invalidateControl();
		}else{
			$this->redirect('this');
		}
	}

	/**
	 * @param $id
	 */
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
