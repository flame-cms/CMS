<?php
/**
 * LogWatcher
 *
 * @link https://github.com/OndrejSlamecka/LogWatcher
 * @copyright (c) 2012 Ondrej Slamecka (http://www.slamecka.cz)
 *
 * License can be found in license.txt file located in the root folder.
 */

abstract class BasePresenter extends Nette\Application\UI\Presenter
{

    public function startup()
    {
        parent::startup();

        if (!$this->getUser()->isLoggedIn() && $this->getName() !== 'Sign') {
            $this->redirect('Sign:in');
        } elseif ($this->getUser()->isLoggedIn() && $this->getName() === 'Sign' && $this->getAction() !== 'out') {
            $this->redirect('Log:');
        }
    }

}
