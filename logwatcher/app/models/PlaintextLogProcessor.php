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

class PlaintextLogProcessor extends Nette\Object
{

    /**
     * Enhances the text and wraps it to ol, li tags.
     * @param Nette\Application\UI\Control $parent
     * @param string $text
     * @return string
     */
    public static function process(Nette\Application\UI\Control $parent, $text)
    {
        $chunks = explode("\n", $text);

        foreach ($chunks as $key => $chunk) {
            // Make links from URLs
            $chunk = Strings::replace($chunk, '~([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))~', '<a href="$0">$0</a>');

            // Wrap domain part into small tag
            $chunk = Strings::replace($chunk, '(([\w-]+://?|www[.])[^/]+)', '<small>$0</small>');

            // Make links from references to exceptions logs
            $chunk = Strings::replace($chunk, "~exception[\s-]\d{4}-\d{2}-\d{2}[\s-]\d{2}-\d{2}-\d{2}[\s-][\w\d]{32}\.html~", function($match) use($parent) {
                                $match = $match[0];
                                $link = $parent->link('Log:read', array(urlencode($match)));
                                return '<a href="' . $link . '">' . $match . '</a>';
                            }
            );

            $chunks[$key] = '<li>' . $chunk . '</li>';
        }

        $text = '<ol>' . implode('', $chunks) . '</ol>';
        return $text;
    }

}