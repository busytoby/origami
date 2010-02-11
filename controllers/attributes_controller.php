<?php
/* SVN FILE: $Id: attributes_controller.php 13 2009-02-24 23:08:00Z andy.fowler $ */
/**
 * Origami(tm) :  CakePHP Data Management Framework
 * Copyright 2007-2009, EAS Technologies LLC
 * Licensed under The GNU Affero General Public License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2007-2009, EAS Technologies LLC
 * @link          http://thechaw.com/origami Origami(tm) Project
 * @since         Origami(tm) v 0.8.9
 * @version       $Revision: 13 $
 * @modifiedby    $LastChangedBy: andy.fowler $
 * @lastmodified  $Date: 2009-02-24 18:08:00 -0500 (Tue, 24 Feb 2009) $
 * @license       http://www.fsf.org/licensing/licenses/agpl-3.0.html The GNU Affero General Public License
 */

class AttributesController extends OrigamiAppController {
    var $name = 'Attributes';
    var $helpers = array('Html', 'Form');
    var $paginate = array('limit' => 500);

    function index() {
        $this->Attribute->recursive = 0;
        $this->set('attributes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Attribute.', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->set('attribute', $this->Attribute->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Attribute->create();
            if ($this->Attribute->save($this->data)) {
                $this->Session->setFlash(__('The Attribute has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Attribute could not be saved. Please, try again.', true));
            }
        }
        $datatypes = $this->Attribute->Datatype->find('list');
        $this->set(compact('datatypes'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Attribute', true));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->Attribute->save($this->data)) {
                $this->Session->setFlash(__('The Attribute has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Attribute could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Attribute->read(null, $id);
        }
        $datatypes = $this->Attribute->Datatype->find('list');
        $this->set(compact('datatypes'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Attribute', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Attribute->del($id)) {
            $this->Session->setFlash(__('Attribute deleted', true));
            $this->redirect(array('action'=>'index'));
        }
    }

}
?>
