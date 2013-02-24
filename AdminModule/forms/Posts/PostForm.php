<?php
/**
 * PostForm.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame
 *
 * @date    14.07.12
 */

namespace Flame\CMS\AdminModule\Forms\Posts;

class PostForm extends \Flame\CMS\AppModule\Application\UI\Form
{

	/**
	 * @var array
	 */
	private $categories;

	/**
	 * @var array
	 */
	private $tags;

	/**
	 * @param array $categories
	 */
	public function setCategories(array $categories)
	{
		$this->categories = $this->prepareForFormItem($categories);
	}

	/**
	 * @param array $tags
	 */
	public function setTags(array $tags)
	{
		$this->tags = $this->prepareForFormItem($tags);
	}

	public function configureAdd()
	{
		$this->configure();
		$this->setDefaults(array('publish' => true));
		$this->addSubmit('send', 'Create post');

	}

	/**
	 * @param array $defaults
	 */
	public function configureEdit(array $defaults)
	{
		$this->configure();
		$this->setDefaults($this->prepareDefaultValues($defaults));
		$this->addSubmit('send', 'Edit post');

	}

	private function configure()
	{
		$this->addGroup('Main');

		$this->addText('name', 'Name:', 80)
			->addRule(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addTextArea('content', 'Content:', 105, 30)
			->addRule(self::FILLED)
			->setAttribute('class', 'mceEditor');

		$this->addGroup('Meta options');

		$this->addText('slug', 'Name in URL:', 80)
			->addRule(self::MAX_LENGTH, null, 100);

		$this->addText('keywords', 'META Keywords:', 80)
			->addRule(self::MAX_LENGTH, null, 500);

		$this->addTextArea('description', 'Descriptions:', 90, 5)
			->addRule(self::MAX_LENGTH, null, 250);

		$this->addGroup('Category');

		if($this->categories){
			$this->addSelect('category', 'Category:', $this->categories)
				->setPrompt('-- Select one --')
				->setOption('description', 'Select category or create new below.');

			$this->addText('categoryNew', 'Create new category', 80)
				->setAttribute('placeholder', 'Write name of new category');
		}else{
			$this->addText('categoryNew', 'Create new category', 80)
				->addRule(self::FILLED)
				->setAttribute('placeholder', 'Write name of new category');
		}

		$this->addGroup('Tags');

		if($this->tags){
			$this->addMultiSelect('tags', 'Tags:', $this->tags, count($this->tags))
				->setAttribute('class', 'tags-multiSelect');
		}

		$this->addText('tagsNew', 'Create new tags', 100)
			->setOption('description', 'Tags split with commas')
			->setAttribute('placeholder', 'Write names of new tags');

		$this->addGroup('Are you sure?');

		$this->addCheckbox('publish', 'Make this post published?');
		$this->addCheckbox('comment', 'Allow comments?');
	}

	/**
	 * @param array $defaults
	 * @return array
	 */
	private function prepareDefaultValues(array $defaults)
	{
		if(isset($defaults['tags'])){
			$tags = $defaults['tags']->toArray();
			if(is_array($tags)) $defaults['tags'] = array_map(function($tag){ return $tag->id; }, $tags);
		}
		return $defaults;
	}
}
