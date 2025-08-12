var reportAppearance = '';
var reportDistrict = '';
var reportBlockWise = '';
var reportPanchayatWise = '';
var reportVillageTownWise = '';
$(document).ready(function()
{
    let searchObj = {};
    reportAppearance={printTable: function(search_data){getpaginate(search_data,'#tblReportState',$('#tblReportState').attr('data-id'),'State Name,Status'); } }
    reportAppearance.printTable(searchObj);
    reportDistrict={printTable: function(search_data){getpaginate(search_data,'#tblReportDistrict',$('#tblReportDistrict').attr('data-id'),'District Name,Status'); } }
    reportDistrict.printTable(searchObj);
    reportBlockWise={printTable: function(search_data){getpaginate(search_data,'#tblReportBlock',$('#tblReportBlock').attr('data-id'),'Block Name,Status'); } }
    reportBlockWise.printTable(searchObj);
	reportPanchayatWise={printTable: function(search_data){getpaginate(search_data,'#tblReportPanchayat',$('#tblReportPanchayat').attr('data-id'),'Panchayat Name,Status'); } }
    reportPanchayatWise.printTable(searchObj);	
	reportVillageTownWise={printTable:function(search_data){getpaginate(search_data,'#tblReportVillageTown',$('#tblReportVillageTown').attr('data-id'),'Village/Town Name,Status'); } }
    reportVillageTownWise.printTable(searchObj);
	
	
});


