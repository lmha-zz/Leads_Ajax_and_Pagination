$(document).ready(function(){
	$(document).on('click', 'a', function(){
		$.post($(this).attr('href'),
			function(data) {
				console.log(data);
				displayData(data);
			}, 'json');
		return false;
	})
	$(document).on('submit', '#limitSearchForm', function(){
		$.post($(this).attr('action'),
			$(this).serialize(),
			function(data){
				displayData(data);
			}, 'json');
		return false;
	})
	$(document).on('keyup change', 'input', function(){
		$(this).parent().parent().submit();
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