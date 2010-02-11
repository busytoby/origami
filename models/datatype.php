<?php
/* SVN FILE: $Id: datatype.php 8 2009-02-11 19:35:44Z josborne $ */
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
 * @version       $Revision: 8 $
 * @modifiedby    $LastChangedBy: josborne $
 * @lastmodified  $Date: 2009-02-11 14:35:44 -0500 (Wed, 11 Feb 2009) $
 * @license       http://www.fsf.org/licensing/licenses/agpl-3.0.html The GNU Affero General Public License
 */

class Datatype extends OrigamiAppModel {

    var $name = 'Datatype';

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $hasMany = array(
            'Attribute' => array('className' => 'Attribute',
                                'foreignKey' => 'datatype_id',
                                'dependent' => false,
                                'conditions' => '',
                                'fields' => '',
                                'order' => '',
                                'limit' => '',
                                'offset' => '',
                                'exclusive' => '',
                                'finderQuery' => '',
                                'counterQuery' => ''
            )
    );

}
?>
