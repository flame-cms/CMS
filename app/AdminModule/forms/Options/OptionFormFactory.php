<?php
/**
 * OptionFormFactory.php
 *
 * @author  Jiří Šifalda <sifalda.jiri@gmail.com>
 * @package Flame\CMS\AdminModule
 *
 * @date    13.10.12
 */

namespace Flame\CMS\AdminModule\Forms\Options;

class OptionFormFactory extends \Flame\Application\FormFactory
{

	/**
	 * @var OptionForm
	 */
	protected $form;

	/**
	 * @var \Flame\CMS\Models\Options\Option
	 */
	private $option;

	/**
	 * @var \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	private $optionFacade;

	/**
	 * @param \Flame\CMS\Models\Options\OptionFacade $optionFacade
	 */
	public function injectOptionFacade(\Flame\CMS\Models\Options\OptionFacade $optionFacade)
	{
		$this->optionFacade = $optionFacade;
	}

	/**
	 * @param $option
	 * @return OptionFormFactory
	 */
	public function configure($option)
	{
		$this->option = $option;

		$this->form = new OptionForm();
		$this->form->setAvailableSetting($this->getAvailableSettings());

		if($this->option){
			$this->form->configureEdit($this->option->toArray());
		}else{
			$this->form->configureAdd();
		}

		$this->form->onSuccess[] = $this->formSubmitted;

		return $this;
	}

	/**
	 * @param OptionForm $form
	 */
	public function formSubmitted(OptionForm $form)
	{
		$values = $form->getValues();

		if($this->option){

			$this->option->setValue($values['value']);
			$this->optionFacade->save($this->option);
			$form->presenter->flashMessage('Option was edited.', 'success');
		}else{

			$options = $this->optionFacade->getAvailableOptions();
			if(!isset($options[$values->name])){
				$form->presenter->flashMessage('Invalid state - setting does not exist');
			}else{
				$option = new \Flame\CMS\Models\Options\Option($options[$values->name], $values->value);
				$this->optionFacade->save($option);

				$form->presenter->flashMessage('Global variable was added', 'success');
			}
		}
	}

	/**
	 * @return array
	 */
	protected function getAvailableSettings()
	{
		$settings = array_map(function ($setting){
			return $setting->name;
		}, $this->optionFacade->getLastOptions());

		$availableSettings = $this->optionFacade->getAvailableOptions();

		foreach($availableSettings as $k => $availableSetting){
			if(in_array($availableSetting, $settings)) unset($availableSettings[$k]);
		}

		return $availableSettings;
	}

}
