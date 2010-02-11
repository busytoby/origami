<?php
/* SVN FILE: $Id: datatypes_controller.php 7 2009-02-11 19:09:36Z josborne $ */
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
 * @version       $Revision: 7 $
 * @modifiedby    $LastChangedBy: josborne $
 * @lastmodified  $Date: 2009-02-11 14:09:36 -0500 (Wed, 11 Feb 2009) $
 * @license       http://www.fsf.org/licensing/licenses/agpl-3.0.html The GNU Affero General Public License
 */

class DatatypesController extends AppController {
    var $name = 'Datatypes';
    var $helpers = array('Html', 'Form');

    function index() {
        $this->Datatype->recursive = 0;
        $this->set('datatypes', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Datatype.', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->set('datatype', $this->Datatype->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Datatype->create();
            if ($this->Datatype->save($this->data)) {
                $this->Session->setFlash(__('The Datatype has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Datatype could not be saved. Please, try again.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Datatype', true));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->Datatype->save($this->data)) {
                $this->Session->setFlash(__('The Datatype has been saved', true));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Datatype could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Datatype->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Datatype', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Datatype->del($id)) {
            $this->Session->setFlash(__('Datatype deleted', true));
            $this->redirect(array('action'=>'index'));
        }
    }

    function generatevalidationproc() {
        if (!empty($this->data)) {
            $validation_array_string = '$validation_array = ' . $this->data['Datatype']['validation_array'] . ';';
            eval($validation_array_string);
            $this->data['Datatype']['validation_array'] = serialize($validation_array);
        }
    }

}
?>
