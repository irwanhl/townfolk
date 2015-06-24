function delete_member(full_name,id_user)
{
	var answer;
	
	answer=confirm("Are you sure to delete member '"+full_name+"' ");
	if(answer)
	{
		var url="http://localhost/rpl/index.php/admin/delete_member/"+id_user;
		window.location=url;
		//alert("Berhasil dihapus");
	}
	else{
		alert("Delete Cancel");
        }
}

function delete_admin(full_name,id_user){
    
        var answer;
	
	answer=confirm("Are you sure to delete admin '"+full_name+"' ");
	if(answer)
	{
		var url="http://localhost/rpl/index.php/admin/delete_admin/"+id_user;
		window.location=url;
		//alert("Berhasil dihapus");
	}
	else{
		alert("Delete Cancel");
        }
}