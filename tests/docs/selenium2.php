<?php

/**
 * Object representing a DOM element.
 *
 * @package    PHPUnit_Selenium
 * @author     Giorgio Sironi <giorgio.sironi@asp-poli.it>
 * @copyright  2010-2011 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 1.2.0
 * @method string attribute($name) Retrieves an element's attribute
 * @method void clear() Empties the content of a form element.
 * @method void click() Clicks on element
 * @method string css($propertyName) Retrieves the value of a CSS property
 * @method bool displayed() Checks an element's visibility
 * @method bool enabled() Checks a form element's state
 * @method bool equals(PHPUnit_Extensions_Selenium2TestCase_Element $another) Checks if the two elements are the same on the page
 * @method array location() Retrieves the element's position in the page: keys 'x' and 'y' in the returned array
 * @method string name() Retrieves the tag name
 * @method bool selected() Checks the state of an option or other form element
 * @method array size() Retrieves the dimensions of the element: 'width' and 'height' of the returned array
 * @method void submit() Submits a form; can be called on its children
 * @method string value($newValue = NULL) Get or set value of form elements
 * @method string text() Get content of ordinary elements
 */

/**
 * TestCase class that uses Selenium 2
 * (WebDriver API and JsonWire protocol) to provide
 * the functionality required for web testing.
 *
 * @package    PHPUnit_Selenium
 * @author     Giorgio Sironi <giorgio.sironi@asp-poli.it>
 * @copyright  2010-2011 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 1.2.0
 * @method void acceptAlert() Press OK on an alert, or confirms a dialog
 * @method mixed alertText($value = NULL) Gets the alert dialog text, or sets the text for a prompt dialog
 * @method void back()
 * @method \PHPUnit_Extensions_Selenium2TestCase_Element byCssSelector($value)
 * @method \PHPUnit_Extensions_Selenium2TestCase_Element byClassName($vaue)
 * @method \PHPUnit_Extensions_Selenium2TestCase_Element byId($value)
 * @method \PHPUnit_Extensions_Selenium2TestCase_Element byName($value)
 * @method \PHPUnit_Extensions_Selenium2TestCase_Element byXPath($value)
 * @method void clickOnElement($id)
 * @method string currentScreenshot() BLOB of the image file
 * @method void dismissAlert() Press Cancel on an alert, or does not confirm a dialog
 * @method \PHPUnit_Extensions_Selenium2TestCase_Element element(\PHPUnit_Extensions_Selenium2TestCase_ElementCriteria $criteria) Retrieves an element
 * @method array elements(\PHPUnit_Extensions_Selenium2TestCase_ElementCriteria $criteria) Retrieves an array of Element instances
 * @method string execute($javaScriptCode) Injects arbitrary JavaScript in the page and returns the last
 * @method string executeAsync($javaScriptCode) Injects arbitrary JavaScript and wait for the callback (last element of arguments) to be called
 * @method void forward()
 * @method void frame($elementId) Changes the focus to a frame in the page
 * @method void refresh()
 * @method \PHPUnit_Extensions_Selenium2TestCase_Element_Select select($element)
 * @method string source() Returns the HTML source of the page
 * @method \PHPUnit_Extensions_Selenium2TestCase_Session_Timeouts timeouts()
 * @method string title()
 * @method void|string url($url = NULL)
 * @method PHPUnit_Extensions_Selenium2TestCase_ElementCriteria using($strategy) Factory Method for Criteria objects
 * @method void window($name) Changes the focus to another window
 * @method string windowHandle() Retrieves the current window handle
 * @method string windowHandles() Retrieves a list of all available window handles
 * @method string keys() Send a sequence of key strokes to the active element.
 */