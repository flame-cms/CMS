<?php
/**
 * PostControlFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS
 *
 * @date    26.10.12
 */

namespace Flame\CMS\Components\Posts;

class PostControlFactory extends \Flame\Application\ControlFactory
{

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	private $optionFacade;

	/**
	 * @var \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	private $postFacade;

	/**
	 * @param \Flame\CMS\Models\Posts\PostFacade $postFacade
	 */
	public function injectPostFacade(\Flame\CMS\Models\Posts\PostFacade $postFacade)
	{
		$this->postFacade = $postFacade;
	}

	/**
	 * @param \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	public function injectOptionFacade(\Flame\CMS\Models\Options\OptionFacade $optionFacade)
	{
		$this->optionFacade = $optionFacade;
	}

	/**
	 * @param null $data
	 * @return PostControl
	 */
	public function create($data = null)
	{
		$postsLimit = $this->optionFacade->getOptionValue('ItemsPerPage');

		$control = new PostControl($data);
		$control->setPageLimit($postsLimit);

		if($data === null){
			$paginator = $control->getComponent('paginator')->getPaginator();
			$data = $this->postFacade->getLastPublishPostsPaginator($paginator->offset, $postsLimit);
			$paginator->itemCount = count($data);
			$control->setPosts($data);
		}

		return $control;
	}

}
