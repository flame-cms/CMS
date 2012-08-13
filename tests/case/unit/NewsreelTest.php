<?php

use Flame\CMS\Models\Newsreel\Newsreel;

class NewsreelTest extends \Flame\CMS\Tests\IntegrationTestCase
{
    public function testConstruction()
    {
        $newsreel = new Newsreel('title', 'content', new \Datetime());
        $this->assertInstanceOf('\Flame\CMS\Models\Newsreel\Newsreel', $newsreel);
    }

    public function testGetters()
    {
        $date = new \Datetime();
        $newsreel = new Newsreel('title', 'content', $date);

        $this->assertEquals(null, $newsreel->getId());
        $this->assertEquals('title', $newsreel->getTitle());
        $this->assertEquals('content', $newsreel->getContent());
        $this->assertEquals($date, $newsreel->getDate());
        $this->assertEquals(0, $newsreel->getHit());
    }

    public function testSetterTitle()
    {
        $newsreel = new Newsreel('title', 'content', new \Datetime());
        $newsreel->setTitle('new title');

        $this->assertEquals('new title', $newsreel->getTitle());
    }

    public function testSetterContent()
    {
        $newsreel = new Newsreel('title', 'content', new \Datetime());
        $newsreel->setContent('new content');

        $this->assertEquals('new content', $newsreel->getContent());
    }

    public function testSetterDate()
    {
        $date = new \Datetime();

        $newsreel = new Newsreel('title', 'content', new \Datetime());
        $newsreel->setDate($date);

        $this->assertEquals($date, $newsreel->getDate());
    }

    public function testSetterHit()
    {
        $newsreel = new Newsreel('title', 'content', new \Datetime());
        $newsreel->setHit(6);

        $this->assertEquals(6, $newsreel->getHit());
    }

    public function testToArray()
    {
        $date = new \Datetime();

        $newsreel = new Newsreel('title', 'content', $date);
        $array = $newsreel->toArray();

        $this->assertCount(5, $array);
        $this->assertEquals('title', $array['title']);
        $this->assertEquals('content', $array['content']);
        $this->assertEquals($date, $array['date']);
        $this->assertEquals(0, $array['hit']);
    }
}