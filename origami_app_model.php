<?php
/* SVN FILE: $Id: origami_app_model.php 7 2009-02-11 19:09:36Z josborne $ */
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
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class OrigamiAppModel extends AppModel{

    // http://cakeforge.org/snippet/detail.php?type=snippet&id=112  using v0.1.5
    // deprecated by enum code in AppController::beforeRender
    function getEnumValues($columnName=null, $tableName=null, $respectDefault=false) {
        if ($columnName==null) { return array(); } //no field specified

        //Get the name of the table
        $db =& ConnectionManager::getDataSource($this->useDbConfig);
        if(!$tableName) {
            $tableName = $db->fullTableName($this, false);
        }

        //Get the values for the specified column (database and version specific, needs testing)
        $result = $this->query("SHOW COLUMNS FROM {$tableName} LIKE '{$columnName}'");

        //figure out where in the result our Types are (this varies between mysql versions)
        $types = null;
        if     ( isset( $result[0]['COLUMNS']['Type'] ) ) { $types = $result[0]['COLUMNS']['Type']; $default = $result[0]['COLUMNS']['Default']; } //MySQL 5
        elseif ( isset( $result[0][0]['Type'] ) )         { $types = $result[0][0]['Type']; $default = $result[0][0]['Default']; } //MySQL 4
        else   { return array(); } //types return not accounted for

        //Get the values
        $values = explode("','", preg_replace("/(enum)\('(.+?)'\)/","\\2", $types) );

        if($respectDefault){
                $assoc_values = array("$default"=>Inflector::humanize($default));
                foreach ( $values as $value ) {
                        if($value==$default){ continue; }
                        $assoc_values[$value] = Inflector::humanize($value);
                }
        }
        else{
                $assoc_values = array();
                foreach ( $values as $value ) {
                        $assoc_values[$value] = Inflector::humanize($value);
                }
        }

        return $assoc_values;
    } //end getEnumValues

}
?>
