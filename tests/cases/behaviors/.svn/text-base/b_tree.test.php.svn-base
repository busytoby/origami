<?php
App::import('Behavior', 'Origami.BTree');

class BArticle extends CakeTestModel {
    public $useTable = 'b_articles';
    public $actsAs = array('Origami.BTree' => array('config' => 'notused'));
}

/**
 * BTree test case
 *
 */
class BTreeTest extends CakeTestCase {

/**
 * Model acting like the tested behavior
 *
 * @var BArticle
 * @access public
 */
    public $Model = null;

/**
 * Behavior being tested
 *
 * @var BTreeBehavior
 * @access public
 */
    public $Behavior = null;

/**
 * Fixtures
 *
 * @var array
 * @access public
 */
    public $fixtures = array('plugin.origami.b_article');

/**
 * Start test method
 *
 * @return void
 * @access public
 */
    public function startTest($method) {
        parent::startTest($method);
        $this->Model = new BArticle();
        $this->Behavior = $this->Model->Behaviors->BTree;
    }

/**
 * Destroy the model instance
 *
 * @return void
 * @access public
 */
    public function endTest($method) {
        parent::endTest($method);
        unset($this->Model, $this->Behavior);
        ClassRegistry::flush();
    }

    public function testSave() {
        $data = array(
            $this->Model->alias => array(
                'title' => 'New Article',
                'parent_id' => 1
            )
        );

        $this->Model->create($data);

        $res = $this->Model->save();

        $expected = $data;
        $expected[$this->Model->alias]['modified'] = $res[$this->Model->alias]['modified'];
        $expected[$this->Model->alias]['created'] = $res[$this->Model->alias]['created'];
        $expected[$this->Model->alias]['lft'] = 65542;
        $expected[$this->Model->alias]['rght'] = 65543;

        $this->assertEqual($expected, $res);
    }

    public function testReparent() {
        $this->testSave();
        $data = array(
            $this->Model->alias => array(
                'id' => 5,
                'title' => 'New Article Reparented',
                'parent_id' => 3
            )
        );

        $res = $this->Model->save($data);

        $res = $this->Model->findById(5);
        $expected = $data;
        $expected[$this->Model->alias]['modified'] = $res[$this->Model->alias]['modified'];
        $expected[$this->Model->alias]['created'] = $res[$this->Model->alias]['created'];
        $expected[$this->Model->alias]['lft'] = 65540;
        $expected[$this->Model->alias]['rght'] = 65541;

        $this->assertEqual($expected, $res);
    }

    public function testReparentWithSubtree() {
        $this->testReparent();
        $data = array(
            $this->Model->alias => array(
                'id' => 3,
                'title' => 'New Article Reparented',
                'parent_id' => 1
            )
        );

        $res = $this->Model->save($data);

        $res = $this->Model->findById(3);
        $expected = $data;
        $expected[$this->Model->alias]['modified'] = $res[$this->Model->alias]['modified'];
        $expected[$this->Model->alias]['created'] = $res[$this->Model->alias]['created'];
        $expected[$this->Model->alias]['lft'] = 65540;
        $expected[$this->Model->alias]['rght'] = 65543;

        $this->assertEqual($expected, $res);
    }

    public function testDelete() {
        $this->assertTrue($this->Model->findById(3));
        $this->Model->delete(3);
        $this->assertFalse($this->Model->findById(3));
    }

    public function testCreateNewTree() {
        $data = array(
            $this->Model->alias => array(
                'title' => 'New Tree',
            )
        );

        $this->Model->create($data);

        $res = $this->Model->save();

        $expected = $data;
        $expected[$this->Model->alias]['modified'] = $res[$this->Model->alias]['modified'];
        $expected[$this->Model->alias]['created'] = $res[$this->Model->alias]['created'];
        $expected[$this->Model->alias]['lft'] = 196609;
        $expected[$this->Model->alias]['rght'] = 196610;

        $this->assertEqual($expected, $res);
    }

    public function testMoveDown() {
        $this->testReparentWithSubtree();
        $this->assertTrue($this->Model->movedown(2));

        $data = array(
            $this->Model->alias => array(
                'id' => 2,
                'title' => 'First article - child 1',
                'parent_id' => 1
            )
        );

        $res = $this->Model->findById(2);
        $expected = $data;
        $expected[$this->Model->alias]['modified'] = $res[$this->Model->alias]['modified'];
        $expected[$this->Model->alias]['created'] = $res[$this->Model->alias]['created'];
        $expected[$this->Model->alias]['lft'] = 65542;
        $expected[$this->Model->alias]['rght'] = 65543;

        $this->assertEqual($expected, $res);
    }

