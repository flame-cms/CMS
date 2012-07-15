<?php
/**
 * SchemaPresenter.php
 *
 * @author  Jiří Šifalda <jsifalda.jiri@gmail.com>
 * @package
 *
 * @date    14.07.12
 */

namespace AdminModule;

class SchemaPresenter extends AdminPresenter
{
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $entityManager;
	/**
	 * @var Doctrine\ORM\Tools\SchemaTool
	 */
	private $schemaTool;
	/**
	 * @var array
	 */
	private $metadatas;


	public function __construct(\Doctrine\ORM\EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @return void
	 */
	public function startup()
	{
		parent::startup();

		$this->schemaTool = new \Doctrine\ORM\Tools\SchemaTool($this->entityManager);
		$this->metadatas = $this->entityManager->getMetadataFactory()->getAllMetadata();
	}



	/**
	 * Common render method.
	 * @return void
	 */
	public function beforeRender()
	{
		parent::beforeRender();
		//$this->setLayout(FALSE);
	}



	/**
	 * Gets sql query
	 *
	 * @param string $schemaAction
	 */
	public function handleGetQuery($statement)
	{
		try {
			switch ($statement) {
				case 'create':
					$this->template->query = $this->schemaTool->getCreateSchemaSql($this->metadatas);
					break;
				case 'update':
					$this->template->query = $this->schemaTool->getUpdateSchemaSql($this->metadatas);
					break;
				case 'drop':
					$this->template->query = $this->schemaTool->getDropSchemaSql($this->metadatas);
					break;

				default:
					throw new InvalidArgumentException();
					break;
			}

			$this->template->statement = $statement;
			$this->invalidateControl();

		} catch (Exception $e) {
			$this->flashMessage($e->getMessage(), 'error');
			$this->invalidateControl('flash');
		}

		if (!$this->isAjax())
			$this->redirect('this');
	}



	/**
	 * Executes sql query
	 *
	 * @param string $schemaAction
	 */
	public function handleExecuteQuery($statement)
	{
		try {
			switch ($statement) {
				case 'create':
					$this->schemaTool->createSchema($this->metadatas);
					break;
				case 'update':
					$this->schemaTool->updateSchema($this->metadatas);
					break;
				case 'drop':
					$this->schemaTool->dropSchema($this->metadatas);
					break;

				default:
					throw new InvalidArgumentException();
					break;
			}

			$this->flashMessage("$statement was successfully executed");
			$this->invalidateControl();
		} catch (Exception $e) {
			$this->flashMessage($e->getMessage(), 'error');
			$this->invalidateControl('flash');
		}

		if (!$this->isAjax())
			$this->redirect('this');
	}
}
