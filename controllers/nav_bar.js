$(document).ready(function() {
	$("#dashboard").click(function() {
		$("#main-content").attr('src','dashboard.php');  
	});
	//products  
  	$("#mngProd").click(function() {
		$("#main-content").attr('src','manage_products.php');  
	});
	$("#mngCat").click(function() {
		$("#main-content").attr('src','manage_categories.php');  
	});
	$("#mngPCat").click(function() {
		$("#main-content").attr('src','manage_parent_cat.php');  
	});
	$("#mngBrands").click(function() {
		$("#main-content").attr('src','manage_brands.php');  
	});
	$("#mngUnits").click(function() {
		$("#main-content").attr('src','manage_units.php');  
	});
	//people
	$("#mngSupplier").click(function() {
		$("#main-content").attr('src','manage_supplier.php');  
	});
	$("#mngUser").click(function() {
		$("#main-content").attr('src','manage_admin.php');  
	});
	//note
	$("#mngNote").click(function() {
		$("#main-content").attr('src','welcome_note.php');  
	});
	$("#actionLogs").click(function() {
		$("#main-content").attr('src','actionLogs.php');  
	});
	$("#logOut").click(function() {
		delete_cookie("user_id");
		document.location.href = "../admin/index.php";
	});
	$("#addProd").click(function() {
		$("#main-content").attr('src','add_products.php');  
	});

	$("#mngOrders").click(function() {
		$("#main-content").attr('src','manage_orders.php');  
	});
})

function delete_cookie(name) {
	document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
}

jQuery(function ($) {
$(".sidebar-dropdown > a").click(function() {
  	$(".sidebar-submenu").slideUp(200);
  		if (
			$(this)
			.parent()
			.hasClass("active")
		) {
			$(".sidebar-dropdown").removeClass("active");
			$(this)
			.parent()
			.removeClass("active");
		} else {
			$(".sidebar-dropdown").removeClass("active");
			$(this)
			.next(".sidebar-submenu")
			.slideDown(200);
			$(this)
			.parent()
			.addClass("active");
		}
	});

	$("#close-sidebar").click(function() {
		$(".page-wrapper").removeClass("toggled");
	});

	$("#show-sidebar").click(function() {
		$(".page-wrapper").addClass("toggled");
	});
});