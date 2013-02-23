<?php
class ProjectTest extends CDbTestCase
{
    public $fixtures = array(
        'projects' => 'Project',
        'users' => 'User',
        'projAndUsrAssign' =>':tbl_project_user_assignment'
    );
    public function testCRUD()
    {
        // create
        $p = new Project();
        $name = 'test project 1';
        $p->setAttributes(array(
            'name' => $name,
            'description' => 'test project description',
            'create_time' => '2012-01-01 00:00:00',
            'create_user_id' => '1',
            'update_time' => '2012-01-01 00:00:00',
            'update_user_id' => '1',
        ));
        $this->assertTrue($p->save(false));
        
        // read
        $p2 = Project::model()->findByPk($p->id);
        $this->assertTrue($p2 instanceof Project);
        $this->assertEquals($p2->id, $p->id);
        // update
        $name = 'test project 2';
        $p2->name = $name;
        $p2->save(false);
        
        $p3 = Project::model()->findByPk($p2->id);
        $this->assertTrue($name === $p3->name);
        
        // delete
        $this->assertTrue($p3->delete());
        
        $this->assertEquals($this->projects['qwerty']['name'], 'test project 1');
    }
    public function testGetUserOptions()
    {
        $project = $this->projects('qwerty');
        $options = $project->getUserOptions();
        $this->assertTrue(is_array($options));
    }
}