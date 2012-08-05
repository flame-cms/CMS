<?php

class NewsreelFacadeTest extends \Flame\CMS\Tests\IntegrationTestCase
{

    private $facade;

	private $repository;

    public function setUp()
    {
	    $this->facade = new \Flame\Models\Newsreel\NewsreelFacade($this->getContext()->EntityManager);

	    $this->repository = $this->getMockBuilder('\Flame\Models\Newsreel\NewsreelRepository')
		    ->disableOriginalConstructor()
		    ->getMock();
    }

	public function testGetOne()
	{
		$newsreel = $this->createNewsreel();
		$this->repository->expects($this->once())
			->method('findOneById')
			//->with(1)
			->will($this->returnValue($newsreel));

		$this->assertEquals($newsreel, $this->facade->getOne(1));
	}

//    public function testPersist()
//    {
//        $newsreelPattern = $this->createNewsreel();
//		$this->facade->persist($newsreelPattern);
//
//    }

    private function createNewsreel($date = null)
    {
        return new \Flame\Models\Newsreel\Newsreel('newsreel', 'the best test of newsreel', $date ? $date : new \DateTime());
    }
}