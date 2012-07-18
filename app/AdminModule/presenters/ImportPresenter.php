<?php
/**
 * ImportPresenter.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    18.07.12
 */

namespace AdminModule;

class ImportPresenter extends AdminPresenter
{

	private $wordPressImporter;

	private $postFacade;

	private $userFacade;

	private $categoryFacade;

	private $tagFacade;

	public function __construct(
		\Flame\Utils\WordPressImporter $wordPressImporter,
		\Flame\Models\Posts\PostFacade $postFacade,
		\Flame\Models\Users\UserFacade $userFacade,
		\Flame\Models\Categories\CategoryFacade $categoryFacade,
		\Flame\Models\Tags\TagFacade $tagFacade)
	{
		$this->wordPressImporter = $wordPressImporter;
		$this->postFacade = $postFacade;
		$this->userFacade = $userFacade;
		$this->categoryFacade = $categoryFacade;
		$this->tagFacade = $tagFacade;
	}

	public function renderDefault()
	{

	}

	protected function createComponentImportForm()
	{
		$form = new \Flame\Forms\ImportForm();
		$form->configure();
		$form->onSuccess[] = callback($this, 'importFormSubmitted');
		return $form;
	}

	public function importFormSubmitted(\Flame\Application\UI\Form $form)
	{
		$values = $form->getValues();

		if(!$values['file']->isOk()){
			$this->flashMessage('Uploaded file is not valid. '. $values['file']->getError());
		}else{
			$posts = $this->wordPressImporter->convert($values['file']->getTemporaryFile());

			if(is_array($posts) and count($posts)){
				foreach($posts as $post){
					$this->createNewPost($post);
				}
			}

			$this->flashMessage('Import was successful.');
		}

		$this->redirect('this');
	}

	private function createNewPost(array $postData)
	{

		if(isset($postData['category'])){
			$category = $this->createNewCategory($postData['category']);
		}else{
			$category = $this->createNewCategory('Uncategorized');
		}

		$post = new \Flame\Models\Posts\Post(
			$this->userFacade->getOne($this->getUser()->getId()),
			$postData['name'],
			$this->createSlug($postData['name']),
			$postData['content'],
			$category
		);

		if($postData['comment'] == 'closed') $comment = false; else $comment = true;
		if($postData['status'] == 'publish') $status = true; else $status = false;

		$post->setTags($this->createNewTags($postData['tags']))
			->setDescription($postData['description'])
			->setCreated($postData['pubDate'])
			->setPublish($status)
			->setComment($comment);

		$this->postFacade->persist($post);
	}

	private function createNewCategory($name)
	{
		if($category = $this->categoryFacade->getOneByName($name)) return $category;

		$category = new \Flame\Models\Categories\Category($name, "", $this->createSlug($name));
		$this->categoryFacade->persist($category);
		return $category;
	}

	private function createNewTag($name)
	{
		if($tag = $this->tagFacade->getOneByName($name)) return $tag;

		$tag = new \Flame\Models\Tags\Tag($name, $this->createSlug($name));
		$this->tagFacade->persist($tag);
		return $tag;
	}

	private function createNewTags(array $tags)
	{
		$prepared = array();

		if(is_array($tags) and count($tags)){
			foreach($tags as $tag){
				$prepared[] = $this->createNewTag($tag);
			}
		}

		return $prepared;
	}

}
