<?php
/* SVN FILE: $Id: origami_app_controller.php 7 2009-02-11 19:09:36Z josborne $ */
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

/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 */
class OrigamiAppController extends AppController {
    var $helpers = array('Html', 'Javascript', 'List');
    var $components = array('RequestHandler');

    /**
     * beforeFilter is used for url pre-processing before passing
     * to a view/layout.
     * Set up json and png handlers
     */
    function beforeFilter() {
        $this->RequestHandler->setContent('json', 'text/x-json');
        $this->RequestHandler->setContent( 'pdf', 'application/pdf' );
        $this->RequestHandler->setContent( 'png', 'image/png' );
        $this->RequestHandler->setContent( 'jpg', 'image/jpeg' );
    }

    /**
     * beforeRender is used for pre-render processing.
     * Search the model schema for enum fields and transform
     * them to use selects instead of text-input boxes
     *
     * During the model loop, we also check for form validation
     * errors, and add them to an array, so that we can consolidate
     * errors at the top of the page.
     *
     * This code is probably Mysql specific.
     */
    function beforeRender() {
        $this->_persistValidation();

        $validationErrors = array();

        foreach($this->modelNames as $model) {
            // add validationerrors to view
            if(is_array($this->{$model}->validationErrors)) {
                $validationErrors = array_merge($validationErrors, array_values($this->{$model}->validationErrors));
            }

            // enum fixer
            foreach($this->$model->_schema as $var => $field) {

                // === used here because 0 != FALSE
                if(strpos($field['type'], 'enum') === FALSE)
                    continue;

                preg_match_all("/\'([^\']+)\'/", $field['type'], $strEnum);

                if(is_array($strEnum[1])) {
                    $varName = Inflector::camelize(Inflector::pluralize($var));
                    $varName[0] = strtolower($varName[0]);

                    // make nice cases in <selects>
                    $names = array();
                    foreach($strEnum[1] as $name) {
                        $names[] = ucwords(strtolower($name));
                    }

                    $this->set($varName, array_combine($strEnum[1], $names));
                }
            }
        }

        $this->set('validationErrors', $validationErrors);
    }

    /**
      * Called with some arguments (name of default model, or model from var $uses),
      * models with invalid data will populate data and validation errors into the session.
      *
      * Called without arguments, it will try to load data and validation errors from session
      * and attach them to proper models. Also merges $data to $this->data in controller.
      *
      * @author poLK
      * @author drayen aka Alex McFadyen
      *
      * Licensed under The MIT License
      * @license            http://www.opensource.org/licenses/mit-license.php The MIT License
      */
      function _persistValidation() {
            $args = func_get_args();

            if (empty($args)) {
                if ($this->Session->check('Validation')) {
                    $validation = $this->Session->read('Validation');
                    $this->Session->del('Validation');
                    foreach ($validation as $modelName => $sessData) {
                        if (in_array($modelName, $this->modelNames)) {
                            $Model =& $this->{$modelName};
                        } elseif (ClassRegistry::isKeySet($modelName)) {
                            $Model =& ClassRegistry::getObject($modelName);
                        } else {
                            continue;
                        }

                        $Model->validationErrors = $sessData['validationErrors'];
                        if(isset($sessData['data'])) {
                            $Model->data = $sessData['data'];
                            $this->data = Set::merge($sessData['data'],$this->data);
                        }
                    }
                }
            } else {
                foreach($args as $modelName) {
                    if (in_array($modelName, $this->modelNames) && !empty($this->{$modelName}->validationErrors)) {
                            $this->Session->write('Validation.'.$modelName, array(
                                'controller' => $this->name,
                                'data' => $this->{$modelName}->data,
                                'validationErrors' => $this->{$modelName}->validationErrors
                            ));
                    }
                }
            }
        }
}
?>
