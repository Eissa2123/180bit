function ChangeAddon(item, id){
    var v = $(item).find("option[value = '" + $(item).val() + "']").text().split('-');
	if(v.length > 0){
		$("#" + id).html(v[0]);
	}
}

function Redirection(tag, duration){
	var target = $(tag).data('target');
	console.log(target);
	window.location.href = target;
}