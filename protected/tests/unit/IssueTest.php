<?php
class IssueTest extends CDbTestCase
{
    public $fixtures = array(
        'projects' => 'Project',
        'issues' => 'Issue'
    );
    public function testGetTypes()
    {
        $options = Issue::model()->typeOptions;
        $this->assertTrue(is_array($options));
        
        $this->assertTrue(count($options) == 3);
        $this->assertTrue(in_array('Баг', $options));
        $this->assertTrue(in_array('Фишка', $options));
        $this->assertTrue(in_array('Задача', $options));
    }
    public function testGetStatusText()
    {
        $this->assertTrue('В процессе' == $this->issues('issueBug')->getStatusText());
    }
    public function testGetTypeText()
    {
        $this->assertTrue('Баг' == $this->issues('issueBug')->getTypeText());
    }
}