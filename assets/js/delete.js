$(document).ready(function(){
	$('.delete').click(function(){
		var el = this;
		var delete_id = $(this).data('id');


		bootbox.confirm('Do you really want to delete record?', function(result){
			if (result) {
				$.ajax({
					url:'user_delete.php',
					type:'POST',
					data:{
						/*action:'delete_user',*/
						id : delete_id,
					},
					success : function(response){
						
						if (response == 1) {

							$(el).closest('tr');
							$(el).closest('tr').fadeOut(800,function(){
								$(this).remove();
							});
							Toaster.delete_data();
						}else{
							alert("Data not delete");
						}
						
					},
				});
			}
		})
	});
});