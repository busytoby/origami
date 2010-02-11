delete duplicate eav_text/etc rows:
delete from eav_text using eav_text INNER join eav_data e1 on e1.value_id = eav_text.id INNER join 
eav_data e2 on e2.entity_id = e1.entity_id AND e2.attribute_id = e1.attribute_id INNER join eav_text 
v2 on v2.id = e2.value_id where eav_text.value = v2.value and eav_text.id != v2.id;

drop null data entries:
delete from eav_data using eav_data left join eav_varchars ev on ev.id = eav_data.value_id where 
(eav_data.attribute_id = '005e7baa-df49-11dd-a912-001aa0c930f8' or eav_data.attribute_id = 
'fc120094-df48-11dd-a912-001aa0c930f8') AND ev.id IS NULL;
