<?php

class NewsreelFacadeTest extends \Flame\CMS\Tests\IntegrationTestCase
{

    private $facade;

    public function setUp()
    {
	    $this->facade = $this->getMock(
		    '\Flame\CMS\Models\Newsreel\NewsreelFacade',
		    array(),
		    array($this->getContext()->EntityManager)
	    );
    }

	public function testGetOne()
	{
		$newsreel = $this->createNewsreel();
		$this->facade->expects($this->once())
			->method('getOne')
			->with(1)
			->will($this->returnValue($newsreel));

		$this->assertEquals($newsreel, $this->facade->getOne(1));
	}

	public function testGetLastNewsreel()
	{
		$newsreel = $this->createNewsreel();
		$this->facade->expects($this->once())
			->method('getLastNewsreel')
			->will($this->returnValue(array($newsreel)));

		$newsreels = $this->facade->getLastNewsreel();
		$this->assertCount(1, $newsreels);
		$this->assertEquals($newsreel, $newsreels[0]);

	}

    private function createNewsreel($date = null)
    {
        return new \Flame\CMS\Models\Newsreel\Newsreel('newsreel', 'the best test of newsreel', $date ? $date : new \DateTime());
    }
}