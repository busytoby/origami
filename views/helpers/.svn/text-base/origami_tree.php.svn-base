<?php
/**
 * Origami Image Helper
 * @author jas Osborne
 */
class OrigamiTreeHelper extends AppHelper {

    var $helpers = array('Html', 'Javascript');

    function setupButtons($buttonData) {
        $code = "$(document).ready(function() { \n";

        foreach($buttonData as $func => $target) {
            $funcName = Inflector::camelize($func);
            $code .= "origamiTree.init{$funcName}Button('{$target}');\n";
        }

        $code .= "});\n";
        $this->Javascript->codeBlock($code, array('inline' => false));
    }

    function setupEditor($editorData, $productData) {
        $code = "$(document).ready(function() { \n";
        $code .= "$('#node_editor').append('<select id=\"editor_field\" />');\n";
        $code .= "$('#editor_field').bind('change', function() { origamiTree.changeEditField(); });\n";

        foreach($editorData as $field => $type) {
            $code .= "$('#editor_field').append('<option value=\"{$field}\">{$field}</option>');\n";
            if($type == "textarea") {
                $code .= "$('#node_editor').append('<textarea name=\"{$field}\" id=\"{$field}_editor\" class=\"node_textarea\" />');\n";
            } else {
                $code .= "$('#node_editor').append('<input type=\"text\" name=\"{$field}\" id=\"{$field}_editor\" class=\"node_text\" />');\n";
            }
        }

        if($productData) $code .= $this->setupProductSelector($productData);

        $code .= "$('#node_editor').append('<input type=\"button\" id=\"submit_edit\" value=\"Apply\" />');\n";
        $code .= "$('#submit_edit').bind('click', function() { origamiTree.applyEdit(); });\n";
        $code .= "$('#editor_field').children().each(function() { $('#' + this.value + '_editor').hide(); });\n";
        $code .= "size_me(sidewidth);\n";
        $code .= "});\n";
        $this->Javascript->codeBlock($code, array('inline' => false));
    }

    function setupProductSelector($productData) {
        $code = "$('#editor_field').append('<option value=\"product_id\">product_id</option>');\n";
        $code .= "$('#node_editor').append('<select name=\"product_id\" id=\"product_id_editor\" class=\"node_select\">');\n";
        $code .= "$('#product_id_editor').append('<option value=\"\"></option>');\n";

        /* refactor later or move ListHelper into the plugin -jas */
        App::import('Helper', 'List');
        $list = new ListHelper();

        foreach($list->pseudoProducts() as $ppId => $ppString) {
            $code .= "$('#product_id_editor').append('<option value=\"{$ppId}\">{$ppString}</option>');\n";
        }

        foreach($productData as $pid => $pname) {
            $pname = str_replace("'", "\'", $pname);
            $code .= "$('#product_id_editor').append('<option value=\"{$pid}\">{$pname}</option>');\n";
        }

        $code .= "$('#node_editor').append('</select>');\n";
        return($code);
    }

    function setupSearch($searchText) {
        $code = "$(document).ready(function() { \n";
        $code .= "origamiTree.initSearch('{$searchText}');\n";
        $code .= "});\n";
        $this->Javascript->codeBlock($code, array('inline' => false));
    }

    function addNodes($node_data = null, $parent_id = -1) {
        if(empty($node_data['QualificationQuestion']) ||
          (!empty($node_data['QualificationQuestion']['parent_id']) && $parent_id == -1)) {
            return false;
        }

        $qdata = array(
            'id' => $node_data['QualificationQuestion']['id'],
            'question' => urlencode($node_data['QualificationQuestion']['question']),
            'explanation' => urlencode($node_data['QualificationQuestion']['explanation']),
            'parent_answer' => urlencode($node_data['QualificationQuestion']['parent_answer']),
            'product_id' => urlencode($node_data['QualificationQuestion']['product_id']),
            'data_id' => urlencode($node_data['QualificationQuestion']['data_id'])
        );

        if($qdata['id'] == null)
            $qdata['id'] = 0;

        $code = "";

        if($parent_id == -1) {
            $code .= "$(document).ready(function() {\n";
        }
        $code .= "add_node(null, {$qdata['id']}, {$parent_id}, true);\n";
        $qJSON = $this->Javascript->object($qdata);
        $code .= "update_node_text({$qdata['id']}, {$qJSON});\n";

        foreach($node_data['children'] as $child_node) {
            $code .= $this->addNodes($child_node, $qdata['id']);
        }

        if($parent_id == -1) {
            $code .= "origamiTree.update();\ngenerate_thumbnail();\n});\n";
            $this->Javascript->codeBlock($code, array('inline' => false));
        } else {
            return $code;
        }
    }
}
?>
