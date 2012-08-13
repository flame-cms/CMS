<?php

namespace AdminModule;

use Flame\CMS\Models\Options;

/**
* Represent class for global settings and variables
*/
class OptionPresenter extends AdminPresenter
{
	/**
	 * @var int
	 */
    private $id;

	/**
	 * @var \Flame\CMS\Models\Options\Option
	 */
    private $option;

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade
	 */
	private $optionFacade;

	/**
	 * @param \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
    public function injectOptionFacade(\Flame\CMS\Models\Options\OptionFacade $optionFacade)
    {
    	$this->optionFacade = $optionFacade;
    }

	public function renderDefault()
	{
		$this->template->options = $this->optionFacade->getAll();
	}

	/**
	 * @param $id
	 */
    public function actionEdit($id)
    {
        $this->id = $id;

        if($this->option = $this->optionFacade->getOne((int) $id)){
            $this['optionForm']->setDefaults($this->option->toArray());
        }else{
            $this->flashMessage('Option does not exist');
            $this->redirect('Option:');
        }
    }

	/**
	 * @return OptionForm
	 */
	public function createComponentOptionForm()
	{
		$f = new OptionForm();

        if($this->id){
            $f->configureEdit();
        }else{
            $f->configureAdd();
        }

		$f->onSuccess[] = $this->optionFormSubmitted;
        return $f;
	}

	/**
	 * @param OptionForm $f
	 * @throws \Nette\Application\BadRequestException
	 */
	public function optionFormSubmitted(OptionForm $f)
	{

        if($this->id and !$this->option){
            throw new \Nette\Application\BadRequestException;
        }

        $values = $f->getValues();

        if($this->id){

            $this->option->setValue($values['value']);
            $this->optionFacade->save($this->option);
            $this->flashMessage('Option was edited.', 'success');

        }else{
            if($this->optionFacade->getByName($values['name'])){
                $f->addError('Option name ' . $values['name'] . ' exist, but name of option must be unique.');
            }else{
                $option = new Options\Option($values['name'], $values['value']);
                $this->optionFacade->save($option);

                $this->flashMessage('Global variable was added', 'success');
            }
        }

		if($this->isAjax()){
			$f->restore();
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
