<?php
/**
 * LogWatcher
 *
 * @link https://github.com/OndrejSlamecka/LogWatcher
 * @copyright (c) 2012 Ondrej Slamecka (http://www.slamecka.cz)
 *
 * License can be found in license.txt file located in the root folder.
 */

use Nette\Utils\Strings;

class LogPresenter extends BasePresenter
{

    public function handleReload()
    {
        $this->invalidateControl();
    }

    public function handleDelete($id)
    {
        $this->getService('logs')->remove($id);
        $this->invalidateControl();
    }

    public function renderRead($id)
    {
        $id = urldecode($id);
        $this->setLayout(FALSE);
        Nette\Diagnostics\Debugger::$bar = FALSE;

        $file = $this->getService('logs')->find($id);

        // Plaintext files deserve special treatmenet
        $isPlaintext = $this->getService('logs')->isPlaintext($id);

        if ($isPlaintext) {
            $file = PlaintextLogProcessor::process($this, $file);
        }

        $this->template->isPlaintext = $isPlaintext;
        $this->template->filename = $id;
        $this->template->file = $file;
    }

    public function renderDefault()
    {
        $files = $this->getService('logs')->find();

        // Fetch data from files
        $output = array();
        foreach ($files as $file) {

            $fullname = $file->getFilename();
            if (Strings::contains($file->getFilename(), 'exception')) {
                $name = Strings::substring($fullname, 30, 32);
            } else {
                $name = $fullname;
            }

            $datetime = new DateTime;
            $datetime->setTimestamp($file->getMTime());

            $file_info = array(
                'fullname' => $fullname,
                'name' => $name,
                'filename' => $file->getFilename(),
                'datetime' => $datetime,
            );
            $output[] = $file_info;
        }

        // Sort by date
        usort($output, function($file1, $file2) {
                    return ($file1['datetime'] > $file2['datetime'] ) ? 0 : 1;
                });

        $this->template->files = $output;
    }

}
