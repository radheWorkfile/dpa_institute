/*	
	
	INSERT INTO manage_block (district_id,block_code,block_name,description,status,create_date,created_by,created_type,modified_by,modified_type,modified_date)
	SELECT district_code,block_code,block_name,'Description about KCCI' as discription,'Active' as stats,'2024-11-21' as create_date,'1' as created_by,'3' as created_type,'NULL' as modified_by,'NULL' as modified_type,'NULL' as modified_date FROM village_master group by block_code
	
	
INSERT INTO manage_panchayat (block_id, panchayat_code,panchayat_name,description,status,create_date,created_by,created_type,modified_by,modified_type,modified_date) SELECT mb.id as block_id,vm.panchayat_code,vm.panchayat_name,'Description about KCCI' as discription,'Active' as stats,'2024-11-21 09:43:00' as create_date,'1' as created_by,'3' as created_type,'NULL' as modified_by,'NULL' as modified_type,'NULL' as modified_date FROM village_master as vm left join manage_block as mb on mb.block_code=vm.block_code GROUP by vm.panchayat_code order by vm.panchayat_name ASC	


INSERT INTO manage_village(panchayat_id,village_code,village_name,description,status,create_date,created_by,created_type,modified_by,modified_type,modified_date)
SELECT mp.id as panchayat_id, vm.village_code,vm.village_name,'Description about KCCI' as discription,'Active' as stats,'2024-11-21 09:43:00' as create_date,'1' as created_by,'3' as created_type,'NULL' as modified_by,'NULL' as modified_type,'NULL' as modified_date FROM village_master as vm left join manage_panchayat as mp on mp.panchayat_code=vm.panchayat_code GROUP by vm.village_code order by vm.village_name ASC

	
	SELECT vm.id,vm.state_id,vm.district_code,vm.block_code,vm.panchayat_code,vm.block_name vBlock,vm.panchayat_name,mb.block_name as mBlock FROM village_master as vm left join manage_block as mb on mb.block_code=vm.block_code GROUP by vm.panchayat_code order by vm.panchayat_name ASC 
	
*/	