    public function testMoveUp() {
        $this->testMoveDown();
        $this->assertTrue($this->Model->moveup(2));

        $data = array(
            $this->Model->alias => array(
                'id' => 2,
                'title' => 'First article - child 1',
                'parent_id' => 1
            )
        );

        $res = $this->Model->findById(2);
        $expected = $data;
        $expected[$this->Model->alias]['modified'] = $res[$this->Model->alias]['modified'];
        $expected[$this->Model->alias]['created'] = $res[$this->Model->alias]['created'];
        $expected[$this->Model->alias]['lft'] = 65538;
        $expected[$this->Model->alias]['rght'] = 65539;

        $this->assertEqual($expected, $res);
    }

    public function testBreakVerifyAndRecover() {
        $this->assertEqual($this->Model->verify(), 1);
        $data = array(
            $this->Model->alias => array(
                'id' => 1,
                'title' => 'Broken root',
                'parent_id' => null,
                'lft' => 54252,
                'rght' => 43279842
            )
        );
        $this->assertTrue($this->Model->save($data));

        $this->assertNotEqual($this->Model->verify(), 1);
        $this->assertEqual($this->Model->recover(), 1);
        $this->assertEqual($this->Model->verify(), 1);
    }

    public function testRemoveFromTree() {
        $this->assertTrue($this->Model->removefromtree(2));
        $res1 = $this->Model->findById(2);
        $res2 = $this->Model->findById(3);

        $exp1 = array(
            $this->Model->alias => array(
                'id' => 2,
                'title' => 'First article - child 1',
                'parent_id' => null,
                'lft' => 196608,
                'rght' => 196609
            )
        );
        $exp1[$this->Model->alias]['modified'] = $res1[$this->Model->alias]['modified'];
        $exp1[$this->Model->alias]['created'] = $res1[$this->Model->alias]['created'];

        $exp2 = array(
            $this->Model->alias => array(
                'id' => 3,
                'title' => 'First article - child 1 - subchild 1',
                'parent_id' => 1,
                'lft' => 65538,
                'rght' => 65539
            )
        );
        $exp2[$this->Model->alias]['modified'] = $res2[$this->Model->alias]['modified'];
        $exp2[$this->Model->alias]['created'] = $res2[$this->Model->alias]['created'];

        $this->assertEqual($res1, $exp1);
        $this->assertEqual($res2, $exp2);
    }

    public function testRemoveFromTreeAndDelete() {
        $this->assertTrue($this->Model->removefromtree(2, true));
        $res1 = $this->Model->findById(2);
        $res2 = $this->Model->findById(3);

        $this->assertEqual($res1, null);
        $this->assertEqual($res2, null);
    }

/**
 * Test beforeSave method
 *
 * @TODO Assert lft / rght values
 * @return void
 * @access public
 */
    public function testBeforeSave() {
        $data = array(
            $this->Model->alias => array(
                'title' => 'Third article',
                'parent_id' => 3));
        $this->Model->data = $data;
        $this->assertTrue($this->Behavior->beforeSave($this->Model));
    }

    public function testReorder() {
        $beforeData = $this->Model->find('all');
        $this->Model->reorder();
        $afterData = $this->Model->find('all');

        $this->assertEqual($beforeData, $afterData);
    }

/**
 * Test children method
 *
 * @return void
 * @access public
 */
    public function testChildren() {
        $result = $this->Model->children(false, true);
        $this->assertEqual(Set::extract('/BArticle/id', $result), array(1, 4));

        $this->Model->id = 1;
        $result = $this->Model->children();
        $this->assertEqual(Set::extract('/BArticle/id', $result), array(2, 3));
    }

/**
 * Test generatetreelist method
 *
 * @return void
 * @access public
 */
    public function testGeneratetreelist() {
        $result = $this->Model->generatetreelist();
        $expected = array(
            1 => 'First article',
            2 => '_First article - child 1',
            3 => '__First article - child 1 - subchild 1',
            4 => 'Second article');
        $this->assertEqual($result, $expected);
    }

/**
 * Test getparentnode method
 *
 * @return void
 * @access public
 */
    public function testGetParentNode() {
        $result = $this->Model->getparentnode(2);
        $this->assertEqual($result['BArticle']['id'], 1);

        $result = $this->Model->getparentnode(3);
        $this->assertEqual($result['BArticle']['id'], 2);
    }

/**
 * Test getparentnode method
 *
 * @return void
 * @access public
 */
    public function testGetPath() {
        $result = $this->Model->getpath(3);
        $this->assertEqual(Set::extract('/BArticle/id', $result), array(1, 2, 3));
    }

/**
 * Test getparentnode method
 *
 * @return void
 * @access public
 */
    public function testChildcount() {
        $this->assertEqual($this->Model->childcount(1, true), 1);
        $this->assertEqual($this->Model->childcount(1, false), 2);
    }

}
