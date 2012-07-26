<?php

require LIBS_DIR . '/jsifalda/flame/Flame/Models/Newsreel/NewsreelFacade.php';

use Flame\Models\Newsreel\NewsreelRepository,
	Flame\Models\Newsreel\Newsreel,
	Flame\Models\Newsreel\NewsreelFacade;

class NewsreelFacadeTest extends UnitTestCase
{
    private $repository;

    private $facade;

    public function setUp()
    {

        $this->repository = $this->getMockBuilder('\Flame\Models\Newsreel\NewsreelRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $this->facade = new NewsreelFacade($this->repository);

	    exit('sdf');

    }

    public function testGetOne()
    {
        $newsreelPattern = $this->createNewsreel();
        $this->repository->expects($this->once())
            ->method('getOne')
            ->with(1)
            ->will($this->returnValue($newsreelPattern));

        $this->assertEquals($newsreelPattern, $this->facade->getOne(1));
    }

    public function testLastnewsreel()
    {
        $newsreelPattern = $this->createNewsreel();

        $this->repository->expects($this->once())
            ->method('getLastNewsreel')
            ->will($this->returnValue(array($newsreelPattern)));

        $newsreel = $this->facade->getLastNewsreel();
        $this->assertEquals(1, count($newsreel));
        $this->assertEquals($newsreelPattern, $newsreel[0]);
    }

    private function createNewsreel()
    {
        return new Newsreel(1, 'newsreel', 'the best test of newsreel', new \DateTime(), 0);
    }
}