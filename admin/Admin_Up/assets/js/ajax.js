$(document).ready(function() {

	"use strict";
	/*----------------------------------------
					User.
	-----------------------------------------*/
	/*------------Add user----------------*/
	$('.form-add-user').on('submit', function(e){

		var name 		= $('#userName').val();
		var position 	= $('#position').val();
		var email    	= $('#emailAddress').val();
		var phone   	= $('#phone').val();
		var passw   	= $('#pass1').val();
		var address   	= $('#address').val();
		var action 		= 'add';
		
		$.post('server/users/action.php', {action: action, name: name, position: position, email: email, phone: phone, passw: passw, address: address}, function(data) {
			
			if (data == 'you added successfully') {

				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"you added successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=user';
				});
			}
		});
		
		e.preventDefault();
	});


	/*-------------Select (form-update) user--------------*/
	$(document).on('click', '.update-user', function(e) {
		
		
		var id = $(this).attr('id');
		var action = 'select';

		$.ajax({
			url: 'server/users/action.php',
			type: 'POST',
			dataType: 'json',
			data: {action: action, id: id},
		})
		.done(function(data) {

			var name 		= '';
			var position 	= '';
			var email  		= '';
			var phone  		= '';
			var status  	= '';
			var address  	= '';
			var getID		= '';

			$.each(data,function(index, val) {
				// l&#7845;y id.
				getID += `<input value="`+ val['id_user'] +`" type="" name="" class="inp-id-user" hidden>`;

				// name.
				name += `
					<input type="text" value= "`+ val['name'] +`" name="nick" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName-update">`;

              	// tìm ch&#7913;c v&#7909;.	
        		if (val['role'] == 1) {

        			position += `<option value="1">Nhân Viên</option>`;
        			position += `<option value="2">Admin</option>`;
        			position += `<option value="3">Supper Admin</option>`;

        		} else if(val['role'] == 2) {

        			position += `<option value="2">Admin</option>`;
        			position += `<option value="3">Supper Admin</option>`;
        			position += `<option value="1">Nhân Viên</option>`;

        		} else  if (val['role'] == 3) {

        			position += `<option value="3">Supper Admin</option>`;
        			position += `<option value="2">Admin</option>`;
        			position += `<option value="1">Nhân Viên</option>`;
        		} else {

        			position += `<option value="1">Nhân Viên</option>`;
        			position += `<option value="2">Admin</option>`;
        			position += `<option value="3">Supper Admin</option>`;
        		}

        		// email.
        		email += `
        			<input type="email" name="email" value="`+ val['email'] +`" parsley-trigger="change" required="" placeholder="Enter email" class="form-control" id="emailAddress-update">`;
                // phone.
                phone += `
                	<input type="number" name="phone" value="`+ val['phone'] +`" parsley-trigger="change" required="" placeholder="Enter phone" class="form-control" id="phone-update">`;
                // tìm status.
                if (val['status'] == 1) {

                	status += `<option value="1">Active</option>`;
                	status += `<option value="0">Look</option>`;
                } else {

                	status += `<option value="0">Lock</option>`;
                	status += `<option value="1">Active</option>`;
                }

                // address.
                address += `<input required="" class="form-control" id="address-update" value="`+ val['address'] +`"></input>`;
			});

			// d&#7919; li&#7879;u tr&#7843; v&#7873;.
			$('#get-id-user').html(getID);
			$('#data-name-user').html(name);
			$('#data-positon-user').html(position);
			$('#data-email-user').html(email);
			$('#data-phone-user').html(phone);
			$('#data-status-user').html(status);
			$('#data-address-user').html(address);
		})

	});

	/*------------Update user--------------*/
	$(document).on('submit', '.form-update-user', function(e) {

		var id          = $('.inp-id-user').val();
		var name 		= $('#userName-update').val();
		var position 	= $('#data-positon-user').val();
		var email    	= $('#emailAddress-update').val();
		var phone   	= $('#phone-update').val();
		var passw   	= $('#pass1-update').val();
		var status   	= $('#data-status-user').val();
		var address   	= $('#address-update').val();
		var action 		= 'update';

		$.post('server/users/action.php', {action: action, name: name, position: position, email: email, phone: phone, passw: passw, address: address, status: status, id: id}, function(data) {
			
			if (data == 'you updated successfully') {

				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"you updated successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=user';
				});
			}
		});

		e.preventDefault();
	});

	/*------------Delete user---------------*/
	$(document).on('click', '.delete-user', function(e) {

		var id 		= $(this).attr('id');
		var action  = 'delete';

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		// nó &#273;&#7841;i di&#7879;n cho confirm (Yes/No).
		$('.swal2-confirm').click(function() {

			$.post('server/users/action.php', {action: action, id: id}, function(data) {
				
				if (data == "you deleted successfully") {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=user';
					});
				}
			});
		});
		e.preventDefault();
	});



	/*----------------------------------------
					Member.
	-----------------------------------------*/
	/*--------------Add member------------*/
	$('.form-add-member').on('submit',function(e){

		var name 		= $('#name-member').val();
		var email    	= $('#email-member').val();
		var phone   	= $('#phone-member').val();
		var passw   	= $('#pass1-member').val();
		var address   	= $('#address-member').val();
		var action 		= 'add';
		
		$.post('server/members/action.php', {action: action, name: name, email: email, phone: phone, passw: passw, address: address}, function(data) {
			
			if (data == 'you added successfully') {

				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"you added successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=member';
				});
			}
		});

		e.preventDefault();
	})

	/*-------------Select (form-update) Member--------------*/
	$(document).on('click', '.update-member', function(e) {
		
		
		var id = $(this).attr('id');
		var action = 'select';

		$.ajax({
			url: 'server/members/action.php',
			type: 'POST',
			dataType: 'json',
			data: {action: action, id: id},
		})
		.done(function(data) {

			var name 		= '';
			var email  		= '';
			var phone  		= '';
			var point  		= '';
			var status  	= '';
			var address  	= '';
			var getID		= '';

			$.each(data,function(index, val) {
				// l&#7845;y id.
				getID += `<input value="`+ val['id_member'] +`" class="inp-id-user" hidden>`;

				// name.
				name += `
					<input type="text" value= "`+ val['name'] +`" name="nick" parsley-trigger="change" required placeholder="Enter member name" class="form-control" id="name-member-update">`;

        		// email.
        		email += `
        			<input type="email" name="email" value="`+ val['email'] +`" parsley-trigger="change" required="" placeholder="Enter email" class="form-control" id="email-member-update">`;
                // phone.
                phone += `
                	<input type="number" name="phone" value="`+ val['phone'] +`" parsley-trigger="change" required="" placeholder="Enter phone" class="form-control" id="phone-member-update">`;

                // point.
                point += `
                	<input type="number" name="point" value="`+ val['point'] +`" parsley-trigger="change"  placeholder="Enter point" class="form-control" id="point-member-update">`;	

                // tìm status.
                if (val['status'] == 1) {
                	status += `<option value="1">Active</option>`;
                	status += `<option value="0">Look</option>`;
                } else {
                	status += `<option value="0">Lock</option>`;
                	status += `<option value="1">Active</option>`;
                }

                // address.
                address += `<input required class="form-control" id="address-member-update" value="`+ val['address'] +`"></input>`;
			});

			// d&#7919; li&#7879;u tr&#7843; v&#7873;.
			$('#get-id-member').html(getID);
			$('#data-name-member').html(name);
			$('#data-email-member').html(email);
			$('#data-phone-member').html(phone);
			$('#data-point-member').html(point);
			$('#status-member-update').html(status);
			$('#data-address-member').html(address);
		})

	});

	/*------------Update Member--------------*/
	$(document).on('submit', '.form-update-member', function(e) {

		var id          = $('.inp-id-user').val();
		var name 		= $('#name-member-update').val();
		var email    	= $('#email-member-update').val();
		var phone   	= $('#phone-member-update').val();
		var point   	= $('#point-member-update').val();
		var passw   	= $('#pass1-member-update').val();
		var status   	= $('#status-member-update').val();
		var address   	= $('#address-member-update').val();
		var action 		= 'update';

		$.post('server/members/action.php', {action: action, name: name, email: email, phone: phone, point: point, passw: passw, address: address, status: status, id: id}, function(data) {
			
			if (data == 'you updated successfully') {

				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"you updated successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=member';
				});
			}
		});

		e.preventDefault();
	});

	/*------------Delete Member---------------*/
	$(document).on('click', '.delete-member', function(e) {

		var id 		= $(this).attr('id');
		var action  = 'delete';

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		// nó &#273;&#7841;i di&#7879;n cho confirm (Yes/No).
		$('.swal2-confirm').click(function() {

			$.post('server/members/action.php', {action: action, id: id}, function(data) {

				if (data == "you deleted successfully") {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=member';
					});
				}
			});
		});
		e.preventDefault();
	});


	/*---------------------------------------------------
						Product
	-----------------------------------------------------*/

	/*--------------------Add Product---------------------*/
	$(document).on('click', '#add_product_md', function(event) {
		event.preventDefault();
		
		
		var name_product = $('.name_product').val();
		var category = $('.category').val();
		var brand = $('.brand').val();
		var origin = $('.origin_product').val();
		var main_img = $('.main_img')[0].files[0];
		var second_img = $('.second_img')[0].files[0];
		var price = $('.price_product').val();
		var quantity = $('.quantity_product').val();
		var mass = $('.mass_product').val();
		var classify = $('.classify_product').val();
		var sale = $('.sale_product').val();
		var price_sale = $('.price_sale').val();
		var desr = $('.desr').val();
		// var desr = $('#editor').html(myEditor.getData());
		// var desr = CKEDITOR.instances['ckeditor'].getData();
		var action = 'Add_Product';
		var fd = new FormData();

		fd.append('name_product', name_product);
		fd.append('category', category);
		fd.append('brand', brand);
		fd.append('origin', origin);
		fd.append('main_img', main_img);
		fd.append('second_img', second_img);
		fd.append('price', price);
		fd.append('quantity', quantity);
		fd.append('mass', mass);
		fd.append('classify', classify);
		fd.append('sale', sale);
		fd.append('price_sale', price_sale);
		fd.append('desr', desr);
		fd.append('action', action);

		if (name_product == '' || category == '' || brand == '' || origin == '' || main_img == null || 
			second_img == null || price == '' || quantity == '' || mass == '' || classify == '' || desr == '') {
			alert('Please fill out this form');
		}else {
			$.ajax({
				url: 'server/products/action.php',
				type: 'POST',
				dataType: 'html',
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
			})

			.done(function(data) {
				if (data = 'Add_Product') {

					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You added successfully!",type:"success",confirmButtonColor:"#348cd4"});

					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=product';
					});
				}else {
					alert('Thêm th&#7845;t b&#7841;i');
				}
					 
			})

			.fail(function() {
				console.log("error");
			});
		}

		
		
	});

	/*------------------------Select (form-update) Product-------------------------*/
	$(document).on('click', '.update-product', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Select';

		$.post('server/products/action.php', {id: id, action: action}, function(data) {
			/*optional stuff to do after success */
			$('.show_update').html(data);
		});
	});


	/*-------------------------Update Product-------------------------------*/
	$(document).on('click', '#update_product_md', function(event) {
		event.preventDefault();
		
		var id_product = $(this).val();
		var name_product = $('.name_pro').val();
		var category = $('.cate').val();
		var brand = $('.brands').val();
		var origin = $('.origin_pro').val();
		var main_img = $('.main_image')[0].files[0];
		var second_img = $('.second_image')[0].files[0];
		var price = $('.price_pro').val();
		var quantity = $('.quantity_pro').val();
		var mass = $('.mass_pro').val();
		var classify = $('.classify_pro').val();
		var sale = $('.sale_pro').val();
		var price_sale = $('.price_sales').val();
		var desr = $('.description').val();
		var action = 'Update_Product';
		var fd = new FormData();

		fd.append('id_product', id_product);
		fd.append('name_product', name_product);
		fd.append('category', category);
		fd.append('brand', brand);
		fd.append('origin', origin);
		fd.append('main_img', main_img);
		fd.append('second_img', second_img);
		fd.append('price', price);
		fd.append('quantity', quantity);
		fd.append('mass', mass);
		fd.append('classify', classify);
		fd.append('sale', sale);
		fd.append('price_sale', price_sale);
		fd.append('desr', desr);
		fd.append('action', action);

		if ((main_img != null && second_img == null) || (second_img != null) && main_img == null) {
			alert('Please choose your photo');
		}else {
			$.ajax({
				url: 'server/products/action.php',
				type: 'POST',
				dataType: 'html',
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
			})

			.done(function(data) {
				if (data = 'Update_Product') {

					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You update successfully!",type:"success",confirmButtonColor:"#348cd4"});

					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=product';
					});
				}else {
					alert('S&#7917;a th&#7845;t b&#7841;i');
				}
					 
			})

			.fail(function() {
				console.log("error");
			});
		}

		

	});

	/*----------------------Delete Product--------------------------*/

	$(document).on('click', '.delete-product', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Delete_Product';

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",
		showCancelButton:!0,confirmButtonColor:"#348cd4",
		cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		// nó &#273;&#7841;i di&#7879;n cho confirm (Yes/No).
		$('.swal2-confirm').click(function() {

			$.post('server/products/action.php', {action: action, id: id}, function(data) {

				var check = parseInt(data);

				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=product';
					});
				}else if (check == 0) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Sorry!",text:"You can't delete it!",type:"warning",confirmButtonColor:"#eb6857"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					// $('.swal2-confirm, .swal2-container').click(function() {
					// 	window.location = 'index.php?page=product';
					// });
				}
			});
		});


	});

	/*---------------------------Detail Product------------------------------*/

	$(document).on('click', '.detail-product', function(event) {
		event.preventDefault();
		/* Act on the event */

		var id = $(this).attr('id');
		var action = 'Detail_Product';

		$.post('server/products/action.php', {id: id, action: action}, function(data) {
			/*optional stuff to do after success */
			$('.show_detail_pro').html(data);
		});

	});
	

	/*-------------------------------------------------------
							Category
	---------------------------------------------------------*/
	

	/*---------------------Add Category-----------------------*/
	$(document).on('click', '#add_category_md', function(event) {
		event.preventDefault();
		/* Act on the event */
		var name = $('#name-category').val();
		var action = "Add Category";

		$.post('server/category/action.php', {name: name , action: action}, function(data) {
			/*optional stuff to do after success */
			var check = parseInt(data);
			if (check == '1') {
				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"You added successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=category';
				});
			}else {
				alert('Thêm th&#7845;t b&#7841;i');
			}
		});
	});


	/*-------------------------Get Category Id--------------------------*/
	$(document).on('click', '.update-category', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Edit Category';

		// $.post('server/category/action.php', {id: id, action: action}, function(data) {
		// 	optional stuff to do after success 
		// 	$('#data-name-category').html(data);
		// });

		$.ajax({
			url: 'server/category/action.php',
			type: 'POST',
			dataType: 'json',
			data: {id: id, action: action},
		})
		.done(function(data) {
			var name = '';
			var getId = '';

			$.each(data, function(index, val) {

				getId += `<input value="`+ val['id_category'] +`" class="inp-id-cate" hidden>`;

				 name += `<input type="text" name="category" required="" id="name_cate_update" class="form-control" value="`+ val['name_cate'] +`">`;
			});

			//d&#7919; li&#7879;u tr&#7843; v&#7873;
			$('#data-name-category').html(name);
			$('#get-id-category').html(getId);
		})
		.fail(function() {
			console.log("error");
		});
		
	});


	/*-----------------------Update Category-------------------------*/
	$(document).on('click', '.md_update_category', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $('.inp-id-cate').val();
		var name = $('#name_cate_update').val();
		var action = 'Update Category';
		
		$.post('server/category/action.php', {id: id, name: name, action: action}, function(data) {
			/*optional stuff to do after success */
			var check = parseInt(data);
			if (check == '1') {

				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"You updated successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=category';
				});
			}else {
				alert('Th&#7845;t b&#7841;i');
			}
		});
	});


	/*----------------------Delete Category--------------------------*/
	$(document).on('click', '.delete-category', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Delete Category';

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		$('.swal2-confirm').click(function() {
			$.post('server/category/action.php', {id: id, action: action}, function(data) {
				/*optional stuff to do after success */
				var check = parseInt(data);
				if (check == '1') {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=category';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
			});
		});


		
	});


	/*-------------------------------------------------------
							Brand
	---------------------------------------------------------*/

	/*----------------------Add Brand--------------------------*/
	$(document).on('click', '#add_brand_md', function(event) {
		event.preventDefault();
		/* Act on the event */
		var name = $('#name-brand').val();
		var action = "Add Brand";

		$.post('server/brand/action.php', {name: name , action: action}, function(data) {
			/*optional stuff to do after success */
			var check = parseInt(data);
			if (check == '1') {
				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"You added successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=brand';
				});
			}else {
				alert('Thêm th&#7845;t b&#7841;i');
			}
		});
	});

	/*-------------------------Get Brand Id--------------------------*/
	$(document).on('click', '.update-brand', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Edit Brand';

		// $.post('server/category/action.php', {id: id, action: action}, function(data) {
		// 	optional stuff to do after success 
		// 	$('#data-name-category').html(data);
		// });

		$.ajax({
			url: 'server/brand/action.php',
			type: 'POST',
			dataType: 'json',
			data: {id: id, action: action},
		})
		.done(function(data) {
			var name = '';
			var getId = '';

			$.each(data, function(index, val) {

				getId += `<input value="`+ val['id_brand'] +`" class="inp-id-brand" hidden>`;

				 name += `<input type="text" name="brand" required="" id="name_brand_update" class="form-control" value="`+ val['brand_name'] +`">`;
			});

			//d&#7919; li&#7879;u tr&#7843; v&#7873;
			$('#data-name-brand').html(name);
			$('#get-id-brand').html(getId);
		})
		.fail(function() {
			console.log("error");
		});
		
	});


	/*-----------------------Update Brand-------------------------*/
	$(document).on('click', '.md_update_brand', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $('.inp-id-brand').val();
		var name = $('#name_brand_update').val();
		var action = 'Update Brand';
		
		$.post('server/brand/action.php', {id: id, name: name, action: action}, function(data) {
			/*optional stuff to do after success */
			var check = parseInt(data);
			if (check == '1') {

				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"You updated successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=brand';
				});
			}else {
				alert('Th&#7845;t b&#7841;i');
			}
		});
	});


	/*----------------------Delete Category--------------------------*/
	$(document).on('click', '.delete-brand ', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Delete Brand';

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		$('.swal2-confirm').click(function() {
			$.post('server/brand/action.php', {id: id, action: action}, function(data) {
				/*optional stuff to do after success */
				var check = parseInt(data);
				if (check == '1') {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=brand';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
			});
		});


		
	});


	/*-------------------------------------------------------------
							Order
	---------------------------------------------------------------*/

	/*------------------------Get Detail Order-------------------------*/

	$(document).on('click', '.update-order', function(event) {
		event.preventDefault();
		/* Act on the event */
        
        var id = $(this).attr('id');
		var action = 'Detail_Order';

		// $.post('server/orders/action.php', {id : id ,action: action}, function(data) {
		// 	// optional stuff to do after success 

		// 	$('.show_detail').html(data);
		// });

		$.ajax({
			url: 'server/orders/action.php',
			type: 'POST',
			dataType: 'json',
			data: {id: id , action: action},
		})
		.done(function(data) {
			var stt = 0;
			var total = 0;
			var result = '';

			$.each(data, function(index, val) {
				stt +=1;
				total += parseInt(val['total']);
				result = `
				<div class="col-4 mb-5 information">`
			            
	            	if (val['status'] == 1) {
	            		result += "<h3 class='text-success'>Delivered</h3>";
	            	}else if (val['status'] == 0) {
	            		result += "<h3 class='text-warning'>Not Delivered</h3>";
	            	}
		            result+=`
		            <label for="status" class="mt-3">Order status</label>
		            <select id="`+ val['id_order'] +`" class="form-control status">`
		               
		               		if (val['status'] == 1) {
		               			result +=   "<option value='1'>Delivery</option>";
		                		result +=	"<option value='0'>Not Delivery</option>";
		               		}else if (val['status'] == 0) {
		               			result +=   "<option value='0'>Not Delivery</option>";
		               			result +=	"<option value='1'>Delivery</option>";
		               		}
		            
		            result+=`   
		            </select>
		        </div>

	        	<h3 class="text-center">Detail Order</h3>
		        <div class="table-responsive">
		            <table class="table table-hover">
		                <thead>
		                    <tr>
		                        <th>STT</th>
		                        <th>Member name</th>
		                        <th>Product name</th>
		                        <th>Note</th>
		                        <th>Quantity</th>
		                        <th>Image</th>
		                        <th>Price</th>
		                        <th>Total</th>
		                    </tr>
		                </thead>
		                <tbody class="show_table">
		                     <tr>

								<td>`+ stt +`</td>
								<td>`+ val['name'] +`</td>
								<td>`+ val['product_name'] +`</td>
								<td>`+ val['note'] +`</td>
								<td>`+ val['quantity'] +`</td>
								<td><img style="width: 100px; height: auto;" src="../../assets/images/products/`+ val['main_image'] +`"></td>
								<td>`+(new Intl.NumberFormat().format(val['price']))+ '<sup>&#273;</sup>' +`</td>
								<td>`+(new Intl.NumberFormat().format(val['total']))+ '<sup>&#273;</sup>' +`</td>
								<td></td>
							</tr>
		                </tbody>
		            </table>
		        </div>`;
			});
			result += '<h3 class="text-info mb-3">TOTAL:' + (new Intl.NumberFormat().format(total)) + '<sup>&#273;</sup></h3>';
			$('.show_detail').html(result);

		})
		.fail(function() {
			console.log("error");
		});
		


	});


	/*-------------------------Change State---------------------------*/
	$(document).on('change', '.status', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var value = $(this).val();
		var action = 'Change_State';
		$('.change-state').modal('hide');

		Swal.fire({title:"Are you sure?",
		text:"You won't be able to revert this!",
		type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",
		confirmButtonText:"Yes, change state order!"});

		$('.swal2-confirm').click(function() {
			/* Act on the event */
			$.post('server/orders/action.php', {id: id, value: value, action: action}, function(data) {
				var check = parseInt(data);

				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You change state successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=order';
					})
				}else {
					alert('Nope');
				}
			});
		});



	});



	/*----------------------------Delete Order-------------------------------*/

	$(document).on('click', '.delete-order', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Delete_Order';

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",
		showCancelButton:!0,confirmButtonColor:"#348cd4",
		cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		// nó &#273;&#7841;i di&#7879;n cho confirm (Yes/No).
		$('.swal2-confirm').click(function() {

			$.post('server/orders/action.php', {action: action, id: id}, function(data) {

				var check = parseInt(data);

				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=order';
					});
				}else if (check == 0) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Sorry!",text:"You can't delete it!",type:"warning",confirmButtonColor:"#eb6857"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=order';
					});
				}
			});
		});


	});


	/*---------------------------------------------------------------
								Blog
	-----------------------------------------------------------------*/

	/*-----------------------Add Blog---------------------------*/
	// $(document).on('click', '#add_news_md', function(event) {
	// 	event.preventDefault();
	// 	/* Act on the event */
	// 	var title = $('.title').val();
	// 	var cate_news = $('.category_news').val();
	// 	var id_user = $('.id_user').attr('id');
	// 	var main_img = $('.main_img')[0].files[0];
	// 	var content = CKEDITOR.instances['ckeditor'].getData();
	// 	var desr = $('.desr').val();
	// 	var action = 'Add_News';
	// 	var fd = new FormData();
	// 	fd.append('title', title);
	// 	fd.append('cate_news', cate_news);
	// 	fd.append('id_user', id_user);
	// 	fd.append('main_img', main_img);
	// 	fd.append('content', content);
	// 	fd.append('desr', desr);
	// 	fd.append('action', action);

	// 	if (title == '' || cate_news == '' || id_user == '' || main_img == null || 
	// 		content == '') {
	// 		alert("Please fill out this form !!!");
	// 	}else {
	// 		$.ajax({
	// 		url: 'server/news/action.php',
	// 		type: 'POST',
	// 		dataType: 'html',
	// 		data: fd,
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,
	// 		})
	// 		.done(function(data) {
	// 			if (data = 'Add_News') {

	// 				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
	// 				$('.custombox-content').slideUp();
	// 				$('.custombox-overlay').slideUp();
	// 				// N&#7897;i dung h&#7897;p tho&#7841;i
	// 				Swal.fire({title:"Good job!",text:"You added successfully!",type:"success",confirmButtonColor:"#348cd4"});

	// 				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
	// 				$('.swal2-confirm, .swal2-container').click(function() {
	// 					window.location = 'index.php?page=new';
	// 				});
	// 			}else {
	// 				alert('Thêm th&#7845;t b&#7841;i');
	// 			}
	// 		})
	// 		.fail(function() {
	// 			console.log("error");
	// 		});
	// 	}

		

	// });

	/*-----------------------Select Blog (ID)---------------------------*/

	// $(document).on('click', '.update-news', function(event) {
	// 	event.preventDefault();
	// 	/* Act on the event */
	// 	var id_user = $(this).attr('id');
	// 	var action = "Get_Newsid";

	// 	$.post('server/news/action.php', {id_user: id_user, action: action}, function(data) {
	// 		/*optional stuff to do after success */
	// 		$('.show_update_news').html(data);

	// 	});

	// });

	/*-------------------------Delete Blog-------------------------*/

	$(document).on('click', '.delete-news', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Delete_News";

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",
		showCancelButton:!0,confirmButtonColor:"#348cd4",
		cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		// nó &#273;&#7841;i di&#7879;n cho confirm (Yes/No).
		$('.swal2-confirm').click(function() {

			$.post('server/news/action.php', {action: action, id: id}, function(data) {

				var check = parseInt(data);

				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=new';
					});
				}else if (check == 0) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Sorry!",text:"You can't delete it!",type:"warning",confirmButtonColor:"#eb6857"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=new';
					});
				}
			});
		});

	});



	/*------------------------------------------------------------------
								Category News
	--------------------------------------------------------------------*/


	/*------------------------Add Category News---------------------------*/

	$(document).on('click', '#add_cate_news_md', function(event) {
		event.preventDefault();
		/* Act on the event */

		var name_cate = $('#name-cate-news').val();
		var action = "Add_Cate_News";

		$.post('server/cate_news/action.php', {name_cate: name_cate , action: action}, function(data) {
			/*optional stuff to do after success */
			var check = parseInt(data);
			if (check == '1') {
				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"You added successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=cate_news';
				});
			}else {
				alert('Thêm th&#7845;t b&#7841;i');
			}
		});


	});

	/*---------------------------Select Category Id------------------------------*/

	$(document).on('click', '.update-cate-news', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Select_Id";

		$.ajax({
			url: 'server/cate_news/action.php',
			type: 'POST',
			dataType: 'json',
			data: {id: id, action: action},
		})
		.done(function(data) {
			var name = '';
			var getId = '';

			$.each(data, function(index, val) {

				getId += `<input value="`+ val['id_category_new'] +`" class="inp-id-cate-news" hidden>`;

				 name += `<input type="text" name="brand" required="" id="name_cate_news_update" class="form-control" value="`+ val['name_cate'] +`">`;
			});

			//d&#7919; li&#7879;u tr&#7843; v&#7873;
			$('#data-name-cate-news').html(name);
			$('#get-id-cate-news').html(getId);
		})
		.fail(function() {
			console.log("error");
		});

	});


	/*---------------------------Update Category News--------------------------------*/

	$(document).on('click', '.md_update_cate_news', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $('.inp-id-cate-news').val();
		var name = $('#name_cate_news_update').val();
		var action = 'Update_Cate_News';
		
		$.post('server/cate_news/action.php', {id: id, name: name, action: action}, function(data) {
			/*optional stuff to do after success */
			var check = parseInt(data);
			if (check == '1') {

				// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
				$('.custombox-content').slideUp();
				$('.custombox-overlay').slideUp();
				// N&#7897;i dung h&#7897;p tho&#7841;i
				Swal.fire({title:"Good job!",text:"You updated successfully!",type:"success",confirmButtonColor:"#348cd4"});

				// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
				$('.swal2-confirm, .swal2-container').click(function() {
					window.location = 'index.php?page=cate_news';
				});
			}else {
				alert('Th&#7845;t b&#7841;i');
			}
		});
	});


	/*---------------------------Delete Categoy News-----------------------------*/

	$(document).on('click', '.delete-cate-news ', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = 'Delete_Cate_News';

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		$('.swal2-confirm').click(function() {
			$.post('server/cate_news/action.php', {id: id, action: action}, function(data) {
				/*optional stuff to do after success */
				var check = parseInt(data);
				if (check == '1') {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=cate_news';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
			});
		});


		
	});


	/*-------------------------------------------------------------
								Slide
	---------------------------------------------------------------*/
	
	/*------------------------Add Slide--------------------------*/

	$(document).on('click', '#add_slide_md', function(event) {
		event.preventDefault();
		/* Act on the event */
		var title = $('#title-slide').val();
		var slider = $('#slider')[0].files[0];
		var content = $('#cotent-slide').val();
		var action = "Add_Slide";
		var fd = new FormData();

		fd.append('title', title);
		fd.append('slider', slider);
		fd.append('content', content);
		fd.append('action', action);

		if (title == '' || slider == null || content == '') {
			alert("Please fill out this form !!!");
		}else {
			$.ajax({
				url: 'server/slides/action.php',
				type: 'POST',
				dataType: 'html',
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
			})

			.done(function(data) {

				var check = parseInt(data)
				if (check = 1) {

					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You added successfully!",type:"success",confirmButtonColor:"#348cd4"});

					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=slide';
					});
				}else if (check = 0){
					alert('Thêm th&#7845;t b&#7841;i');
				}
					 
			})

			.fail(function() {
				console.log("error");
			});
		}

	});


	/*---------------------------Select Slider Id----------------------------*/

	$(document).on('click', '.update-slide', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Select_Id";

		$.ajax({
			url: 'server/slides/action.php',
			type: 'POST',
			dataType: 'json',
			data: {id: id, action: action},
		})
		.done(function(data) {
			var title = '';
			var getId = '';
			var slider = '';
			var content = '';

			$.each(data, function(index, val) {

				getId += `<input value="`+ val['id_slide'] +`" class="inp-id-slide" hidden>`;

				title += `<input type="text" name="slide" required="" id="title" class="form-control" 
							value="`+ val['slide_title'] +`">`;

				slider +=`<input type="file" name="nick" parsley-trigger="change" required="" placeholder="Enter brand name" 
							class="form-control slider" value="`+ val['slide_image'] +`"  
							 accept="image/png, image/jpg, image/jpeg" id="slider">`

				content  += `<input type="text" name="slide" required="" id="content" class="form-control" 
							value="`+ val['slide_content'] +`">`;

			});

			//d&#7919; li&#7879;u tr&#7843; v&#7873;
			$('#data-title-slide').html(title);
			$('#get-id-slide').html(getId);
			$('#data-slider').html(slider);
			$('#data-content').html(content);
		})
		.fail(function() {
			console.log("error");
		});

	});


	/*-----------------------------Update Slide-------------------------------*/

	$(document).on('click', '.md_update_slide', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $('.inp-id-slide').val();
		var title = $('#title').val();
		var slider = $('.slider')[0].files[0];
		var content = $('#content').val();
		var action = "Update_Slide";
		var fd = new FormData();

		fd.append('id', id);
		fd.append('title', title);
		fd.append('slider', slider);
		fd.append('content', content);
		fd.append('action', action);

		if (title == ''  || content == '') {
			alert("Please fill out this form !!!");
		}else if (slider == null) {
			alert("Please choose your photo !!!");
		}else {
			$.ajax({
				url: 'server/slides/action.php',
				type: 'POST',
				dataType: 'html',
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
			})

			.done(function(data) {

				var check = parseInt(data);
				if (check == '1') {

					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You updated successfully!",type:"success",confirmButtonColor:"#348cd4"});

					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=slide';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
					 
			})

			.fail(function() {
				console.log("error");
			});
		}


	});


	/*----------------------------Delete Slide------------------------------*/

	$(document).on('click', '.delete-slide', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Delete_Slide";

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		$('.swal2-confirm').click(function() {
			$.post('server/slides/action.php', {id: id, action: action}, function(data) {
				/*optional stuff to do after success */
				var check = parseInt(data);
				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=slide';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
			});
		});

	});


	/*---------------------------------------------------------------
								Rating
	-----------------------------------------------------------------*/

	/*------------------------Deleta Rating-----------------------*/

	$(document).on('click', '.delete-rating', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Del_Rating";

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		$('.swal2-confirm').click(function() {
			$.post('server/ratings/action.php', {id: id, action: action}, function(data) {
				/*optional stuff to do after success */
				var check = parseInt(data);
				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=rating';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
			});
		});

	});


	/*-----------------------------------------------------------------
							Contact
	-------------------------------------------------------------------*/

	/*------------------------Delete Contact--------------------------*/

	$(document).on('click', '.delete-contact', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Del_Contact";

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		$('.swal2-confirm').click(function() {
			$.post('server/contacts/action.php', {id: id, action: action}, function(data) {
				/*optional stuff to do after success */
				var check = parseInt(data);
				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=contact';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
			});
		});

	});


	/*-------------------------------------------------------------------
								Sub Image
	---------------------------------------------------------------------*/

	/*---------------------------Add Sub Image-----------------------------*/

	$(document).on('click', '#add_subImage_md', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $('.main_product').val();
		var sub_image = $('.sub_image')[0].files[0];
		var action = "Add_sub_Imgae";
		var fd = new FormData();
		
		fd.append('id', id);
		fd.append('sub_image', sub_image);
		fd.append('action', action);

		if (sub_image == '' || id == '') {
			alert('Please fill out this form');
		}else {
			$.ajax({
				url: 'server/subImages/action.php',
				type: 'POST',
				dataType: 'html',
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
			})

			.done(function(data) {

				var check = parseInt(data);
				if (check == 1) {

					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You added successfully!",type:"success",confirmButtonColor:"#348cd4"});

					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=sub_image';
					});
				}else {
					alert('Thêm th&#7845;t b&#7841;i');
				}
					 
			})

			.fail(function() {
				console.log("error");
			});
		}


	});


	/*----------------------------Select Id--------------------------------*/

	$(document).on('click', '.update-subImage', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Select_Id";

		$.post('server/subImages/action.php', {id: id, action: action}, function(data) {
			/*optional stuff to do after success */
			$('.show_subImage').html(data);
		});

	});

	/*--------------------------Update Sub Image-----------------------------*/

	$(document).on('click', '.md_update_subImage', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var main_product = $('.main_products').attr('id');
		var sub_img = $('.sub_images')[0].files[0];
		var action = "Update_SubImage";
		var fd = new FormData();
		
		fd.append('id', id);
		fd.append('main_product', main_product);
		fd.append('sub_img', sub_img);
		fd.append('action', action);

		if (main_product == '') {
			alert("Please fill out this form !!!");
		}else if (sub_img == null) {
			alert("Please choose your photo !!!");
		}else {
			$.ajax({
				url: 'server/subImages/action.php',
				type: 'POST',
				dataType: 'html',
				data: fd,
				cache: false,
				contentType: false,
				processData: false,
			})

			.done(function(data) {

				var check = parseInt(data);
				if (check == '1') {

					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"You updated successfully!",type:"success",confirmButtonColor:"#348cd4"});

					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=sub_image';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
					 
			})

			.fail(function() {
				console.log("error");
			});
		}


	});


	/*----------------------------Delete Sub Image------------------------------*/

	$(document).on('click', '.delete-subImage', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).attr('id');
		var action = "Delete_SubImage";

		Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#348cd4",cancelButtonColor:"#6c757d",confirmButtonText:"Yes, delete it!"});

		$('.swal2-confirm').click(function() {
			$.post('server/subImages/action.php', {id: id, action: action}, function(data) {
				/*optional stuff to do after success */
				var check = parseInt(data);
				if (check == 1) {
					// l&#7899;p overlay và h&#7897;p tho&#7841;i thông báo thành công!.
					$('.custombox-content').slideUp();
					$('.custombox-overlay').slideUp();
					// N&#7897;i dung h&#7897;p tho&#7841;i
					Swal.fire({title:"Good job!",text:"you deleted successfully!",type:"success",confirmButtonColor:"#348cd4"});
					// class of button OKE confirm .(B&#7845;m vào nút oke ho&#7863;c b&#7845;m vào l&#7899;p Overlay &#273;&#7875; reload)
					$('.swal2-confirm, .swal2-container').click(function() {
						window.location = 'index.php?page=sub_image';
					});
				}else {
					alert('Th&#7845;t b&#7841;i');
				}
			});
		});

	});

});