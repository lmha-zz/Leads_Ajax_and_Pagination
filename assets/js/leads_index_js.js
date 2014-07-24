$(document).ready(function(){

	var url = $('#limitSearchForm').attr('action');

	$(document).on('submit', '#limitSearchForm', function(){
		$.post($(this).attr('action'),
			$(this).serialize(),
			function(data){
				displayData(data);
				$('#limitSearchForm').attr('action', url);
			}, 'json');
		return false;
	})
	$(document).on('keyup change', 'input', function(){		
		$('#limitSearchForm').submit();
	})
	$(document).on('click', 'a', function(){
		var href = $(this).attr('href');
		var hash = href.split("/", 3);
		var limit = hash[2];
		var temp = url+"/"+limit;
		$('#limitSearchForm').attr('action', temp);
		$('#limitSearchForm').submit();
		return false;		
	})
	function displayData(data) {
		$('#pagination').html(data.pagination);
		var leads = "";
		for (var i = 0; i < (data.leads).length; i++) {
			leads+= "<tr>\n"+
						"<td class='text-center'>"+data.leads[i].leads_id+"</td>\n"+
						"<td>"+data.leads[i].first_name+"</td>\n"+
						"<td>"+data.leads[i].last_name+"</td>\n"+
						"<td class='text-center'>"+data.leads[i].registered_datetime+"</td>\n"+
						"<td>"+data.leads[i].email+"</td>\n"+
					"</tr>\n";
		};
		$('#leadsWrapper').html(leads);
	}
})