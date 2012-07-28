<?php
/**
 * LogWatcher
 *
 * @link https://github.com/OndrejSlamecka/LogWatcher
 * @copyright (c) 2012 Ondrej Slamecka (http://www.slamecka.cz)
 *
 * License can be found in license.txt file located in the root folder.
 */

namespace Repository;

class File extends \Nette\Object
{

    /** @var string */
    private $directory;

    public function __construct($directory)
    {
        if (!is_dir($directory))
            throw new \Nette\IOException('Path given in config.neon (' . $directory . ') is invalid.');

        $this->directory = realpath($directory);
    }

    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Returns Nette\Utils\Finder or single file if given $filename
     * @param string $name
     * @return \Nette\Utils\Finder
     */
    public function find($filename = NULL)
    {
        if ($filename === NULL) {
            return \Nette\Utils\Finder::find('*')
                            ->exclude('.*')
                            ->from($this->directory);
        } else {
            $path = $this->directory . '/' . $filename;
            if (is_file($path))
                return file_get_contents($path);
            else
                throw new \Nette\IOException('File ' . $path . ' does not exist');
        }
    }

    /**
     * Removes all files or just $filename if given
     * @param string $filename
     */
    public function remove($filename = NULL)
    {
        if ($filename !== NULL) {
            $filename = realpath($this->directory . '/' . $filename);
            unlink($filename);
        } else {
            $files = $this->find()->childFirst();

            foreach ($files as $file) {
                if ($file->isDir()) {
                    rmdir($file->getPathname());
                } else {
                    unlink($file->getPathname());
                }
            }
        }
    }

    public function isPlaintext($id)
    {
        $isPlaintext = false;

        // If ends with .html, it is not plain text
        if (!\Nette\Utils\Strings::endsWith($id, '.html')) {

            // Now we consider it is a plaintext, but lets get sure with additional fileinfo check
            $isPlaintext = true;

            $filepath = realpath($this->directory . '/' . $id);
            $finfo = new \finfo(FILEINFO_MIME);
            if ($finfo) {
                if (!$finfo->file($filepath) === 'text/plain')
                    $isPlaintext = false;
            }
        }

        return $isPlaintext;
    }

}
