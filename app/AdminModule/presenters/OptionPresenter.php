<?php

namespace Flame\CMS\AdminModule;

use Flame\CMS\Models\Options;

/**
* Represent class for global settings and variables
*/
class OptionPresenter extends AdminPresenter
{

	/**
	 * @var \Flame\CMS\Models\Options\Option
	 */
    private $option;

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade
	 */
	private $optionFacade;

	/**
	 * @var \Flame\CMS\AdminModule\Forms\Options\OptionFormFactory $optionFormFactory
	 */
	private $optionFormFactory;

	/**
	 * @param \Flame\CMS\AdminModule\Forms\Options\OptionFormFactory $optionFormFactory
	 */
	public function injectOptionFormFactory(\Flame\CMS\AdminModule\Forms\Options\OptionFormFactory $optionFormFactory)
	{
		$this->optionFormFactory = $optionFormFactory;
	}

	/**
	 * @param \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
    public function injectOptionFacade(\Flame\CMS\Models\Options\OptionFacade $optionFacade)
    {
    	$this->optionFacade = $optionFacade;
    }

	public function renderDefault()
	{
		$this->template->options = $this->optionFacade->getLastOptions();
	}

	/**
	 * @param $id
	 */
    public function actionEdit($id)
    {
        if(!$this->option = $this->optionFacade->getOne($id)){
            $this->flashMessage('Option does not exist');
            $this->redirect('default');
        }
    }

	/**
	 * @return OptionForm
	 */
	public function createComponentOptionForm()
	{
		$form = $this->optionFormFactory->configure($this->option)->createForm();
		$form->onSuccess[] = $this->lazyLink('default');
        return $form;
	}

	/**
	 * @param $id
	 */
	public function handleDelete($id)
	{
		if(!$this->getUser()->isAllowed('Admin:Option', 'delete')){
			$this->flashMessage('Access denied');
		}else{
			$option = $this->optionFacade->getOne($id);
			if($option){
				$this->optionFacade->delete($option);
			}else{
				$this->flashMessage('Required variable does not exist');
			}
		}

		if(!$this->isAjax()){
			$this->redirect('this');
		}else{
			$this->invalidateControl('options');
		}
	}
}
